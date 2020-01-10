
<?php
if(!empty($user)){
	?>
	<h4>Sửa thông tin</h4>
	<form action="" method="post">
	  <div class="form-group">
	    <label for="exampleInputEmail1" class="label mt-5">Tên đầy đủ</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên đầy đủ" name="username" value="<?php echo UE_Input::post('username', $user['username']); ?>">

	    <label for="exampleInputEmail2" class="label mt-3">Mật khẩu</label>
	    <input type="password" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Mật khẩu" name="password" value="">
	    <?php
	    	if(ue_get_role() == 0){
	    		?>
	    			<label for="exampleInputEmail3" class="label mt-3">Quyền</label>
	    			<select name="role" id="exampleInputEmail5" class="form-control">
	    			 <?php
        				foreach (ue_get_role_data() as $k => $v){
           			 		echo '<option value="'. $k .'">'. $v .'</option>';
       				 }
        		?>
	    			</select>
	    		<?php
	    	}
	    ?>
	  </div>
	   <?php UE_Message::show('user'); ?>
	   <br/>
	  <button type="submit" class="btn btn-primary" name="add_user">Sửa</button>
	 
	</form>
	<?php
}else{
	?>
	<div class="alert alert-danger mt-4">Không tồn tại người dùng này.</div>
	<?php
}