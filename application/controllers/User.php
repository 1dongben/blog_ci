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
		$this->form_validation->set_rules('password','Password',"trim|required",['required'=>'请输入密码']);
		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('user/login');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('user_model');
			$id = $this->user_model->login($username,$password);
			if (empty($id)) {
				die('账号密码有误，请重新输入');
			}
			extract($id);
			//$this->user_model->destory_login();
			//$c = get_cookie('uid');echo $c.'_'.$id;die;
			$this->user_model->save_login($id,$username,3600);
			//$c = get_cookie('uid');echo $c.'_'.$id.$username;die;
			header("location:http://www.newlog.com/index.php/article/index");
		}
	}

	/*注册规则
	*1.全必填；2.用户名长度2-16；3.密码长度8-16；4.密码必须同时包括数字和大小写字母；5.密码和确认密码必须一致
	*/
	public function register()
	{

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|min_length[2]|max_length[12]|trim',['required'=>'请输入用户名','min_length'=>'用户名长度不符合要求','max_length'=>'用户名长度不符合要求']
	);//级联规则
		$this->form_validation->set_rules('password','Password','required|min_length[5]|max_length[16]|trim',['required'=>'请输入密码','min_length'=>'密码长度不符合要求','max_length'=>'密码是长度不符合要求']);
		$this->form_validation->set_rules('passconf','Passconf',"required|trim",['required'=>'请输入确认密码']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/register');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('user_model');
			$this->user_model->register($username,$password);
			$this->load->view('user/register');
			echo $result;
		}
	}

	public function logout()
	{
		$this->load->model('user_model');
		$this->user_model->destory_login();
		header("location:http://www.newlog.com/index.php/article/index");
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