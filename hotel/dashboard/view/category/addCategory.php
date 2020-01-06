<?php
$role = ue_get_role();
if(!in_array($role, array(0))){
  header('Location:' . SITEURL);
  exit();
}
?>
<h3>Thêm danh mục</h3>
<form action="" method="post" name ="myform" enctype="multipart/form-data" mb-5>
  <div class="form-group">
    <label for="exampleInputEmail1" class="label mt-5">Ảnh</label>
    <input type="file"  name="thumb">
    <br />
    <label for="exampleInputEmail2" class="label mt-3">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Tên phòng" name="category_name">
     <label for="exampleInputEmail7" class="label mt-3">Mô tả</label>
    <textarea type="text" class="form-control" id="exampleInputEmail7" rows="5" aria-describedby="emailHelp" placeholder="Mô tả" name="description"></textarea>
  </div>
   <br/>
  <button type="submit" class="btn btn-primary mb-10 btn-add" name="add_category">Thêm</button>
 
</form>