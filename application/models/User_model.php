<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {	
	public function login($email,$password,$type){
		$data  = array('email' => $email);	
		$this->db->where($data);
	    $query_get=$this->db->where($data)->from('user')->get(); 
		$count = $query_get->num_rows();
		$res = $query_get->row_array();
		$salt = $res['salt'];
		if($count==1){

	        $query = "SELECT * FROM `user` WHERE `email` ='".$email."' AND `password` = '".sha1($salt.sha1($salt.sha1($password)))."' AND `type` = '".$type."'";
			
			$sql= $this->db->query($query);
			$check_count = $sql->num_rows();
			$result = $sql->row();

			if($check_count == 1)
			{
				//p('fdsFD'); die;
				if($result->status==1){

					$ip_address = $this->input->ip_address();
					$date = date('Y-m-d H:i:s');
			
					$sql= $this->db->query($query);
					$update_query = "UPDATE `user` SET `last_login` = '$date', `ip_address` = '$ip_address' WHERE `id` = '".$sql->row()->id."'";
					$this->db->query($update_query);

					$user_data = array(
						'id' 			=> $sql->row()->id,
						'user_role'     => $sql->row()->type,
						'full_name' 	=> $sql->row()->full_name,
	                    'logged_in' 	=> TRUE
					);

					if($type=='1'){
						$this->session->unset_userdata('superadmin_info');
						$this->session->set_userdata('superadmin_info',$user_data);
					}else if($type=='2'){

						$this->session->unset_userdata('user_info');
						$this->session->set_userdata('user_info',$user_data);
    
						$user_name = ucfirst(user_name());
						$this->session->set_flashdata('msg_success', 'Welcome '.$user_name.', You have logged in successfully');
                    }

			        return TRUE;

				}else{
					$this->session->set_flashdata('msg_error', 'Your account is not activated yet. Please contact to administrator');
					return FALSE;
				}
				
			}else{
				// $this->session->set_flashdata('msg_error', 'Incorrect Email Or Password');
				$this->session->set_flashdata('msg_error', 'Incorrect Password');
				return FALSE;
			}	
		}else{
			$this->session->set_flashdata('msg_error', 'Email is not registered in our database');
			return FALSE;
		}
	}
	

}
