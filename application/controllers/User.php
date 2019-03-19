<?php
class User extends CI_Controller{

	public function login()
	{
		$this->load->view('user/login');
	}

	public function register()
	{
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('username','Username','required|min_length[5]maxlength[12]',['required'=>'You must provide a %s.']
	);//级联规则
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('passconf','Passconf','required');
		$this->form_validation->set_rules('username','Username','trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/register');
		}
		else
		{
			$this->load->database();
			$data = [
				'user_name'=>$_POST['username'],
				'password'=>$_POST['password'],
				'create_time'=>date('Y-m-d H:i:s')
			];
			$result = $this->db->insert('user',$data);
			var_dump($result);die;
			$this->load->view('formsuccess');
		}
	}


}
?>