<?php

class User_Model extends CI_Model {
	
	public function can_log_in() {
	
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password', md5($this->input->post('password')));
		
		$query = $this->db->get('cod_users');
		
		if($query->num_rows() == 1) {return true;} 
		else 			    {return false;}
	}
	
	public function add_temp_user($key) {
		$data = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'key' => $key
				);
		
		$query = $this->db->insert('cod_temp_users', $data);
		if($query) { return true; } 
		else 	   { return false; }
}

  public function is_key_valid($key) {
  	  $this->db->where('key', $key);
  	  $query = $this->db->get('cod_temp_users');
  	  
  	  if($query->num_rows() == 1) {
  	  	  return true;
  	  } else { return false;} 
  }

  public function add_user($key) {
  	  $this->db->where('key', $key);
  	  $temp_user = $this->db->get('cod_temp_users');
  	  
  	  if ($temp_user) {
  	  	  $row = $temp_user->row();
  	  	  
  	  	  $data = array(
  	  	  	  'email' => $row->email,
  	  	  	  'password' => $row->password
  	  	  	  );
  	  	  
  	  	  $did_add_user = $this->db->insert('cod_users', $data);
  	  	  }
  	  	  if($did_add_user) {
  	  	  	  $this->db->where('key', $key);
  	  	  	  $this->db->delete('cod_temp_users');
  	  	  	  return $data['email'];
  }	return false;}
  
 

}
?>
