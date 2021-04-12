<?php if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class post_controller extends CI_Controller
{
	private $numPostInPage;
  public function __construct()
  {
    parent::__construct();
		$this->load->model('post_model');
		$this->numPostInPage = 9;
  }

  public function index()
  {
		// cach add key vao array de hien thi ra mang

		// $products = $this->post_model->getProducts();
		// $comments = $this->post_model->getComments();
		// $data = array(
		// 	'products' => $products,
		// 	'comments' => $comments
		// );
		// $this->load->view('ProductView',$data);

    $this->load->model('post_model');
    $result = $this->post_model->getAllData($this->numPostInPage);
    $numPage = $this->post_model->numberPage($this->numPostInPage);
		$ctegories = $this->post_model->getCategories();

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('post_view', array('arr_result' => $result,'categories' => $ctegories,'numPage' => $numPage), false);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
  }

  public function add_post()
  {
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    if ($_FILES["image"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    $image =  base_url() . "Fileupload/" . basename($_FILES[("image")]["name"]);
    $title = $this->input->post('title');
    $content = $this->input->post('content');
    $user_id = $this->session->userdata('user_id');
		$category_id = $this->input->post('category_id');
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // set times in which country ?
		$created_at = date('Y-m-d H:i:s');
		$updated_at = date('Y-m-d H:i:s');

    $this->load->model('post_model');
    $result = $this->post_model->inserDataToDB($title, $content, $image, $user_id, $category_id, $created_at, $updated_at);
    if ($result) {
      redirect("http://localhost:8080/blog/index.php/post_controller/");
    } else {
      echo "fail";
    }
  }

  // call func getDataById from model
  public function update_post($id)
  {
    $this->load->model('post_model');
    $this->post_model->getDataById($id);
    $data = $this->post_model->getDataById($id);
    $data = array('data_result' => $data);

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('post_update_view', $data, false);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
  }


  public function update_data_post()
  {
    // handle upoad file image
    $target_dir = "Fileupload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    if ($_FILES["image"]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      } else {
      }
    }

    // get data form view edit
    $image = basename($_FILES["image"]["name"]);
    $id = $this->input->post('id');
    $title = $this->input->post('title');
    $content = $this->input->post('content');
    $user_id = $this->session->userdata('user_id');

    if ($image) {
      $image = base_url() . "Fileupload/" . basename($_FILES["image"]["name"]);
    } else {
      $image = $this->input->post('image2');
    }

    $this->load->model('post_model');
    if ($this->post_model->updateByID($id, $title, $content, $user_id, $image)) {
      redirect("http://localhost:8080/blog/index.php/post_controller");
    } else {
      echo "false";
    }
  }

  public function delete_post($id)
  {
    $this->load->model('post_model');
    if ($this->post_model->removeDataByID($id)) {
      redirect("http://localhost:8080/blog/index.php/post_controller");
    } else {
      echo "fail";
    }
  }

  public function detail_post($id)
  {
    $this->load->model('post_model');
    $details = $this->post_model->getDataById($id);
    $data = $this->post_model->getCommentByPostID($id);
    $query = $this->post_model->getUserComment($id);

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('post_detail_view', array('all_details' => $details, "comment_arr" => $data, "userComment" => $query), false);  // push key(data) in to array
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
  }
  // =========================================   comment   =====================

  public function addComment()
  {
    $post_id = $this->input->post("post_id");
    $user_id = $this->session->userdata('user_id');
    $content = $this->input->post("content");
    $this->load->model('post_model');
    $result = $this->post_model->insertCommentDataToDB($post_id, $user_id, $content);
    if ($result) {
      redirect(base_url() . "index.php/post_controller/detail_post/" . $post_id);
    } else {
      echo "fail";
    }
  }

  // get all comment with all post from * comments
  // public function getdata()
  // {
  //   $this->load->model('post_model');
  //   $data = $this->post_model->getCommentAllData();
  //   $comment = array("comment_arr" => $data);

	// 	// check session user have already loged or no
	// 	if ($this->session->userdata('account_session')) {
	// 		$this->load->view('list_comment_view',$comment);
	// 	} else {
	// 		redirect('http://localhost:8080/blog/index.php/login_form_controller');
	// 	}
  // }

  // get all comment with each post by post_id of comments table
  // public function getAllCommentByPostID($post_id)
  // {
  //   $this->load->model('post_model');
  //   $data = $this->post_model->getCommentByPostID($post_id);
  //   $comment = array("comment_arr" => $data);
  //   $this->load->view('list_comment_view', $comment);
  // }

  // show data want to update by id_comment
  public function editComment($id)
  {
    $this->load->model('post_model');
    $query = $this->post_model->getCommentByID($id);
    $data = array('getCommentByID' => $query);
		$this->load->view('comment_update_view',$data, FALSE);
  }

  // update comment after enter submit btn 
  public function updateComment()
  { 
		$id = $this->input->post('id');
    $content = $this->input->post('content');
    $this->load->model('post_model');
		if($this->post_model->updateCommentByID($id,$content))
		{
			redirect(base_url() . "index.php/post_controller");
		}else{
			echo "false";
		}
  }


	
  // delete comment by id
  public function deleteComment($id)
  {
    $this->load->model('post_model');
    if($this->post_model->removeCommentByID($id))
    {
      redirect(base_url() . "index.php/post_controller");
    }else{
      echo "fail";
    }
  }

  // get user and comment by posst id
  public function getUserByCommentID($post_id)
  {
    $this->load->model('post_model');
    $query = $this->post_model->getUserComment($post_id);
    $user = array("userComment" => $query);
		$this->load->view('list_comment_view', $user);
		
  }

  // get all user and all comment
  public function getAllUserCommentPost()
  {
    $this->load->model('post_model');
    $query = $this->post_model->getAllUserComment();
    $user = array("userCommentDemo" => $query);

		// check session user have already loged or no
		if ($this->session->userdata('account_session')) {
			$this->load->view('list_post_view', $user);
		} else {
			redirect('http://localhost:8080/blog/index.php/login_form_controller');
		}
  }

	//  ================================================ PANIGATION ================================

	public function page($page)
	{
		$result = $this->post_model->displayPostInPage($page, $this->numPostInPage);
    $numPage = $this->post_model->numberPage($this->numPostInPage);
		$ctegories = $this->post_model->getCategories();
		$this->load->view('post_view', array('arr_result' => $result,'categories' => $ctegories,'numPage' => $numPage), false);
	}
}
