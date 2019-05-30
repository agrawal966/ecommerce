<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function insert($table_name='',  $data=''){
		$query=$this->db->insert($table_name, $data);
		if($query)
			return $this->db->insert_id();
		else
			return FALSE;		
	}
	public function get_result_using_findInSet($table_name='', $id_array='',$columns=array(),$order_by=array(),$limit='',$findInSet = array(),$groupBy=''){
		if(!empty($columns)):
			$all_columns = implode(",", $columns);
			$this->db->select($all_columns);
		endif; 
		if(!empty($order_by)):
			$this->db->order_by($order_by[0], $order_by[1]);
		endif;
		if(!empty($id_array)):
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);
			}
		endif;
		if(!empty($limit)):
			$this->db->limit($limit);
		endif;
		if(!empty($findInSet)):
			$where = "FIND_IN_SET('".$findInSet[0]."', ".$findInSet[1].")";  
			$this->db->where($where); 
		endif;
		if(!empty($groupBy)):
			$this->db->group_by($groupBy);
		endif;
		$query=$this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();   
		else
			return FALSE;
	} 
	public function get_result_pagination($table_name='', $id_array='',$columns=array(),$order_by=array(),$join=array(),$offset='',$per_page='',$search=''){
		// print_r($id_array);
		// die;
		if(!empty($columns)):
			$all_columns = implode(",", $columns);
			$this->db->select($all_columns);
		endif;
		if(!empty($order_by)):			
			$this->db->order_by($order_by[0], $order_by[1]);
		endif; 
		if(!empty($id_array)):		
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);
			}
		endif;	
		if(!empty($join)):		
			foreach ($join as $value){
				$this->db->join($value['table'],$value['condition'],$value['type']);
			}
		endif;	
		if(!empty($search)):
			$all_columns = implode(" and ", $search);
			$this->db->where($all_columns);
		endif;	
		$this->db->from($table_name);
		if($offset>=0 && $per_page>0){
			$this->db->limit($per_page,$offset);
			 $query = $this->db->get();
			 if($query->num_rows()>0)
				return $query->result();
			else
				return FALSE;
		}else{
			return $this->db->count_all_results();
		}
	}
	public function get_result($table_name='', $id_array='',$columns=array(),$order_by=array(),$limit='',$custom='',$search=array()){
		if(!empty($columns)):
			$all_columns = implode(",", $columns);
			$this->db->select($all_columns);
		endif;
		if(!empty($order_by)):	
			if(sizeof($order_by)==1)
					$this->db->order_by($order_by[0]);
			else	
				$this->db->order_by($order_by[0], $order_by[1]);
		endif; 
		if(!empty($id_array)):		
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);  
			}
		endif;	
		if(!empty($limit)):	
			$this->db->limit($limit);
		endif;	
		if(!empty($custom)):	
			$this->db->where($custom);
		endif;
		if(!empty($search)):
			$all_columns = implode(" and ", $search);
			$this->db->where($all_columns);
		endif;	
		$query=$this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();
		else
			return FALSE;
	}
	public function get_row($table_name='', $id_array='',$columns=array(),$order_by=array()){
		
		if(!empty($columns)):
			$all_columns = implode(",", $columns);
			$this->db->select($all_columns);
		endif; 
		if(!empty($id_array)):		
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);
			}
		endif;
		if(!empty($order_by)):			
			$this->db->order_by($order_by[0], $order_by[1]);
		endif; 
		$query=$this->db->get($table_name);
		//echo $this->db->last_query();

		if($query->num_rows()>0)
			return $query->row();
		else
			return 0;
			return FALSE;
	}

	public function update($table_name='', $data='', $id_array=''){
		if(!empty($id_array)):
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);
			}
		endif;
	  return $this->db->update($table_name, $data);			
	}
	public function delete($table_name='', $id_array=''){		
	 	return $this->db->delete($table_name, $id_array);
	}
	
	public function users($role='',$offset='', $per_page=''){
	
		$this->db->select('u.*');
		$this->db->from('users as u');
		if(!empty($_GET)){
			if(!isset($_GET['user_id']) || !isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['contact']) || !isset($_GET['order'])){
			 		redirect('user');
			}
			if($_GET['user_id']){
			 $this->db->where('u.id', $this->input->get('user_id'));	
			}
			if($_GET['name']){			              
			     $this->db->like('u.user_name',trim($this->input->get('name')),'both');	
			}
		
			if($_GET['email']){
			 $this->db->like('u.email', trim($this->input->get('email')));	
			}

			if($_GET['contact']){
			 $this->db->where('u.mobile', trim($this->input->get('contact')));	
			}
			if($_GET['order']){
			if($this->input->get('order')==2 || $this->input->get('order')==3){
			$order = 'ASC';	
			   }else{
			   	$order = 'DESC';
			   }
			   if($this->input->get('order')==1 || $this->input->get('order')==2){
					$column_name = 'u.id';	
			   }else{
					$column_name = 'u.name';
			   }
			  	 $this->db->order_by($column_name,$order);
			}
		}
		$this->db->where('u.user_role',$role);
		if($offset>=0 && $per_page>0){

			$this->db->limit($per_page,$offset);
			$this->db->order_by('u.id','desc');
			$query = $this->db->get();
			if($query->num_rows()>0)
			return $query->result();
			else
			return FALSE;
		}else{
		
			return $this->db->count_all_results();
		}
	}

	public function password_check($data=''){  
		$query = $this->db->get_where('user',$data);
 		if($query->num_rows()>0)
			return TRUE;
		else{
			//$this->form_validation->set_message('password_check', 'The %s field can not match');
			return FALSE;
		}
	}

}
