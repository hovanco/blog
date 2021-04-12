<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news_model extends CI_Model
{

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	// get all news
	public function getNews()
	{
		$this->db->select('*');
		$query = $this->db->get('posts');
		$news = $query->result_array();
		return $news;
	}

	// get just one the latest news
	public function getLastRecord()
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get()->row();
		return $query;
	}

	// get a lot of latest news by limit
	public function getRecentElevenNew(){
		// $this->db->limit(11);
		$this->db->select('*');
		$this->db->order_by('created_at','desc');
		$query = $this->db->get('posts');
		return $query->result_array();
	}

	// vrite code using query builder class -c1
	public function getElevenNews()
	{
		// $data = $this->db->select('*')->from('table')->where(id,$uid)->order_by('id',"desc")->limit(1)->get()->result();
		$data = $this->db->select('*')->from('posts')->order_by('id', "desc")->limit(11)->get();
		return $data->result_array();
	}

	// vrite code using query builder class -c2
	public function getCurrentElevenNew(){
    $query = $this->db->select('*')
    ->from('posts')
    ->limit(11)
    ->order_by('id','DESC')
    ->get();
		return $query->result_array();
  }


	public function getNewsByID($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('posts');
		$data = $query->result_array();
		return $data;
	}

	public function insertComment($post_id, $user_id, $content)
	{
		$data = array(
			'post_id' => $post_id,
			'user_id' => $user_id,
			'content' => $content,
		);
		$this->db->insert('comments', $data);
		return $this->db->insert_id();
	}

	// public function getUserComment($post_id)
	// {
	//   $this->db->select('*');
	//   $this->db->where('post_id',$post_id);
	//   $this->db->from('users');
	//   $this->db->join('comments','comments.user_id = users.id');
	//   $query = $this->db->get();
	//   $user = $query->result_array();
	//   // return $user;
	// 	echo "<pre/>";
	// 	var_dump($user);
	// }

	// get all comment from comment
	public function getCommentAllData()
	{
		$this->db->select('*');
		$query = $this->db->get('comments');
		$data = $query->result_array();
		return $data;
	}

	// public function getCommentByPostID($post_id)
	// {
	//   $this->db->select('*');
	//   $this->db->where('post_id',$post_id);
	//   $query = $this->db->get('comments');
	//   $comment_data = $query->result_array();
	//   return $comment_data;
	// }

	public function getCommentByID($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('comments');
		$data = $query->result_array();
		return $data;
	}

	public function updateCommentByID($id, $content)
	{
		$data = array(
			'id' => $id,
			'content' => $content,
		);
		$this->db->where('id', $id);
		return $this->db->update('comments', $data);
	}

	public function removeCommentByID($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('comments');
	}

	public function getUserComment($post_id)
	{
		$this->db->select('*');
		$this->db->where('post_id', $post_id);
		$this->db->from('users');
		$this->db->join('comments', 'comments.user_id = users.id');
		$query = $this->db->get();
		$user = $query->result_array();
		return $user;
	}

	public function getCategories()
  {
    $this->db->select('*');
    $query = $this->db->get('categories');
    $categories = $query->result_array();
    return $categories;
  }

	public function getPostByCategoryID($category_id)
  {
    $this->db->select('*');
    $this->db->where('category_id',$category_id);
    $query = $this->db->get('posts');
    $posts = $query->result_array();
		// echo "<pre/>";
		// var_dump($posts);
    return $posts;
  }

	public function getdata($category_id){	
		$this->db->select('*');
		$this->db->where('category_id', $category_id);
		$this->db->from('categories'); // this is first table name
		$this->db->join('posts', 'posts.category_id = categories.id'); // this is second table name with both table ids
		$query = $this->db->get();
		$alldata = $query->result_array();
		// echo "<pre/>";
		// var_dump($alldata);
		return $alldata;
	}


}
