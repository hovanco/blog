<!DOCTYPE html>
<html lang="en">

<head>
	<title>Show List User</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
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
						<a class="nav-link" href="<?= base_url() ?>index.php/post_controller">User<span class="sr-only"></span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url() ?>index.php/news_controller">News<span class="sr-only"></span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url() ?>index.php/category_controller">Category<span class="sr-only"></span></a>
					</li>
				</ul>
				<ul class="navbar-nav" style="list-style-type: none;">
					<li class="nav-item active">
						<a class="nav-link" href="#">
							<b style="color: blue;"><?= $this->session->userdata('account_session'); ?></b>
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
		<div class="text-xs-center">
			<h3 class="display-6">Details Post</h3>
			<hr />
		</div>
	</div>

	<div class="container">
		<div class="row">
			<?php foreach ($all_details as $key => $value) : ?>
				<div class="card">
					<img class="card-img-top img-fluid" style="max-width: 50%; max-height: 50%; margin-left: 22px;" src="<?= $value['image'] ?>" alt="Card image cap" />
					<div class="card-block">
						<h5 class="card-text content"><b></b><?= $value['title'] ?></h5>
						<h6 class="card-text content"><b></b><?= $value['created_at'] ?></h6>
						</br>
						<p class="card-text content"><b></b><?= $value['content'] ?></p>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>

	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-6">List Comments</h3>
		</div>
	</div>

	<!-- show comment and username by post_id after table comments with users -->
	
	<div class="container">
		<?php foreach ($userComment as $key => $user) : ?>
			<div class="div">
				<div style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px; margin-top: 7px;">
					<span class="card-text content"><b>@<?= $user['user_name'] ?></b></span><br />
					<!-- <span class="card-text content"><b><?= $user['user_id'] ?></b></span><br /> -->
					<span class="card-text content" style="font-size: 12px;"> <?= $user['content'] ?></span><br />
					<br />
					<!-- <p class="card-text edit">
						<small><a href="</?= base_url() ?>index.php/post_controller/editComment/</?= $user['id'] ?>" class="">Update <i
									class="fa fa-pencil"></i></a>
						</small>
						<small><a style="color:red;" href="</?= base_url() ?>index.php/post_controller/deleteComment/</?= $user['id'] ?>"
								class="">Delete <i class="fa fa-remove"></i></a>
						</small>
        	</p> -->
					<?php
						$session_id = $this->session->userdata('user_id');
						if ($session_id == $user['user_id']) {
							require('btn_view.php');
						}
					?>
				</div>
			</div>
			<br />
			
		<?php endforeach ?>
	</div>

	<div class="container">
		<div class="">
			<div class="form-comment">
				<form action="<?= base_url() ?>index.php/post_controller/addComment" method="post" enctype="multipart/form-data">
					<div class="input-comment">
						<input type="text" name="content" style="width: 100%; height:50px; padding:10px; outline:none;" class="tag-input" required id="content" aria-describedby="content" placeholder="comment">
					</div>
					<input name="post_id" hidden type="number" value="<?= $value['id'] ?>" class="form-control" id="post_id">
					<input name="user_id" hidden type="number" value="<?= $this->session->userdata('user_id') ?>" class="form-control" id="user_id">
					<button style="margin-top: 20px;" type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
