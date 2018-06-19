<?php 
/**
* 
*/
class Login extends MY_Controller
{
	
	function index()
	{	
		if($this->session->userdata('user_id'))
			return redirect('admin/dashboard');	
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}
	public function admin_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Username','required|alpha');
		$this->form_validation->set_rules('pass','Password','required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run())
		{
			$name=$this->input->post('name');
			$pass=$this->input->post('pass');
			// echo "Username : $name and pass : $pass";
			$this->load->model('adminlogin');
			$id=$this->adminlogin->check_login($name,$pass);
			if($id)
			{
				
				$this->session->set_userdata('user_id',$id);
				return redirect('admin/dashboard');	
			}
			else
			{
				$this->session->set_flashdata('login_failed','Invalid Username/Password .');
				redirect('login');
			}
		}	
		else
		{
			$this->load->view('public/admin_login');
		}
	}

	public function logout()
	{
		# code...
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}
 ?>