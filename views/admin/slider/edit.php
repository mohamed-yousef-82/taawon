<h3 class="table-title"><span><?php echo $lang["EDIT"] ?></span><i class="fa fa-building" aria-hidden="true"></i></h3>
<div id="data">
<form class="form add-form" method="post"  enctype="multipart/form-data">
<label>العنوان بالعربية :</label>
 <input type="text" name="title_ar" value="<?php echo $data['title_ar'] ?? false ?>" />
 <input type="hidden" name="id" value="<?php echo $data['id'] ?? false ?>" />
 <label>العنوان يالإنجليزية :</label>
 <input type="text" name="title_en" value="<?php echo $data['title_en'] ?? false  ?>" />
 <label>الوصف بالعربية :</label>
 <textarea  class="textarea" name="content_ar"><?php echo $data['content_ar'] ?? false  ?></textarea>
 <label>الوصف بالإنجليزية :</label>
 <textarea  class="textarea" name="content_en"><?php echo $data['content_en'] ?? false  ?></textarea>
 <input class="start-btn blue" type="submit" name="edit" value="<?php echo $lang["EDIT"] ?>" />
</form>
</div>