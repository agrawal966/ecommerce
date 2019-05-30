<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
    // copy of attribute controller
    public function __construct(){ 
        parent::__construct(); 
        $this->load->model('superadmin_model');
        if (superadmin_logged_in() === FALSE) redirect('behindthescreen'); //check login authentication
    }

    private function _check_login(){
        if(superadmin_logged_in()===FALSE) 
            redirect('behindthescreen');
        $superadmin_info = $this->session->userdata('superadmin_info');
        if($superadmin_info['user_role'] !=1)redirect('backend/superadmin/dashboard');
    }
    
    public function index(){
        $this->_check_login();
        $data['title']='product List';
        $data['product'] = $this->crud->readData('*', 'product')->result();
        $data['template']='backend/product/product_list';
        $this->load->view('templates/superadmin_template',$data);
    }
  
    public function add_product(){
        $this->_check_login();
        $data['title']    = 'Add Product';
        $this->form_validation->set_rules('product_name', 'Product Name', 'required|min_length[2]|max_length[100]');

        $this->form_validation->set_rules('price', 'Price', 'required|greater_than[0]|numeric');
        $this->form_validation->set_rules('description', 'Product Description', 'required|max_length[500]');
        $this->form_validation->set_rules('product_img', '', 'callback_check_product_img');

        if ($this->form_validation->run() == TRUE){
            $insert = array(
                'product_name'      => $this->input->post('product_name'),
                'price'        => $this->input->post('price'),
                'description'       => $this->input->post('description'),
                'created'           => date('Y-m-d H:i:s A'),
                'updated'           => date('Y-m-d H:i:s A')  
            );
            if ($this->session->userdata('check_product_img') != ''):
                $check_product_img = $this->session->userdata('check_product_img');
                $insert['product_image'] = 'assets/uploads/product/' . $check_product_img['product_image'];
                $this->session->unset_userdata('check_product_img');
            endif;
            if($this->common_model->insert('product',$insert)){
                $this->session->set_flashdata('msg_success','Product information added successfully');
                    redirect('backend/product');
            }else{
                $this->session->set_flashdata('msg_error','Sorry! Adding product has been failed. Please try again');
                redirect('backend/projects/add_product');
            }
        }
        $data['template']='backend/product/add_product';
        $this->load->view('templates/superadmin_template',$data);
    }

    public function edit_product($id=''){
        $this->_check_login();
        $data['title']='Update Product';
        $data['product']    = $this->common_model->get_row('product',array('product_id'=>$id));
        if(empty($data['product']))
            redirect(base_url("backend/product/"));
        $this->form_validation->set_rules('product_name', 'Product Name', 'required|min_length[2]|max_length[100]');
     
        $this->form_validation->set_rules('price', 'Price', 'required|greater_than[0]|numeric');
        $this->form_validation->set_rules('description', 'Product Description', 'required|max_length[500]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if (!empty($_FILES['product_img']['name'])) {
            $this->form_validation->set_rules('product_img', '', 'callback_check_product_img');
        }

        if ($this->form_validation->run() == TRUE){ 
            $update = array(
                'product_name'      => $this->input->post('product_name'),
                'price'     => round( $this->input->post('price'), 2 ),
                'description'      => $this->input->post('description'),
                'updated'         =>date('Y-m-d H:i:s A')  
            );
            if ($this->session->userdata('check_product_img') != ''):
                $filepath = $data['product']->product_image;
                if (!empty($filepath))
                    @unlink($filepath);
                $check_product_img = $this->session->userdata('check_product_img');
                $update['product_image'] = 'assets/uploads/product/' . $check_product_img['product_image'];
                $this->session->unset_userdata('check_product_img');
            endif;
            if($this->common_model->update('product',$update,array('product_id'=>$id))){
                $this->session->set_flashdata('msg_success','product information updated successfully');
                redirect('backend/product/index');
            }else{
                $this->session->set_flashdata('msg_error','Sorry! Updation process has been failed. Please try again');
                redirect('backend/product/edit_product/');
            }
        }
        $data['template']='backend/product/edit_product';
        $this->load->view('templates/superadmin_template',$data);
    }
    function check_product_img($str)
    {
        $this->_check_login(); //check login authentication
        if (empty($_FILES['product_img']['name'])) {
            $this->form_validation->set_message('check_product_img', 'Choose Product Image');
            return FALSE;
        }
        $image = getimagesize($_FILES['product_img']['tmp_name']);
        
        if (!empty($_FILES['product_img']['name'])):
            $config['upload_path']   = './assets/uploads/product/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = '5024';
            $config['max_width']     = '5024';
            $config['max_height']    = '5024';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('product_img')) {
                $this->form_validation->set_message('check_product_img', $this->upload->display_errors());
                return FALSE;
            } else {
                $data = $this->upload->data(); // upload image          
                $this->session->set_userdata('check_product_img', array(
                    'image_url' => $config['upload_path'] . $data['file_name'],
                    'product_image' => $data['file_name']
                ));
                return TRUE;
            }
        else:
            $this->form_validation->set_message('check_product_img', 'The %s field required.');
            return FALSE;
        endif;
    }
    public function product_image_delete($id = '')
    {
        
        $this->_check_login(); //check login authentication
        $data['title'] = '';
        if (empty($id))
            redirect('backend/superadmin/error_404');
        $image=$this->common_model->get_row('product',array('product_id'=>$id),array('product_image','product_id'));
        if (!empty($image) && $image->product_image != '') {
            @unlink($image->product_image);
            if ($this->common_model->update('product', array('product_image'=>''), array(
                'product_id' => $id
            ))) {
                $this->session->set_flashdata('msg_success', 'Product image deleted successfully.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('msg_error', 'Failed, Please try again.');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else {
            $this->session->set_flashdata('msg_error', 'Failed, Please try again.');
            redirect($_SERVER['HTTP_REFERER']);
        }
       
    }
    
   
}