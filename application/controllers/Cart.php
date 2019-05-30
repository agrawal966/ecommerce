<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {
    
    public function addtocart() {
        $data = array();
        $product_id = $this->input->post('product_id');
        $results = $this->common_model->get_row('product',array('product_id'=>$product_id),array('product_id','price','product_image','product_name'));
        if(!empty($results)){
            $data['id'] = $results->product_id;
            $data['name'] = $results->product_name;
            $data['price'] = $results->price;
            $data['qty'] = $this->input->post('quantity');
            $data['options'] = array('product_image' => $results->product_image);
        
            $this->cart->insert($data);
            redirect('cart');
        }else{
            $this->session->set_flashdata('msg_error', 'Failed, Please try again.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function index()
    {
        $data['cart_contents'] = $this->cart->contents();
        $data['title']='Cart';
		$data['template']='frontend/cart';
        $this->load->view('templates/frontend/front_template',$data);  
    }
    public function update_cart()
    {
        $product_id = $this->input->post('product_id');
        $results = $this->common_model->get_row('product',array('product_id'=>$product_id),array('product_id','price','product_image','product_name'));
        if(!empty($results)){
            $data = array();
            $data['qty'] = $this->input->post('qty');
            $data['rowid'] = $this->input->post('rowid');

            $this->cart->update($data);
            redirect('cart');
        }else{
            $this->session->set_flashdata('msg_error', 'Failed, Please try again.');
            redirect($_SERVER['HTTP_REFERER']);
        }
       
    }
    public function remove_cart($row_id) {  
        $this->cart->remove($row_id);
        redirect('cart');
    }
    public function order()
    {
        if(user_logged_in()===FALSE){
        
            $this->session->set_userdata('redirect','order');
      
			redirect('page/login');
		}else{
            $data['user_info'] = $this->common_model->get_row('user',array('id'=>user_id()));
            $data['title']='Shipping Details';
            $data['template']='frontend/shipping';
            $this->load->view('templates/frontend/front_template',$data);  
        }
    }
    function order_place()
    {
       
        $cart_data=$this->cart->contents();
        if(!empty($cart_data) && user_logged_in()==true)
        {
            $data=array(
                'full_name'=>$this->input->post('full_name'),
                'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
                'subtotal'=>$this->cart->format_number($this->cart->total()),
                'order_id'=>uniqid(),
                'user_id'=>user_id(),
                'order_date'=> date('Y-m-d H:i:s A'),
            );
            $order_id=$this->common_model->insert('orders',$data);
            foreach($cart_data as $key=>$value)
            {
                $item=array(
                    'order_id'=>$order_id,
                    'product_id'=>$value['id'],
                    'name'=>$value['name'],
                    'qty'=>$value['qty'],
                    'options'=>json_encode($value['options']),
                );
                $order_items_id=$this->common_model->insert('order_items',$item);
            }
            if($order_id!='')
            {
                $this->cart->destroy();
                redirect('cart/thankpage/'.$order_id);
             
            }else{
                $this->session->set_flashdata('msg_error', 'Failed, Please try again.');
                redirect($_SERVER['HTTP_REFERER']);
            }    

        }else{
            $this->session->set_flashdata('msg_error', 'Failed, Please try again.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    function thankpage($id=""){
        $data['order_info'] = $this->common_model->get_row('orders',array('o_id'=>$id));
    
        if(empty($data['order_info']))
        redirect(base_url("/"));
        $data['title']='Shipping Details';
        $data['template']='frontend/thankpage';
        $this->load->view('templates/frontend/front_template',$data);     
    }
}