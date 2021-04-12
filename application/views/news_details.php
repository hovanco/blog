<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Document</title>

	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>1.css">

	<!-- <link rel="stylesheet" type="text/css" href="</?php echo base_url('assets/css/news_detail.css'); ?>"></link> -->

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/news_detail.css'); ?>" />

<body>
	<header>
		<nav class="navbar">
			<div class="navbar-content" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>index.php/user_controller">HomePage<span></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>index.php/news_controller">News<span></span></a>
					</li>
					<?php foreach ($categories as $key => $category) : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url() ?>index.php/news_controller/getPostsByCategoryID/<?= $category['id'] ?>">
								<?= $category['name'] ?></a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</nav>
	</header>

	<section class="content">
		<div class="content__main-news">
			<?php foreach ($newsDetails as $key => $value) : ?>
				<h2 class="title-content"><?= $value['title'] ?></h2>
				<h4 class="date-content"><?= $value['created_at'] ?></h4>
				<br />
				<p class="desc-content"><?= $value['content'] ?></p>

				<div class="mean-news">
					<img class="mean-news__image" src="<?= $value['image'] ?>">
				</div>
			<?php endforeach ?>

			<div class="related-news">
				<a class="related-news__link" href="#" class="">Quốc hội miễn nhiệm Thủ tướng, Chủ tịch nước trong ngày 2/4</a>
				<br />
				<a class="related-news__link" href="#" class="">Chính phủ rút đề xuất sửa đổi Luật Đất đai</a>
			</div>


			<?php foreach ($userComment as $key => $user) : ?>
				<div class="list-comment">
					<span class="card-text"><b>@<?= $user['user_name'] ?></b></span>
					<p> <?= $user['content'] ?></p>
					<?php
						$session_id = $this->session->userdata('user_id');
						if ($session_id == $user['user_id']) {
							require('btn_view.php');
						}
					?>
				</div>
				<br />
			<?php endforeach ?>



			<div class="comment-form">
				<form action="<?= base_url() ?>index.php/news_controller/addComment" method="post" enctype="multipart/form-data">
					<div class="comment-box">
						<input class="comment-box__tag-input" type="text" name="content" required id="content" placeholder="comment">
					</div>
					<input class="form-control" name="post_id" hidden type="number" value="<?= $value['id'] ?>" id="post_id">
					<input name="user_id" hidden type="number" value="<?= $this->session->userdata('user_id') ?>" class="form-control" id="user_id">
					<button type="submit" class="btn-submit">Submit</button>
				</form>
			</div>
		</div>

		<div class="content__read-more">
			<h3 class="read-a-lot">Xem nhiều</h3>
			<div class="recent-news">
				<img src="<?= $news[0]['image'] ?>">
				<a class="recent-news__title recent-news__title-header" href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $news[0]['id'] ?>"><?= $news[0]['title'] ?></a>
			</div>
			<?php foreach ($news as $key => $new) :
				if ($key < 31 || $key >= 34) continue; ?>
					<div class="recent-news">
						<a  class="recent-news__title" href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $new['id'] ?>">
							<?= $new['title'] ?>
						</a>
					</div>
			<?php endforeach ?>
		</div>
	</section>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="footer-col">
					<h4>Mới nhất</h4>
					<ul>
						<li><a href="#">Thời sự</a></li>
						<li><a href="#">Góc nhìn</a></li>
						<li><a href="#">Thế giới</a></li>
						<li><a href="#">Kinh doanh</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Xem nhiều</h4>
					<ul>
						<li><a href="#">Thể thao</a></li>
						<li><a href="#">Pháp luật</a></li>
						<li><a href="#">Giáo dục</a></li>
						<li><a href="#">Sức khỏe</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Tin nóng</h4>
					<ul>
						<li><a href="#">Số hóa</a></li>
						<li><a href="#">Xe</a></li>
						<li><a href="#">Tâm sự</a></li>
						<li><a href="#">Hài</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Quan tâm</h4>
					<div class="social-links">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-instagram"></i></a>
						<a href="#"><i class="fab fa-linkedin-in"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>

</html>
