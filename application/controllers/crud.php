<?php


class Crud extends CI_Controller

{
	
	function index()
	{
		$data = array();

		if($query = $this->crud_model->get_user())
		{
			$data['users'] = $query;
		}
		$this->load->view('options_view', $data);
	}

	function create_user()
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'phone_number' => $this->input->post('phone_number'),
			'alamat' => $this->input->post('alamat'),
			'assoc_roles' => $this->input->post('assoc_roles')
		);
		$this->crud_model->insert_user($data);
		$this->index(); 
	}

	function edit($user_id)
	{
		$this->load->model('crud_model');
		$user = $this->crud_model->get_By_Id($user_id);
		$this->load->view('edit_view', ['user' => $user]);
	}

	function delete()
	{
		$user = $this->uri->segment(3);
		$this->crud_model->delete_user($user);
		$this->index();
	}

	function saveupdate()
	{
		$user_id = $this->input->post('user_id');
		$data = array(
			'name' => $this->input->post('name'),
			'nim' => $this->input->post('nim'),
			'email' => $this->input->post('email'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'phone_number' => $this->input->post('phone_number'),
			'alamat' => $this->input->post('alamat'),
			'assoc_roles' => $this->input->post('assoc_roles')
		);
		$this->load->model('crud_model');
		if($this->crud_model->update_user($user_id, $data))
		{
			$data['data'] = $this->crud_model->get_user();
			$this->index();
		}
	}

	function validateEmail($email) {
		$this->load->library('form_validation');
		$this->load->model('crud_model');
		$is_exist = $this->crud_model->checkEmail($email);

		if ($is_exist) {
			$this->form_validation->set_message(
				'isEmailExist', 'Email address already exist.'
				);
			return false;
		} else {
			return true;
		}
	}

}

?>