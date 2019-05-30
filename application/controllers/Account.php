<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account extends CI_Controller {

	public function __construct(){
        parent::__construct();
        clear_cache();
        $this->load->model('user_model');
        $this->load->model('crud');
    }
	public function logout(){

		$this->_check_login(); 
        $this->session->unset_userdata('user_info');
		redirect('login');
	}
	
    function dashboard(){
		$this->_check_login();
		$user_id = user_id();
		$data['title'] = 'Dashboard';
		$data['template']='frontend/dashboard';
	  	$data['result']=array();
		$this->load->view('templates/frontend/front_template',$data);
	}
    private function _check_login(){
		if(user_logged_in()===FALSE){
			redirect('page/login');
		}
    }
    function salt() {
		return substr(md5(uniqid(rand(), true)), 0, 10);
	}
   

}