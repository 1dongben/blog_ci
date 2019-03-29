<?php
/**
 * 
 */
class Article_model extends CI_model
{
	
	function __construct()
	{
		$this->load->database();
	}

	public function article_list()
	{
		$query = $this->db->select('*')->limit(5)->order_by('id','ASC')->get('article')->result_array();
		return $query;
	}

	public function article_detail($id)
	{
		$query = $this->db->select('*')->where('id',$id)->get('article')->row_array();
		return $query;
	}

	public function post_article($title,$content,$user_id,$category)
	{
		$data = [
			'title'=>$title,
			'content'=>$content,
			'user_id'=>$user_id,
			'category'=>$category,
			'create_time'=>date('Y-m-d H:i:s')
		];
		$this->db->insert('article',$data);
	}

	public function delete_article($id)
	{
		$this->db->delete('article',['id'=>$id]);
	}

	public function update_article($id,$title,$article,$category)
	{
		$data = [
			'id'=>$id,
			'title'=>$title,
			'content'=>$content,
			'category'=>$category,
		];
		$this->db->replace('article',$data);
	}
}
?>