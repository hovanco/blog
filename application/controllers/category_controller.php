<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class category_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
		// show categories
		$this->load->model('category_model');
    $query = $this->category_model->getCategories();
    $categories = array("categories" => $query);

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('category_view', $categories);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
  }

	public function addCategory()
	{
		$name = $this->input->post('name');
		$this->load->model('category_model');
    $result = $this->category_model->insertCategory($name);
    if ($result) {
			redirect("http://localhost:8080/blog/index.php/category_controller");
    } else {
      echo "fail";
    }
	}
	
	public function editCategory($id)
	{
		$this->load->model('category_model');
		$query = $this->category_model->getCategoryByID($id);
		$category_id = array('category_id' => $query);

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('category_update_view', $category_id, false);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
	}

	public function updateCategory()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$this->load->model('category_model');
    if ($this->category_model->updateCategoryByID($id,$name)) {
      redirect("http://localhost:8080/blog/index.php/category_controller");
    } else {
      echo "false";
    }
	}

	public function deleteCategory($id)
	{
		$this->load->model('category_model');
		$result = $this->category_model->removeCategory($id);
    if ($result) {
      redirect("http://localhost:8080/blog/index.php/category_controller");
    } else {
      echo "fail";
    }
	}
	
}
