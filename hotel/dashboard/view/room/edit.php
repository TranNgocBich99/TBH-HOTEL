<?php
$role = ue_get_role();
if(!in_array($role, array(0,1))){
  header('Location:' . SITEURL);
  exit();
}
?>
<h3>Sửa thông tin phòng</h3>
<?php
if(!empty($book)) {
  ?>
<form action="" method="post" name ="myform" enctype="multipart/form-data" mb-5>
  <div class="form-group">
    <label for="exampleInputEmail1" class="label mt-5">Ảnh</label>
    <img src="<?php echo SITEURL . 'assets/' . $book['thumb']; ?>" width="50" height="50" />
            <input type="file" name="thumb">
            <input type="hidden" name="thumb_temp" value="<?php echo $book['thumb']; ?>">
            <br />
    <br />
    <label for="exampleInputEmail2" class="label mt-3">Tên phòng</label>
    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Tên phòng" name="room_name", value="<?php echo UE_Input::post( 'room_name', $book['room_name'] ); ?>">
    <?php
          if(isset($err['name'])){
            ?>
            <div class="alert alert-danger">
            <?php 
              echo $err['name'];
            ?>
             </div>
            <?php
          }
      ?>
    <label for="exampleInputEmail3" class="label mt-3">Giá</label>
    <input type="text" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Giá" name="price" value="<?php echo UE_Input::post( 'price', $book['price'] ); ?>">
    <div class="row">
      <div class="col-sm-6">
        <label for="exampleInputEmail4" class="label mt-3">Người lớn</label>
        <input type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp" placeholder="Người lớn" name="adults" value="<?php echo UE_Input::post( 'adults', $book['adults'] ); ?>">
      </div>

      <div class="col-sm-6">
        <label for="exampleInputEmail5" class="label mt-3">Trẻ em</label>
        <input type="text" class="form-control" id="exampleInputEmail5" aria-describedby="emailHelp" placeholder="Trẻ em" name="children" value="<?php echo UE_Input::post( 'children', $book['children'] ); ?>">
      </div>
    </div>
    <label for="exampleInputEmailDanhMUc" class="label mt-3">Danh mục</label>
    <!-- <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Danh mục" name="category_id"> -->
    <select name="category_id" id="exampleInputEmailDanhMUc" class="form-control">
    <?php
        if ( ! empty( $cate ) ) {
          foreach ( $cate as $k => $v ) {
            $selected     = '';
            $current_cate = UE_Input::post( 'category_id', $book['category_id'] );
            if ( $current_cate == $v['category_id'] ) {
              $selected = 'selected';
            }
            ?>
                        <option value="<?php echo $v['category_id']; ?>" <?php echo $selected; ?>> <?php echo $v['category_name']; ?> </option>
            <?php
          }
        }

        ?>
    </select>
    </br>

     <label for="exampleInputEmail7" class="label mt-3">Mô tả</label>
    <textarea type="text" class="form-control" id="exampleInputEmail7" rows="5" aria-describedby="emailHelp" placeholder="Mô tả" name="confirmation"><?php echo UE_Input::post( 'confirmation', $book['confirmation'] ); ?></textarea>
  </div>
   <br/>
  <button type="submit" class="btn btn-primary mb-10 btn-add" name="edit-room">Sửa</button>
 
</form>
<?php

}

?>