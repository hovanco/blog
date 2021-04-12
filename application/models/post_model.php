<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class post_model extends CI_Model {

  public $variable;

  public function __construct()
  {
    parent::__construct();
  }
  
  // get data from controller and pass to db - add_post
  public function inserDataToDB($title,$content,$image,$user_id,$category_id,$created_at,$updated_at)
  {
    $data = array (
      'title' => $title,
      'content' => $content,
      'image' => $image,
      'user_id' => $user_id,
      'category_id' => $category_id,
			'created_at' => $created_at,
			'updated_at' => $updated_at
    );
    $this->db->insert('posts',$data);
    return $this->db->insert_id();
  }


	public function getCategories()
  {
    $this->db->select('*');
    $query = $this->db->get('categories');
    $categories = $query->result_array();
    return $categories;
  }

  // get all data to show in view
  // public function getAllData()
  // {
  //   $data = $this->db->select('*')->get('posts');
  //   $result = $data->result_array();
  //   return $result;
  // }

	//=============================================== PHAN TRANG ==============================================

	public function getAllData($numPostInPage)
  { 
    $this->db->select('*');
		$query = $this->db->get('posts',$numPostInPage,0);
    $posts = $query->result_array();
    return $posts;
  }


	public function numberPage($numPostInPage)
	{
		$this->db->select('*');
		$query = $this->db->get('posts');
		$posts = $query->result_array();
		$numPost = count($posts);
		$page = ceil($numPost/$numPostInPage);
		return $page;
	}


	public function displayPostInPage($page,$numPostInPage)
	{
		$this->db->select('*');
		$vitri = ($page-1) * $numPostInPage;
		$query = $this->db->get('posts',$numPostInPage,$vitri);
    $data = $query->result_array();
    return $data;
	}




	//=============================================== PHAN TRANG ==============================================



  // get data from database -UPDATE, details page
  public function getDataById($id)
  {
    $this->db->select('*');
    $this->db->where('id',$id);
    $query = $this->db->get('posts');
    $data = $query->result_array();
    return $data;
  }

  public function updateByID($id,$title,$content,$user_id,$image)
  {
    $data = array(
      'id' => $id,
      'title' => $title,
      'content' => $content,
      'user_id' => $user_id,
      'image' => $image
    );
    $this->db->where('id',$id);
    return $this->db->update('posts',$data);
  }

  public function removeDataByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('posts');
  }

  // =============== comment =======================
  public function insertCommentDataToDB($post_id,$user_id,$content)
  {
    $data = array (
      'post_id' => $post_id,
      'user_id' => $user_id,
      'content' => $content,
    );
    $this->db->insert('comments',$data);
    return $this->db->insert_id();
  }

  // get all comment from comment
  // public function getCommentAllData()
  // {
  //   $this->db->select('*');
  //   $query = $this->db->get('comments');
  //   $data = $query->result_array();
  //   return $data;
  // }

  public function getCommentByPostID($post_id)
  {
    $this->db->select('*');
    $this->db->where('post_id',$post_id);
    $query = $this->db->get('comments');
    $comment_data = $query->result_array();
    return $comment_data;
  }




  public function getCommentByID($id)
  {
    $this->db->select('*');
    $this->db->where('id',$id);
    $query = $this->db->get('comments');
    $data = $query->result_array();
    return $data;
  }

  // public function updateCommentByID($id,$content)
  // {
  //   $data = array(
  //     'id' => $id,
  //     'content' => $content,
  //   );
  //   $this->db->where('id',$id);
  //   return $this->db->update('comments',$data);
  // }


	public function updateCommentByID($id,$content)
  {
		$session_id = $this->session->userdata('user_id'); // make a variable account_id 
    $data = array(
      'id' => $id,
      'content' => $content
    );
    $this->db->where('id',$id);
    $this->db->where('user_id',$session_id); // check id of account have loged == id of user commented each post id
    // $this->db->where('id',$id,'user_id',$session_id); // wrong, userA can edit comment userB
		$data = $this->db->update('comments',$data);
    return $data;
  }

  public function removeCommentByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('comments');
  }

  public function getUserComment($post_id)
  {
    $this->db->select('*');
    $this->db->where('post_id',$post_id);
    $this->db->from('users');
    $this->db->join('comments','comments.user_id = users.id');
    $query = $this->db->get();
    $user = $query->result_array();
    return $user;
  }

  //get username and comment from comments join users table
  // public function getAllUserComment()
  // {
  //   $this->db->select('*');
  //   $this->db->from('users');
  //   $this->db->join('comments','comments.user_id = users.id');
  //   $query = $this->db->get();
  //   $user = $query->result_array();
  //   return $user;
  // }
  
}
