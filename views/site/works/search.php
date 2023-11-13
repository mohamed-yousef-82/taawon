<<<<<<< HEAD
<div id="main-content" class="blog-page single">
            <h3 class="fullimg-width"><a href=""> <?php echo $lang["SEARCHRESAULTS"] ?></a></h3>
            <div class="container">
            <div class="row clearfix">
            <div class="col-lg-8 col-md-12 left-box">
=======
<?php require_once APP_PATH."views/site/layouts/inner-header.php" ?>
<div id="main-content" class="blog-page single">
            <h3 class="fullimg-width"><a href=""> <?php echo $lang["SEARCHRESAULTS"] ?></a></h3>
                <div class="container">
                <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
>>>>>>> 6fb3dc4 (first taawon)
<?php
if ($data) {
  foreach($data as $list){
  ?>
  <div class="card">
  <div class="body">
  <img class="img-post img-fluid mb-3" src="/<?php echo $list["image"] ?>" alt="">
  <h3>
  <a href="/works/article/<?php echo $list['id']."/".str_replace(" ", "-", $list["title_".$LN])?>"><?php echo $list["title_".$LN] ?></a>
  </h3>
  <p><?php echo $list["content_".$LN] ?></p>
  <a class="btn btn-warning news-btn" href="/works/article/<?php echo $list['id']."/".str_replace(" ", "-", $list["title_".$LN])?>"><?php echo $lang["MORE"]; ?></a>
 </div>
 </div>
<<<<<<< HEAD
=======

>>>>>>> 6fb3dc4 (first taawon)
  <?php
}
?>
<?php
} else {
  ?>
  <p class="nodatamsg">
    <?php echo $lang["NODATA"]; ?>
  </p>
  <?php
}
?>
</div>
<?php require_once APP_PATH."views/site/layouts/blogsidebar.php" ?>
</div>
<<<<<<< HEAD
=======
<?php require_once APP_PATH."views/site/layouts/inner-footer.php" ?>
>>>>>>> 6fb3dc4 (first taawon)
