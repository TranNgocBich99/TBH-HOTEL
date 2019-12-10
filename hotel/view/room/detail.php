<?php
if(!empty($res)){
	?>
	<p class="" style="color: #bf0000; font-size: 22px; font-weight: 600; text-align: center;margin-top: 40px;">Chi tiết phòng</p>

<div class="container">
<div class="row mt-5 info">
	<div class="col-sm-3">
		<img src="<?php echo SITEURL . '/assets/' . $res['thumb']; ?>" width="200px" height="150xp;">
	</div>
	<div class="col-sm-5">
		<p class="room"><?php echo $res['room_name']; ?></p>
		<div class="info-room mb-2">
			<ul>
				<li><i class="fas fa-female"></i> <?php echo $res['adults']; ?> người lớn</li>
				<li><i class="fas fa-child"></i> <?php echo $res['children']; ?> trẻ em</li>
			</ul>
		</div>
		<p class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
		<div class="des">
			<ul>
				<li><p><a href="">Chi tiết <i class="fas fa-caret-right"></i></a></p></li>
				<li><p class="price">Giá: <?php echo ue_format_price($res['price']); ?>đ</p></li>
			</ul>
		</div>
		
	</div>
	<div class="col-sm-4">
		<button type="button" class="btn btn-dark book-room">Đặt phòng</button>
	</div>
</div>
 </div>
<?php
}else{
	echo "Không tìm thấy phòng nào!!";
}
?>