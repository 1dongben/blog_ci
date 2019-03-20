<?php
class User extends CI_Controller{
	public function __contruct()
	{
		 $this->load->database();
	}

	public function login()
	{
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim',['required'=>'请输入用户名']);
		$username = isset($_POST['username'])?$_POST['username']:'';
		$this->form_validation->set_rules('password','Password',"trim|required|callback_login_check[$username]",['required'=>'请输入密码']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/login');
		}
		else
		{
			$result = $this->load->model('user_model/login');
		}
	}

	/*注册规则
	*1.全必填；2.用户名长度2-16；3.密码长度8-16；4.密码必须同时包括数字和大小写字母；5.密码和确认密码必须一致
	*/
	public function register()
	{
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|min_length[2]|max_length[12]|is_unique[user.user_name]|trim',['required'=>'请输入用户名','min_length'=>'用户名长度不符合要求','max_length'=>'用户名长度不符合要求']
	);//级联规则
		$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[16]|trim',['required'=>'请输入密码','min_length'=>'密码长度不符合要求','max_length'=>'密码是长度不符合要求']);
		$pass = isset($_POST['password'])?$_POST['password']:'';
		$this->form_validation->set_rules('passconf','Passconf',"required|callback_passconf_check[$pass]|trim",['required'=>'请输入确认密码']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/register');
		}
		else
		{
			$username = $this->post('username');
			$username = $this->post('password');
			$result = $this->load->model('user_model/register');
			$this->load->view('formsuccess');
		}
	}

	public function passconf_check($str1,$str2)
	{
		if ($str1 != $str2) {
			$this->form_validation->set_message('passconf_check','两次密码不一致，请检查');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


	public function test()
	{
		$u = 2;
		$p = 3;
		$this->load->database();
		$result = $this->db->select('*')->from('user')
			->group_start()
				->where('user_name',$u)
				->where('password',$p)
			->group_end()
		->get()->result();
		var_dump(empty($result));
	}

	public function login_check($password,$username)
	{
		$this->load->database();
		$result = $this->db->select('')->from('user')
			->group_start()
				->where('user_name',$username)
				->where('password',$password)
			->group_end()
		->get()->result();
		if (empty($result)) {
			$this->form_validation->set_message('login_check','账号密码输入有误，请检查');
			return FALSE;
		}
		else
		{
			return $result;
		}
	}

}
?>