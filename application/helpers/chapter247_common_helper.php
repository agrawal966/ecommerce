<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
*	clear cache
*/
if ( ! function_exists('clear_cache')) {
	function clear_cache(){
		$CI =& get_instance();
		$CI->output->set_header('Expires: Wed, 11 Jan 1984 05:00:00 GMT' );
		$CI->output->set_header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . 'GMT');
		$CI->output->set_header("Cache-Control: no-cache, no-store, must-revalidate");
		$CI->output->set_header("Pragma: no-cache"); 			
	}
}   
/**   

*/
if ( ! function_exists('word_count')) {
	function word_count($result_html=''){
		return str_word_count(strip_tags($result_html));
	}
}
/**
*	Keyword Appears
*/
if ( ! function_exists('keyword_appears')) {
	function keyword_appears($string='',$keyword=''){
		return substr_count(strtolower(strip_tags($string)),strtolower($keyword));
	}
}  





// 03 nov 2011

if ( ! function_exists('msg_alert')) {
	function msg_alert(){
	$CI =& get_instance(); ?>
<?php if($CI->session->flashdata('msg_success')): ?>	
	<script>
		$('.notifyjs-corner').empty();
		/*$.notify("<?php //echo $CI->session->flashdata('msg_success'); ?>", "success");*/
	
		$.notify({
			icon: "<?php echo base_url(); ?>assets/frontend/alert-icons/alert-checked.svg",
			title: "<strong>Success</strong> ",
			message: "<?php echo $CI->session->flashdata('msg_success'); ?>"			
		},{
			icon_type: 'image',
			type: 'success',
			allow_duplicates: false
		});

	</script>
 <?php endif; ?>
<?php if($CI->session->flashdata('msg_info')): ?>	
	<script>
		$('.notifyjs-corner').empty();
		/*$.notify("<?php //echo $CI->session->flashdata('msg_info'); ?>", "info");*/

		$.notify({
			icon: "<?php echo base_url(); ?>/assets/frontend/image/alert-icons/alert-checked.svg",
			title: "<strong>Info</strong> ",
			message: "<?php echo $CI->session->flashdata('msg_info'); ?>"			
		},{
			icon_type: 'image',
			type: 'success',
			allow_duplicates: false
		});

	</script>
<?php endif; ?>
<?php if($CI->session->flashdata('msg_warning')): ?>	
	<script>
		$('.notifyjs-corner').empty();
		/*$.notify("<?php //echo $CI->session->flashdata('msg_warning'); ?>", "warn");*/

		$.notify({
			icon: "<?php echo base_url(); ?>/assets/frontend/alert-icons/alert-danger.svg",
			title: "<strong>Warning</strong> ",
			message: "<?php echo $CI->session->flashdata('msg_warning'); ?>"

		},{
			icon_type: 'image',
			type: 'warning',
			allow_duplicates: false
		});


	</script>
<?php endif; ?>
<?php if($CI->session->flashdata('msg_error')): ?>	
	<script>
		$('.notifyjs-corner').empty();	
		$.notify({
			icon: "<?php echo base_url(); ?>/assets/frontend/alert-icons/alert-disabled.svg",
			title: "<strong>Error</strong> ",
			message: "<?php echo $CI->session->flashdata('msg_error'); ?>"

		},{
			icon_type: 'image',
			type: 'danger',
			allow_duplicates: false
		});
	 </script>
<?php endif; ?>
	<?php }					
}

if ( ! function_exists('user_name')) { 
	function user_name(){
		$CI =& get_instance();
		$user_info = $CI->session->userdata('user_info');
		if($user_info['logged_in']===TRUE)
		 	return $user_info['full_name'];
		else
			return FALSE;
	}					
}

if ( ! function_exists('superadmin_logged_in')) {
	function superadmin_logged_in(){
		$CI =& get_instance();
		$superadmin_info = $CI->session->userdata('superadmin_info');
		if($superadmin_info['logged_in']===TRUE && $superadmin_info['user_role'] == 1 )
			return TRUE;
		else
			return FALSE;
	}
}

if ( ! function_exists('user_id')) {
	function user_id(){
		$CI =& get_instance();
		$user_info = $CI->session->userdata('user_info');		
			return $user_info['id'];		
	}
}

if ( ! function_exists('superadmin_id')) {
	function superadmin_id(){
		$CI =& get_instance();
		$superadmin_info = $CI->session->userdata('superadmin_info');		
			return $superadmin_info['id'];		
	}
}

