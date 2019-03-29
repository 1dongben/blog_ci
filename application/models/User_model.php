<?php
/**
 * 
 */
class User_model extends CI_Model
{
	
	function __construct()
	{
		$this->load->database();
		$this->load->helper('cookie');
	}

	public function login($username,$password)
	{
		$id = $this->db->select('id')->from('user')
			->group_start()
				->where('user_name',$username)
				->where('password',$password)
			->group_end()
		->get()->row_array();
		return $id;
	}

	public function register($username,$password)
	{
		$data = [
				'user_name'=>$username,
				'password'=>$password,
				'create_time'=>date('Y-m-d H:i:s')
			];
		$this->db->insert('user',$data);

	}

	public function save_login($id,$username,$expire)
	{
		$uid = get_cookie('uid');
		if ($uid === null) {
			set_cookie('uid',$id,time()+$expire);
			set_cookie('username',$username,time()+$expire);

		}

	}

	public function destory_login()
	{
		$uid = get_cookie('uid');
		$username = get_cookie('username');
		if ($uid !== null && $username !==null) {
			delete_cookie('uid');
			delete_cookie('username');
		}
	}

	public function check_login()
	{
		$uid = get_cookie('uid');
		if ($uid === null){
			return false;
		}else{
			return true;
		}
	}



}
?>