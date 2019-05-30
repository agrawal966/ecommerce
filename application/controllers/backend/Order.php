<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        clear_cache();
        $this->load->model('superadmin_model');
        if(superadmin_logged_in()===FALSE) redirect('behindthescreen');
    }

    public function index($offset=0){
        $data['title']='Order';

        $search=array();
        if(!empty($_GET))
        {
            if(!empty($_GET['full_name']))
            $search[]=' full_name like "%'.trim($_GET['full_name']).'%"';
            if(!empty($_GET['user_id']))
            $search[]=' user_id = "'.trim($_GET['user_id']).'"';
            if(!empty($_GET['txn_id']))
            $search[]=' order_id = "'.trim($_GET['txn_id']).'"';
        }
       $data['orders'] = $this->common_model->get_result_pagination('orders', '', '', array('o_id','desc'), '', $offset, PER_PAGE, $search);
        $config=backend_pagination();
        $config['base_url'] = base_url().'backend/order/index/';
        $config['total_rows'] = $this->common_model->get_result_pagination('orders', '', '', array('o_id','desc'), '', 0, 0, $search);
        
        $config['per_page'] = PER_PAGE;
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

        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        $data['template']='backend/order';
        $data['offset']=$offset;
        $this->load->view('templates/superadmin_template',$data);
    }
}