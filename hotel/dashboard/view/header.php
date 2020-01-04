<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

	<meta name="generator" content="Jekyll v3.8.5">
	<title>Trang quản trị</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo SITEURL; ?>assets/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo SITEURL; ?>assets/plugins/fontawesome/css/all.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php ue_assets('images/logo2.png') ?>">
	<link rel="stylesheet" href="<?php echo SITEURL; ?>assets/admin/css/admin.css">
	

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
	<!-- Custom styles for this template -->
	<link href="<?php echo SITEURL; ?>assets/admin/css/dashboard.css" rel="stylesheet">
	<script>
        var site_url = '<?php echo SITEURL; ?>';
    </script>
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0 ql" href="<?php echo ue_get_admin_link('admin', 'index'); ?>">Quản lý khách sạn</a>
	<ul class="nav">
		  <li class="nav-item">
		    <a class="nav-link menu" href="<?php echo SITEURL; ?>">Trang chủ</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link menu" href="<?php echo ue_get_link('user', 'logout'); ?>">Đăng xuất</a>
		  </li>
	</ul>
</nav>
<div class="container-fluid">
	<div class="row">
		<nav class="col-md-2 d-none d-md-block bg-light sidebar menu">
			<div class="sidebar-sticky">
				<ul class="nav flex-column menu1">
					<li class="nav-item one">
						<a class="nav-link active" href="<?php echo ue_get_admin_link('room', 'listRoom'); ?>">
							Quản lý phòng
						</a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo ue_get_admin_link('category', 'listCategory'); ?>">
							Quản lý danh mục
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo ue_get_admin_link('user', 'getUser');  ?>">
                            Quản lý tài khoản
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo ue_get_admin_link('order', 'listOrder'); ?>">
							Quản lý hóa đơn
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">