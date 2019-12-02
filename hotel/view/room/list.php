<?php
if(!empty($res)){
foreach ($res as $k => $v) {
	# code...
?>
<div class="container">
<div class="row mt-5 info">
	<div class="col-sm-3">
		<img src="<?php echo SITEURL . '/assets/' . $v['thumb']; ?>" width="200px" height="150xp;">
	</div>
	<div class="col-sm-5">
		<p class="room"><?php echo $v['room_name']; ?></p>
		<div class="info-room mb-2">
			<ul>
				<li><i class="fas fa-female"></i> <?php echo $v['adults']; ?> người lớn</li>
				<li><i class="fas fa-bed"></i> <?php echo $v['children']; ?> trẻ em</li>
				<li><i class="fas fa-bath"></i> 2 phòng tắm</li>
			</ul>
		</div>
		<p class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
		<div class="des">
			<ul>
				<li><p><a href="#">Chi tiết <i class="fas fa-caret-right"></i></a></p></li>
				<li><p class="price">Giá: <?php echo ue_format_price($v['price']); ?>đ</p></li>
			</ul>
		</div>
		
	</div>
	<div class="col-sm-4">
		<button type="button" class="btn btn-dark book-room">Đặt phòng</button>
	</div>
</div>
 </div>
<?php
}
}
?>