if ( ! function_exists('superadmin_name')) { 
	function superadmin_name(){
		$CI =& get_instance();
		$superadmin_info = $CI->session->userdata('superadmin_info');
		if($superadmin_info['logged_in']===TRUE )
		 	return $superadmin_info['full_name'];
		else
			return FALSE;
	}					
}


if ( ! function_exists('user_email')) { 
	function user_email(){
		$CI =& get_instance();
		$user_info = $CI->session->userdata('user_info');
		if($user_info['logged_in']===TRUE)
		 	return $user_info['email'];
		else
			return FALSE;
	}					
}

if ( ! function_exists('user_logged_in')) {
	function user_logged_in(){
		$CI =& get_instance();
		$user_info = $CI->session->userdata('user_info');
		if($user_info['logged_in']===TRUE && $user_info['user_role'] == 2)
			return TRUE;
		else
			return FALSE;
	}
}


if ( ! function_exists('sendEmail')) {	
	function sendEmail($to='', $param='', $userRole='',$sub='') {

		$CI =& get_instance();
		$CI->load->library('chapter247_email');
    	if(!empty($to)){
    		
    		$html = array();
	        $html['email_message'] = '';
	        $html = $CI->load->view('templates/email/email_template', $html, true);
	        $param = array(
	                'template'  =>  array(
	                            'temp'      => $html,
	                            'var_name'  => array(), 
	                            ),            
	                'email' =>  array(
	                      'to'        =>    $to,
	                      'from'      =>    NO_REPLY_EMAIL,
	                      'from_name' =>    NO_REPLY_EMAIL_FROM_NAME,
	                      'subject'   =>    $sub
	                )
	        );
	        $CI->chapter247_email->send_mail($param);
	        //echo $CI->email->print_debugger(); die;
    	}
        return true;
	}
}

if ( ! function_exists('my_mail_send')) {	
    function my_mail_send($to='',$sub='',$msg=''){
	    $CI =& get_instance();
	    
	    $CI->load->helper(array('email'));
	//   	$config['protocol'] = 'smtp';
	//   	$config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
	//   	$config['smtp_port'] = '465';
	//   	$config['smtp_user'] = 'test.chapter247@gmail.com'; //change this
	//   	$config['smtp_pass'] = 'chapter247@@'; //change this
	   	$config['mailtype']  = 'html';
	   	$config['charset']  = 'iso-8859-1';
//	   	$config['wordwrap']  = TRUE;
//	   	$config['newline']  = "\r\n"; 
		$CI->load->library(array('email','parser'), $config);

		$CI->email->initialize($config);
		$CI->email->from(NO_REPLY_EMAIL, NO_REPLY_EMAIL_FROM_NAME);
		$CI->email->to($to);
		// $CI->email->cc('another@another-example.com');
		// $CI->email->bcc('them@their-example.com');

		$CI->email->subject($sub);
		$CI->email->message($msg);

		$CI->email->send();
	    // echo $CI->email->print_debugger();
    }
}    

if ( ! function_exists('backend_pagination')) {
	function backend_pagination(){
		$data = array();		
		$data['full_tag_open'] = '<ul class="pagination">';		
		$data['full_tag_close'] = '</ul>';
		$data['first_tag_open'] = '<li>';
		$data['first_tag_close'] = '</li>';
		$data['num_tag_open'] = '<li>';
		$data['num_tag_close'] = '</li>';
		$data['last_tag_open'] = '<li>';
		$data['last_tag_close'] = '</li>';
		$data['next_tag_open'] = '<li>';
		$data['next_tag_close'] = '</li>';
		$data['prev_tag_open'] = '<li>';
		$data['prev_tag_close'] = '</li>';
		$data['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$data['cur_tag_close'] = '</a></li>';
		return $data;
	}
}



if ( ! function_exists('getPlanImg')) {	
	function getPlanImg($plan='') {
		$plan_array = array(
			                '1' => '/img/base-level.svg',
                            '2' => '/img/engineer-level.svg',
                            '3' => '/img/prodigy-level.svg',
							
        ); 
		return element($plan, $plan_array);
	}
}

function change_date_format($date, $format = 'Y-m-d') {
	if($date) {
		if($date > 0) {
			$newDate = date($format, strtotime($date));
			return $newDate;
		}
		else {
			return '';
		}
	}
	else {
		return '';
	}
}
