<?php

?>
</br></br>
<h4 >Thêm người dùng</h4>
</br>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail2" class="label mt-3">Tên đăng nhập</label>
    <input type="text" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Tên đăng nhập" name="username">
    <label for="exampleInputEmail3" class="label mt-3">Mật khẩu</label>
    <input type="password" class="form-control" id="exampleInputEmail3" aria-describedby="emailHelp" placeholder="Mật khẩu" name="password">
    <label for="exampleInputEmail4" class="label mt-3">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail4" aria-describedby="emailHelp" placeholder="Email" name="email">
    <label for="exampleInputEmail5" class="label mt-3">Quyền</label>
    <select name="role" id="exampleInputEmail5" class="form-control">
        <?php
        foreach (ue_get_role_data() as $k => $v){
            echo '<option value="'. $k .'">'. $v .'</option>';
        }
        ?>
    </select>
  </br>
  </div>
   <?php UE_Message::show('message'); ?>
   <br/>
  <button type="submit" class="btn btn-primary" name="add_user">Thêm</button>
 
</form>