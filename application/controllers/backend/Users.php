<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	// copy of attribute controller
	public function __construct(){ 
		parent::__construct(); 
		$this->load->model('superadmin_model');
		if (superadmin_logged_in() === FALSE) redirect('behindthescreen'); //check login authentication
	}

	private function _check_login(){
		if(superadmin_logged_in()===FALSE)
			redirect('behindthescreen');
		$user_info = $this->session->userdata('superadmin_info');
		    if($user_info['user_role'] !=1)redirect('backend/superadmin/dashboard');
	}

	public function index($offset=0){
		$this->_check_login();
		$data['title'] = 'Users List';
		$search = array("type = '2'");
		if(!empty($_GET)) {
			if(!empty(trim($_GET['full_name'])))
		    	$search[]=' full_name ="'.trim($_GET['full_name']).'"';
			if(!empty(trim($_GET['email'])))
		    	$search[]=' email ="'.trim($_GET['email']).'"';
			if(trim($_GET['status']) != '')
		    	$search[]=' status ="'.trim($_GET['status']).'"';
		}
		$sort = 'DESC';
		$sortby = 'id';
		if(!empty($_GET['order'])) $sort=$_GET['order'];
		$search = implode(" AND", $search);
        $config=backend_pagination(); 
        $config['base_url'] = base_url().'backend/users/index/';
        $limit = "10";
		$config['total_rows'] = $this->crud->readData('*', 'user', $search, NULL, NULL, "$sortby $sort")->num_rows();
        $config['per_page'] = $limit;
	    $config['uri_segment'] = 4;
	    if(!empty($_SERVER['QUERY_STRING']))
	      	$config['suffix'] = "?".$_SERVER['QUERY_STRING'];
	    else
	      	$config['suffix'] ='';

	  	$config['first_url'] = $config['base_url'].$config['suffix'];
	    if((int) $offset < 0){
	      	$this->session->set_flashdata('msg_warning','Something went wrong! Please try again');    
	      	redirect($config['base_url']);
	    }else if($config['total_rows'] < $offset){
	      	$this->session->set_flashdata('msg_warning','Something went wrong! Please try again');    
	      	redirect($config['base_url']);
	    }
		$data['users'] = $this->crud->readData('*', 'user', $search, NULL, NULL, "$sortby $sort", array($limit, $offset))->result();
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        $data['template']='backend/users/user_list';
        $data['offset']=$offset;
        $this->load->view('templates/superadmin_template',$data);
	}


	public function change_status() {
		$this->_check_login();
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$this->crud->updateData('user', array('status' => $status), array('id' => $id));
		if($status == '0') {
			$data = array(
				'status' => '1',
				'status_name' => 'Inactive',
				'addClass' => 'btn-danger Inactive',
				'removeClass' => 'btn-success Active'
			);
		}
		if($status == '1') {
			$data = array(
				'status' => '0',
				'status_name' => 'Active',
				'addClass' => 'btn-success Active',
				'removeClass' => 'btn-danger Inactive'
			);
		}
		echo json_encode($data);
	}

	public function profile($user_id = '') {
		$this->_check_login();
		$data['user'] = $this->crud->readData('id, full_name, email, contact_no, status, created, updated, last_login, ip_address', 'user', array('id' => $user_id))->row_array();
		if(empty($data['user']))
			redirect(base_url('backend/users'));
        //Start code of change Password
        if($this->input->post('password')) {
        	$this->form_validation->set_rules('password[new]', 'Password', 'required|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('password[confirm]', 'Confirm Password', 'required|matches[password[new]]');
        	if ($this->form_validation->run() == TRUE)	{
        		$salt = $this->salt();
				$user_data  = array('salt' => $salt, 'password' => sha1($salt.sha1($salt.sha1($this->input->post('password[new]')))));
				if($this->superadmin_model->update('user', $user_data, array('id' => $user_id))){
					$this->session->set_flashdata('msg_success','Password has been updated successfully');
				}else{
					$this->session->set_flashdata('msg_error','Sorry! Password updation process has been failed. Please try again');
				}
				redirect("backend/users/profile/$user_id");
        	}

        }
        //End code of change Password

		$data['orders'] = $this->crud->readData('*', 'orders', array('user_id' => $user_id), NULL, NULL, 'o_id DESC')->result();
		$data['title'] = 'User Profile';
        $data['template'] = 'backend/users/profile';
        $data['user_id'] = $user_id;
        $this->load->view('templates/superadmin_template',$data);
	}

 

	


}