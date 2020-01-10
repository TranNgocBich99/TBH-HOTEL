   <link rel="stylesheet" href="<?php ue_assets('css/category.css') ?>">
   <?php
    ?>
<div class="content">
		<div class="content1">
			<img src="<?php ue_assets('images/p14.jpg') ?>" alt="">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="content1a">
						<h1>PHÒNG NGHỈ</h1>
						<div class="sang">SANG TRỌNG & QUYẾN RŨ</div>
						<div class="contentpn">
							98 phòng nghỉ tại khách sạn Ninh Bình Hidden Charm được thiết kế với gam màu trầm ấm áp, điểm vào đó những mảng gốm mosaic độc đáo, các vật dụng mỹ nghệ tinh xảo cùng hướng nhìn đồng lúa uốn lượn bên dãy núi tuyệt đẹp, gợi lên không gian sống của những gia đình vương giả xưa. Ngoài ra, bộ chăn, ga, gối được làm thủ công và có chất liệu 100% cotton satin chất lượng cao hứa hẹn sẽ đem lại cho du khách những giấc ngủ thật ngon và sâu.
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
		<?php
			if(!empty($res)){
				foreach ($res as $k => $v) {
					
		?>
	
			<div class="content1b">
				
				<div class="chiacot">
					<div class="anh1">
						<img src="<?php echo SITEURL . '/assets/' . $v['thumb']; ?>" alt="">
					</div>
					<div class="ct1">
						<h2><?php echo $v['category_name']; ?></h2>
						<div><?php echo $v['description']; ?></div>
						
					</div>
				</div>
			</div>
		

		<?php
			}
		}
		?>
	</div>

	</div>