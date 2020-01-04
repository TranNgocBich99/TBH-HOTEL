<?php
$role = ue_get_role();
if(!in_array($role, array(0))){
  header('Location:' . SITEURL);
  exit();
}
?>

<h3>Sửa danh mục</h3>
<?php
	if(!empty($data)){

?>
<form action="" method="post" name ="myform" enctype="multipart/form-data" mb-5>
  <div class="form-group">
    <label for="exampleInputEmail1" class="label mt-5">Ảnh</label>
     <img src="<?php echo SITEURL . 'assets/' . $data['thumb']; ?>" width="50" height="50" />
            <input type="file" name="thumb">
            <input type="hidden" name="thumb_temp" value="<?php echo $data['thumb']; ?>">
            <br />
    <br />
    <label for="exampleInputEmail2" class="label mt-3">Tên danh mục</label>
    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Tên phòng" name="category_name" value="<?php echo $data['category_name'] ?>">
     <label for="exampleInputEmail7" class="label mt-3">Mô tả</label>
    <textarea type="text" class="form-control" id="exampleInputEmail7" rows="5" aria-describedby="emailHelp" placeholder="Mô tả" name="description"><?php echo UE_Input::post( 'description', $data['description'] ); ?></textarea>
  </div>
   <br/>
  <button type="submit" class="btn btn-primary mb-10 btn-add" name="edit-category">Sửa</button>
 
</form>
<?php
	}
?>