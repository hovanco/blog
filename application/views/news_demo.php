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

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/news_demo.css'); ?>">

  </link>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-content" id="navbar-content">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>index.php/user_controller">HomePage<span
                class="sr-only"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>index.php/news_controller">News<span class="sr-only"></span></a>
          </li>
          <?php foreach ($categories as $key => $category) : ?>
          <li class="nav-item">
            <a class="nav-link"
              href="<?= base_url() ?>index.php/news_controller/getPostsByCategoryID/<?= $category['id'] ?>">
              <?= $category['name'] ?></a>
          </li>
          <?php endforeach ?>
        </ul>
      </div>
    </nav>
  </header>
  <!-- </?php require('news_header.php') ; ?> -->

  <section class="more-news">
    <div class="news-section">
      <article class="world">
        <a href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $news_array[0]['id'] ?>">
          <img class="main-image" src="<?= $news_array[0]['image'] ?>">
        </a>
        <a class="title-post-main"
          href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $news_array[0]['id'] ?>"><?= $news_array[0]['title'] ?></a>
      </article>

      <article class="second-world">
        <?php foreach ($news_array as $key => $main) :
					if ($key < 1 || $key >= 4) {
						continue;
					} 
				?>
        <div class="list-item">
          <a href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $main['id'] ?>">
            <img class="image-item" src="<?= $main['image'] ?>">
          </a>
          <a href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $main['id'] ?>"
            class="title-post-child"><?= $main['title'] ?></a>
        </div>
        <?php endforeach ?>
      </article>
      <hr style="margin-top: 14px;" />
    </div>


    <aside>
      <?php foreach ($news_array as $key => $read_alot) :
          if ($key < 4 || $key >= 11) continue; ?>
      <div class="recent-news">
        <a href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $read_alot['id'] ?>">
          <img src="<?= $read_alot['image'] ?>">
        </a>
        <a class="recent-news__title"
          href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $read_alot['id'] ?>"><?= $read_alot['title'] ?></a>

      </div>
      <?php endforeach ?>
    </aside>
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
