<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller {
	
	public function index() {
		$data['title']='Home';
		$data['template']='frontend/home';
		$data['products']=$this->common_model->get_result('product',array(),array(),array('product_id','desc'));
		$this->load->view('templates/frontend/front_template',$data);  
	}
	public function product($id='') {
		$data['title']='Home';
		$data['template']='frontend/product';
		$data['result']=$this->common_model->get_row('product',array('product_id'=>$id));
		if(empty($data['result'])) redirect('/');
		$this->load->view('templates/frontend/front_template',$data);  
	}
    public function login() {
     	if(user_logged_in()===TRUE) redirect('account/dashboard');
     	$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == TRUE){
			$email = $this->input->post('email');
       		$password = $this->input->post('password');
			if($this->user_model->login($email,$password,'2')){
				if($this->session->userdata('redirect')== 'order') {
					$this->session->unset_userdata('redirect');
					redirect(base_url('cart/order'));
				}else{
					
					redirect(base_url('account/dashboard'));
				}
			}else{
				//redirect('login');
			}
		}
		$data['title']='Login';
		$data['template']='frontend/login';
	  	$data['result']=array();
		$this->load->view('templates/frontend/front_template',$data);  
	}	
	public function sign_up() {
		if(user_logged_in()===TRUE) redirect('account/dashboard');
        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required|max_length[30]');
    	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', array('is_unique' => 'Email address already exist!'));
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[10]'); 
    	$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
    	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    	if ($this->form_validation->run() == TRUE){
    		$salt = $this->salt();
    		$insert = [
	    		'full_name' => $this->input->post('full_name'),
	    		'salt'      => $salt,
				'status'    => 1,
				'type'		=>2,
	            'email'     => $this->input->post('email'),
    			'password'  => sha1($salt.sha1($salt.sha1($this->input->post('password')))),
    			'created'   => date('Y-m-d H:i:s A'),
        	];
        	if($id = $this->common_model->insert('user', $insert)){
				$this->load->helper('cookie');
				$check = get_cookie('redirect');
				if($check == 'order') {
					delete_cookie('redirect'); 
					redirect(base_url('cart/order'));
				}
				redirect(base_url('account/dashboard'));
        	}else{
            	$this->session->set_flashdata('sign_up_msg_error', 'Sorry! Registration process has been failed. please try again.'); 
        		redirect('signup');
            }
        }	

		$data['title']='Sign Up';
	    $data['template']='frontend/sign-up';
	  	$data['result']=array();
		$this->load->view('templates/frontend/front_template',$data);  
	}
	function dashboard(){
		$this->_check_login();
		$data['title']='SEO';
		//$data['template']='frontend/index';
		$data['template']='frontend/profile-setting';
	  	$data['result']=array();
		$this->load->view('templates/frontend/front_template',$data);
	}
	function changepassword(){
		$data['title']='SEO';
		//$data['template']='frontend/index';
		$data['template']='frontend/change-password';
	  	$data['result']=array();
		$this->load->view('templates/frontend/front_template',$data);  
		//blog.ahrefs.com
    }
    function salt() {
		return substr(md5(uniqid(rand(), true)), 0, 10);
	}
	private function _check_login(){
		if(user_logged_in()===FALSE){
			redirect('page/login');
		}
    }

}

