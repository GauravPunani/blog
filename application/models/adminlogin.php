<?php 

class Adminlogin extends CI_Model
{
	public function check_login($username,$password)
	{
		$d=$this->db->where(['name'=>$username,'pass'=>$password])
					->get('user');

		if($d->num_rows())
		{
			return $d->row()->id;
		}
		else
		{
			return false;
		}
	}
}
?>