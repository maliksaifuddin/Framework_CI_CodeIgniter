<?php 

class Crud_model extends CI_Model {

	function get_user() 
	{
		$query = $this->db->get('users_data');
		return $query->result();
	}

	function insert_user($data) 
	{
		$this->db->insert('users_data', $data);
		return;
	}

	function delete_user($user_id) 
	{
		$this->db->where('user_id', $user_id );
		return $this->db->delete('users_data');
	}

	function get_By_Id($user_id)
	{
		$query = $this->db->get_where('users_data', array('user_id' => $user_id));
		return $query->row();
	}

	function update_user($user_id, $data)
	{
		$this->db->where('user_id', $user_id);
		return $this->db->update('users_data', $data);
	}

	function checkEmail($email) 
	{
		$this->db->select('user_id');
		$this->db->where('email', $email);
		$query = $this->db->get('users_data');

		if ($query->num_rows() > 0) {
		    return true;
		} else {
		    return false;
		}
	}

}

?>