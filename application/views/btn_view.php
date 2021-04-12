<p style="margin-top: 20px;" class="card-text edit">
  <small><a href="<?= base_url() ?>index.php/news_controller/editComment/<?= $user['id'] ?>" class="">Update <i
        class="fa fa-pencil"></i></a>
  </small>
  <small><a style="color:red;" href="<?= base_url() ?>index.php/post_controller/deleteComment/<?= $user['id'] ?>"
      class="">Delete <i class="fa fa-remove"></i></a>
  </small>
</p>
