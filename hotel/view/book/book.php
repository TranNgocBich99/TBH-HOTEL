
<div class="book">
		<div class="hotel">
			<p>TBH Hotel</p>
		</div>
	</div>
	<div class="container mt-5">
		<p>98 phòng nghỉ tại khách sạn TBH Hotel được thiết kế với gam màu trầm ấm áp, điểm vào đó những mảng gốm mosaic độc đáo, các vật dụng mỹ nghệ tinh xảo cùng hướng nhìn đồng lúa uốn lượn bên dãy núi tuyệt đẹp, gợi lên không gian sống của những gia đình vương giả xưa. Ngoài ra, bộ chăn, ga, gối được làm thủ công và có chất liệu 100% cotton satin chất lượng cao hứa hẹn sẽ đem lại cho du khách những giấc ngủ thật ngon và sâu.</p>
		
		<div class="calendar">
			<p class="" style="color: #bf0000; font-size: 22px; font-weight: 600;">Chọn lịch đặt phòng</p>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<div class="cal">
					<i class="far fa-calendar-alt"></i> <input type="text" name="daterange" value="" />
					<div class="down"><i class="fas fa-sort-down"></i></div>
					</div>
				</div>
				<div class="col-sm-6">
					<form method="GET">
						<div class="search">
							<input class="find" type="text" name="search" placeholder="Nhập từ tìm kiếm...">
							<button><i class="fas fa-search"></i></button>
						
						</div>
					</form>
					
				</div>
			</div>
			<hr>
		</div>
		
		
		<br>
		<p><i class="fas fa-angle-right"></i> Xin mời quý khách chọn phòng.</p>

		<?php
			if(!empty($res)){

				?>
				<p class="" style="color: #bf0000; font-size: 22px; font-weight: 600; text-align: center;margin-top: 40px;">Danh sách các phòng</p>
				<?php
				foreach ($res as $k => $v) {
				# code...
				?>
		<div class="row mt-5 info">
			<div class="col-sm-3">
				<img src="<?php echo SITEURL . '/assets/' . $v['thumb']; ?>" width="200px" height="150xp;">
			</div>
			<div class="col-sm-5">
				<p class="room"><?php echo $v['room_name']; ?></p>
				<div class="info-room mb-2">
					<ul>
						<li><i class="fas fa-female"></i> <?php echo $v['adults']; ?> người lớn</li>
						<li><i class="fas fa-child"></i> <?php echo $v['children']; ?> trẻ em</li>
					</ul>
				</div>
				<p class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
				<div class="des">
					<ul>
						<li><p><a href="#">Chi tiết <i class="fas fa-caret-right"></i></a></p></li>
						<li><p class="price">Giá: <?php echo ue_format_price($v['price']); ?></p></li>
					</ul>
				</div>
				
			</div>
			<div class="col-sm-4">
				<button type="button" class="btn btn-dark book-room">Đặt phòng</button>
			</div>
		</div>
		<?php
			}
			}else{
				echo "Không tìm thấy phòng nào!!";
			}
		?>
	</div>