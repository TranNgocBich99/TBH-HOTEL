<link rel="stylesheet" href="<?php ue_assets('css/login.css') ?>">
<div class="container dkyb">

	<div class=" text-center dk"><b> ĐĂNG KÝ </b></div>

	<form method="post" action="" name="myform" onsubmit="return validateform()">
		<div class=" email"><b>Email</b></div>


		<div class=" text-center place"><input type="email" name="email" placeholder="Nhập email" value="<?php echo UE_Input::post('email'); ?>"> </div>
		<div class="warning">
			<?php
			if(isset($err['email'])){
				echo $err['email'];
			}
			?>
		</div>

		<div class=" pass"><b>Mật khẩu</b> </div>

		<div class=" text-center place"><input type="password" name="password" placeholder="Nhập mật khẩu"> </div>

		<div class=" repass"><b>Xác nhận lại mật khẩu</b> </div>
		<div class=" text-center place"><input type="password" name="re_password" placeholder="Nhập lại mật khẩu"> </div>
		<div class="warning">
			<?php
			if(isset($err['password'])){
				echo $err['password'];
			}
			?>
		</div>
		<div class=" userdn"><b>Tên đăng nhập</b> </div>
		<div class="text-center place"><input type="name" name="username" placeholder="Nhập tên đăng nhập" value="<?php echo UE_Input::post('username'); ?>"> </div>
		<div class="warning">
			<?php
			if(isset($err['username'])){
				echo $err['username'];
			}
			?>
		</div>
	</br>
		<?php UE_Message::show('message'); ?>
		<div class=" text-center">
			<button class="btn btn-primary dky" name="signup_action"> <b>ĐĂNG KÝ</b> </button>
		</div>
	</form>
</div>