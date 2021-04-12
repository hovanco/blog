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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/homepage.css'); ?>">
  </link>

<body>
  <div class="wrapper">
    <header style="background-color: white;">
      <nav class="navbar">
        <div class="collapse navbar-collapse" id="collapsibleNavbar" style="display: block;">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>index.php/user_controller">Home<span
                  class="sr-only"></span></a>
            </li>
            <?php foreach ($categories as $key => $category) : ?>
            <li class="nav-item">
              <a class="nav-link"
                href="<?= base_url() ?>index.php/news_controller/getPostsByCategoryID/<?= $category['id'] ?>">
                <?= $category['id'] ?> - <?= $category['name'] ?></a>
            </li>
            <?php endforeach ?>
          </ul>
        </div>
      </nav>
    </header>

    <section class="more-news">
      <div class="news-section">
        <!-- latest news -->
        <article class="world">

				
				<?php print_r($posts); ?>

          <a href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $posts[0]['id'] ?>">
            <img class="main-image" style="margin-bottom: 10px;" src="<?= $posts[0]['image'] ?>">
          </a>
          <a style="display:-webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:2; overflow:hidden; text-overflow: ellipsis;"
            href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $posts[0]['id'] ?>"
            class="title-post-child"><?= $posts[0]['title'] ?></a>
        </article>

        <!-- The next 3 news -->
        <article class="second-world" style="width: 100%">
          <?php 

					echo "aaaaaaaaa";
					
					
					
					
					
					foreach ($posts as $key => $main) :
            if ($key < 1 || $key >= 4) {
              continue;
            } ?>
          <div class="list-item" style="width:33.33333%">
            <a href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $main['id'] ?>">
              <img class="image-item" src="<?= $main['image'] ?>">
            </a>
            <a style="display:-webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp:2; overflow:hidden; text-overflow: ellipsis;"
              href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $main['id'] ?>"
              class="title-post-child"><?= $main['title'] ?></a>
          </div>
          <?php endforeach ?>
        </article>
        <hr style="margin-top: 14px;" />
      </div>

      <!-- The next 7 news -->
      <aside>
        <?php foreach ($posts as $key => $post) :
          if ($key < 4 || $key >= 11) continue; ?>
        <div class="recent-news">
          <a href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $post['id'] ?>">
            <img src="<?= $post['image'] ?>">
          </a>
          <a
            href="<?= base_url() ?>./index.php/news_controller/newsDetails/<?= $post['id'] ?>"><?= $post['title'] ?></a>
        </div>
        <?php endforeach ?>
      </aside>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <h4>company</h4>
            <ul>
              <li><a href="#">about us</a></li>
              <li><a href="#">our services</a></li>
              <li><a href="#">privacy policy</a></li>
              <li><a href="#">affiliate program</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>get help</h4>
            <ul>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">shipping</a></li>
              <li><a href="#">returns</a></li>
              <li><a href="#">order status</a></li>
              <li><a href="#">payment options</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>online shop</h4>
            <ul>
              <li><a href="#">watch</a></li>
              <li><a href="#">bag</a></li>
              <li><a href="#">shoes</a></li>
              <li><a href="#">dress</a></li>
            </ul>
          </div>
          <div class="footer-col">
            <h4>follow us</h4>
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
  </div>
</body>

</html>
