<?php
/**
 * 
 */
class Article extends CI_Controller
{
	public function index()
	{
		$this->load->model('article_model');
		$data['list'] = $this->article_model->article_list();
		$this->load->view('article/index',$data);
	}

	public function detail()
	{
		$id = $this->input->get('id');
		$this->load->model('article_model');
		$data = $this->article_model->article_detail($id);
		if (empty($data)) {
			die("文章不存在");
		}
		$this->load->view('article/detail',$data);
	}

	/**
	*1.所有必填
	*2.标题长度为3-20
	*3.内容长度为1-无穷大
	*/
	public function post()
	{
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('user_model');
		//$this->load->helper('cookie');
		$this->load->model('article_model');

		$this->form_validation->set_rules('title','Title','required|min_length[3]|max_length[20]|trim',['required'=>'请输入标题','min_length'=>'长度不符合要求','max_length'=>'长度不符合要求']);
		$this->form_validation->set_rules('content','content','required|min_length[1]|trim',['required'=>'请输入内容','min_length'=>'长度不符合要求']);
		$this->form_validation->set_rules('category','Category','trim|required',['required'=>'请输入类型']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('article/post');
		}else{
			$login_status = $this->user_model->check_login();
			//var_dump($login_status);die;
			if ($login_status == false) {
				die('请先登录');
				header('location:http://www.newlog.com/index.php/user/login');
			}
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			$category = $this->input->post('category');
			$uid= get_cookie('uid');
			$this->article_model->post_article($title,$content,$uid,$category);
			header('location:http://www.newlog.com/index.php/article/index');
		}
	}
}
?>