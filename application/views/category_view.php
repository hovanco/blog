<!DOCTYPE html>
<html lang="en">

<head>
  <title>Show List Categories</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- use bootstrap and css -->
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
	<link 
    rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
    crossorigin="anonymous"
  />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/category_view.css'); ?>">
  </link>
</head>

<body>
  <nav class="navbar navbar-light bg-faded" style="background-color: cyan;">
    <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
      <div class="style-navbar" style="display: flex; justify-content: space-between;">
        <ul class="navbar-nav" style="list-style-type: none;">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/user_controller">User<span class="sr-only"></span></a>
          </li>
					<li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/news_controller">News<span class="sr-only"></span></a>
          </li>
					<li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/post_controller">Post<span class="sr-only"></span></a>
          </li>
        </ul>
        <ul class="navbar-nav" style="list-style-type: none;">
          <li class="nav-item active">
            <a class="nav-link" href="#">
						<i class="fas fa-user"></i>
              <b style="color: blue;"><?= $this->session->userdata('account_session'); ?></b>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" style="font-size: 10px; margin-top: 5px;" href="<?= base_url() ?>index.php/login_form_controller/getLogout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="text-xs-center">
      <h3 class="display-6">List Categories</h3>
      <hr />
    </div>

		<div class="container-table">
				<table>
					<tr>
						<th>No.</th>
						<th>id</th>
						<th>name</th>
						<th>action </th>
					</tr>

					<?php foreach ($categories as $key => $category) : ?>
					<tr>
						<td><?= $key+1 ?></td>
						<td><?= $category['id'] ?></td>
						<td><?= $category['name'] ?></td>
						<td>
							<small><a href="<?= base_url() ?>./index.php/category_controller/editCategory/<?= $category['id'] ?>" 
                class="btn btn-warning btn-xs">Update <i class="fa fa-pencil"></i></a>
              </small>

              <small><a href="<?= base_url() ?>./index.php/category_controller/deleteCategory/<?= $category['id'] ?>" 
                class="btn btn-outline-danger btn-xs">Delete <i class="fa fa-remove"></i></a>
              </small>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div>
  </div>

  <div class="container">
    <div style="margin-top: 50px;" class="row">
      <!-- <?php foreach ($categories as $key => $category) : ?>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-block">
							<h5 class="card-title title">id:    <b><?= $category['id'] ?></b></h5>
              <h5 class="card-title title">name:  <b><?= $category['name'] ?></b></h5>
              <p class="card-text edit">
                <small><a href="<?= base_url() ?>./index.php/category_controller/editCategory/<?= $category['id'] ?>" 
                class="btn btn-warning btn-xs">Update <i class="fa fa-pencil"></i></a>
                </small>
                <small><a href="<?= base_url() ?>./index.php/category_controller/deleteCategory/<?= $category['id'] ?>" 
                class="btn btn-outline-danger btn-xs">Delete <i class="fa fa-remove"></i></a>
                </small>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach ?> -->

      <div class="container">
        <div class="text-xs-center">
          <h3 class="display-6">Add New Category</h3>
          <hr />
        </div>
        <form class="form-style" action="<?= base_url() ?>./index.php/category_controller/addCategory" method='post' enctype="multipart/form-data" 
          >

          <div class="form-group row">
            <label for="name" class="col-sm-4 form-control-label text-xs-right"></label>
            <div class="col-sm-8">
              <input name="name" type="text" class="form-control" placeholder="category name" id="name">
            </div>
          </div>

          <div class="form-group row">
            <button type="submit" class="btn-add">Add
              New</button>
          </div>
      </div>

			



    </div>
    </form>
  </div>

	
</body>

</html>
