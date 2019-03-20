<?php
/**
 * 
 */
class Class_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function login($username,$password)
	{
		$result = $this->db->select('*')->from('user')
			->group_start()
				->where('user_name',$username)
				->where('password',$password)
			->group_end()
		->get()->result();
		return $result;
	}

	public function register($username,$password)
	{

		$data = [
				'user_name'=>$username,
				'password'=>$password,
				'create_time'=>date('Y-m-d H:i:s')
			];
		$result = $this->db->insert('user',$data);
		return $result;

	}



}
?>