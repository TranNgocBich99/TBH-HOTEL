<!DOCTYPE html>
<html lang="en"><head>
    <title> Example </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="<?php ue_assets('bootstrap/css/bootstrap.css') ?>">
    <link href="<?php ue_assets('plugins/fontawesome/css/all.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php ue_assets('plugins/daterangepicker/daterangepicker.css')?>">
    <link rel="icon" type="image/png" href="<?php ue_assets('images/logo2.png') ?>">
    <link rel="stylesheet" href="<?php ue_assets('css/1.css') ?>">
    <link rel="stylesheet" href="<?php ue_assets('css/intro.css') ?>">
    <link rel="stylesheet" href="<?php ue_assets('css/style.css') ?>">
    <link rel="stylesheet" href="<?php ue_assets('css/style1.css') ?>">
     
    <script>
        var site_url = '<?php echo SITEURL; ?>';
    </script>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=1897724123706019&autoLogAppEvents=1"></script>
</head>
<body >
    <div class="header">
        <div class="header1">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 tbh">
                        <b>Welcome to TBH Hotel</b>
                    </div>
                    <div class="col-sm-8 phone" >
                        <div class="row plane">
                            <?php 
                                if(!ue_is_login()){
                            ?>
                                <div class="col-sm-3 tt tk ">
                                    <b>
                                    <a href="<?php echo ue_get_link('user', 'login') ?>">Đăng nhập</a>
                                    </b>
                                </div>
                                <div class="col-sm-2 tt tk">
                                    <b>
                                    <a href="<?php echo ue_get_link('user', 'register') ?>">Đăng ký</a>
                                    </b>
                                </div>
                            <?php
                                }
                            ?>
                            
                            <?php
                                if(ue_is_login()){
                                    ?>
                                    <div class="col-sm-3 tt tk ue-dropdown"><b><a href="">
                                    <?php
                                    $user_data = ue_get_user_data();
                                    echo 'Xin chào, ' . $user_data['username'];
                                    ?>
                                     </a> </b>
                                     <ul class="dashboard">
                                        <li><a href="<?php echo SITEURL . 'dashboard'; ?>">Trang quản trị</a></li>
                                        <li><a href="<?php echo ue_get_link('user', 'logout'); ?>">Đăng xuất</a></li>
                                     </ul>
                                 </div>
                                    <?php
                                }   
                            ?>
                            
                            <div class="col-sm-3 tt">
                                <b>
                                <i class="fa fa-phone" aria-hidden="true"></i>+84 12 345 678
                                </b>
                            </div>
                            <div class="col-sm-4 bb">
                                <b>
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> trangvtrangvbichhue@gmail.com
                                </b>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="header2">
            <nav class="navbar navbar-light" style="background-color: #eaeef0;" class ="menua">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                <a class="navbar-brand" href="<?php echo SITEURL; ?>"><img src="<?php ue_assets('images/logo.png') ?>" alt="" style="width: 95px;height: 95px; margin-top: -30px; margin-right: 200px;"></a>
                <ul class="nav navbar-nav khungmenu">
                    <li class="nav-item">
                        <a class="nav-link me a" href="<?php echo SITEURL; ?>"><b><i class="fa fa-home" aria-hidden="true"></i></b></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link me " href="<?php echo SITEURL . 'introduce/index'; ?>"><b>Giới thiệu</b>  <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ha">
                        <a class="nav-link me" href="<?php echo SITEURL . 'category/index'; ?>"><b>Phòng nghỉ</b></a>
                        <div class="mndc" style="background-color: #727168;">
                            <ul class="itemaa" >
                            <!-- <?php

                                if(!empty($res)){
                                    foreach ($res as $k => $v) {
                                        /*echo $v['category_id'];die;*/
                                        # code...
                                        ?>
                                            <li><a href="<?php echo ue_get_link('category', 'detail') . '/' . $v['category_id'] ; ?>"><b><?php echo $v['category_name'] ?></b></a></li>

                                        <?php
                                    }
                                }
                            ?> -->
                            <li><a href="<?php echo SITEURL . 'category/detail/1'; ?>"><b style="color: white">SUPERIOR</b></a></li>
                            <li><a href="<?php echo SITEURL . 'category/detail/2'; ?>"><b style="color: white">DELUXE</b></a></li>
                            <li><a href="<?php echo SITEURL . 'category/detail/3'; ?>"><b style="color: white">PREMIER EXECUTIVE</b></a></li>
                            <li><a href="<?php echo SITEURL . 'category/detail/4'; ?>"><b style="color: white">FINE ART LUXURY SUITE</b></a></li>
                            <li><a href="<?php echo SITEURL . 'category/detail/5'; ?>"><b style="color: white">EXTENSIVE FAMILY</b></a></li>
                        </ul>
                        </div>

                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me" href="<?php echo SITEURL . 'endow/index'; ?>"><b>Ưu đãi</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo SITEURL . 'book/index'; ?>"><button type="button" class="btn btn but"><b>Đặt phòng</b> </button></a>
                    </li>
                    <li>
                        <form class="form-inline my-2 my-lg-0 form-search" method="GET" action="<?php echo ue_get_link('room', 'search'); ?>">
                            <input class="form-control mr-sm-2" type="search" placeholder="Nhập từ tìm kiếm" aria-label="Search" required="" name="s" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Tìm</button>
                        </form>
                    </li>
                    <li>
                        <a href="<?php echo ue_get_link('cart', 'detail') ?>" class="cart"><i class="fas fa-hospital"></i></a>
                    </li>
                </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>