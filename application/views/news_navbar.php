<header style="background-color: while;">
  <nav class="navbar">
    <div class="collapse navbar-collapse" id="collapsibleNavbar" style="display: block;">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>index.php/user_controller">HomePage<span
              class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a style="font-size:20px;" class="nav-link"
            href="<?= base_url() ?>index.php/news_controller">News<span class="sr-only"></span></a>
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
