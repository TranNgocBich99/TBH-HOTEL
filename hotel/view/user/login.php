<link rel="stylesheet" href="<?php ue_assets('css/login.css') ?>">
<div class="container dkya">
	<form method="post" action="">
		<div class=" text-center dk"><b> ĐĂNG NHẬP </b></div>

		<div class=" email"><b>Tài khoản</b></div>


		<div class=" text-center place"><input type="name" name="username" placeholder="Nhập tên tài khoản"> </div>

		<div class=" pass"><b>Mật khẩu</b> </div>

		<div class=" text-center place"><input type="password" name="password" placeholder="Nhập mật khẩu"> </div>
		<?php
	        if(isset($errors)){
	            ?>
	        	</br>
	            <div class="alert1 alert-danger1 small"><?php echo $errors; ?></div>
	            <?php
	        }
	        if(isset($message)){
	            ?>
	             </br>
	           	<div class="alert alert-success small"><?php echo $message; ?></div>
	           	
	            <?php
	        }
	    ?>
		<div class=" text-center">
			<button class="btn btn-primary dky" name="login_action"> <b>ĐĂNG NHẬP</b> </button>
		</div>
	</form>
</div>