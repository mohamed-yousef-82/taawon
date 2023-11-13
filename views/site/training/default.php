<<<<<<< HEAD
=======
<?php require_once APP_PATH."views/site/layouts/inner-header.php" ?>
>>>>>>> 6fb3dc4 (first taawon)
<div id="main-content" class="blog-page single">
            <h3 class="fullimg-width"><a href=""> <?php echo $lang["TRAINING"] ?></a></h3>
                <div class="container">
                <div class="singlepage">
<?php
if ($data) {
  ?>
  <pre>
      <?php echo $data["content_".$LN] ?? "لا يوجد محتوي لعرضه" ?>
      </pre>

  <?php

} else {
  ?>
  <p>
    <?php echo $lang["NODATA"]; ?>
  </p>


  <?php
}
?>
<<<<<<< HEAD
=======
<?php require_once APP_PATH."views/site/layouts/inner-footer.php" ?>
>>>>>>> 6fb3dc4 (first taawon)
