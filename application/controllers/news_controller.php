<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news_controller extends CI_Controller
{

	public function __construct()
	{
		
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('news_model');
		$news = $this->news_model->getRecentElevenNew();
		$categories = $this->news_model->getCategories();

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('news_homepage_view', array('news_array' => $news,'categories' => $categories), false);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
	}

	public function newsDetails($id)
	{
		$this->load->model('news_model');
		$news_details = $this->news_model->getNewsByID($id);
		$query = $this->news_model->getUserComment($id);
		// $this->load->view('news_details', array('newsDetails' => $news_details, 'userComment' => $query), false);
		$categories = $this->news_model->getCategories();

		$news = $this->news_model->getRecentElevenNew();

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('news_details', array('newsDetails' => $news_details, 'userComment' => $query, 'categories' => $categories, 'news' => $news), false);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
	}

	public function addComment()
	{
		$post_id = $this->input->post("post_id");
		$user_id = $this->session->userdata('user_id');
		$content = $this->input->post("content");
		$this->load->model('news_model');
		$result = $this->news_model->insertComment($post_id, $user_id, $content);
		if ($result) {
			redirect(base_url("index.php/news_controller/newsDetails/" . $post_id));
		} else {
			echo "fail";
		}
	}

	public function editComment($id)
	{
		$this->load->model('news_model');
		$this->news_model->getCommentByID($id);
		$query = $this->news_model->getCommentByID($id);
		$data = array('getCommentByID' => $query);
		$this->load->view('news_update_comment',$data, FALSE);
	}

	public function updateComment()
  { 
    $id = $this->input->post('id');
    $content = $this->input->post('content');
    $this->load->model('news_model');
    if($this->news_model->updateCommentByID($id,$content))
    {
      redirect(base_url() . "index.php/news_controller/");
    }else{
      echo "false";
    }
  }

	public function deleteComment($id)
	{
		$this->load->model('news_model');
		if($this->news_model->removeCommentByID($id))
		{
			redirect(base_url() . "index.php/news_controller");
		}else{
			echo "fail";
		}
	}

	public function getUserByCommentID($post_id)
	{
		$this->load->model('news_model');
		$query = $this->news_model->getUserComment($post_id);
		$user = array("userComment" => $query);

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('list_comment_view', $user);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
	}

	public function getPostsByCategoryID($category_id)
	{
		$this->load->model('news_model');
		$data = $this->news_model->getPostByCategoryID($category_id);
		$posts = array("posts" => $data);
		//$posts = $data;
		$categories = $this->news_model->getCategories($category_id);
		
		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('news_header', array('posts' => $posts,'categories' => $categories), false);
			// $this->load->view('world_view', array('posts' => $posts,'categories' => $categories), false);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}

  }

  public function getCategories()
	{
		$this->load->model('news_model');
		$data = $this->news_model->getCategories();
		$categories = array("categories" => $data);
		
		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			// $this->load->view('news_header', $categories);
			// $this->load->view('world_view', $categories);
			$this->load->view('news_navbar', $categories);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}


	}
}
