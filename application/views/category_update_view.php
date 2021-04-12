<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Category</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- use bootstrap and css -->
  <script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>1.css">
</head>

<body>
  <nav class="navbar navbar-light bg-faded" style="background-color: cyan;">
    <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
      <div class="style-navbar" style="display: flex; justify-content: space-between;">
        <ul class="navbar-nav" style="list-style-type: none;">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/post_controller">Post</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/news_controller">News</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/category_controller">Category</a>
          </li>
        </ul>

        <ul class="navbar-nav" style="list-style-type: none;">
          <li class="nav-item active">
            <a class="nav-link" href="" style="cursor: context-menu;">
              <i class="fas fa-user"></i>
              <b style="color: blue;"><?= $this->session->userdata('account_session');?></b>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>index.php/login_form_controller/getLogout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="container">
        <div class="text-xs-center">
          <h3 class="display-6">Update Category</h3>
          <hr />
        </div>
        <form action="<?=base_url()?>./index.php/category_controller/updateCategory" method='post'
          enctype="multipart/form-data" style=" padding-right: 176px; padding-top: 50px; background: pink; border-radius: 12px; 
          box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, 
          rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, 
          rgba(0, 0, 0, 0.09) 0px -3px 5px;
          background-image: linear-gradient(#009fff,#ec2f4b);">

          <?php foreach ($category_id as $key => $category): ?>

          <!-- <div class="form-group row">
            <label for="id" class="col-sm-4 form-control-label text-xs-right"><b>ID</b></label>
            <div class="col-sm-8">
              <input name="id" type="number" value="</?=$category['id']?>" class="form-control" placeholder="Rain"
                id="id">
            </div>
          </div> -->

          <div class="form-group row">
            <label for="name" class="col-sm-4 form-control-label text-xs-right"><b>Name</b></label>
            <div class="col-sm-8">
              <input name="name" type="text" required value="<?=$category['name']?>" class="form-control" id="name">
            </div>
          </div>
          <?php endforeach ?>

          <div class="form-group row">
            <button type="submit" class="btn btn-primary" style="margin-left: 35%; margin-bottom: 45px;">Update</button>
          </div>
      </div>
    </div>
    </form>
  </div>
</body>

</html>
