<?php
if(!empty($res)){
	?>
	<p class="" style="color: #bf0000; font-size: 22px; font-weight: 600; text-align: center;margin-top: 40px;">Chi tiết phòng</p>

<div class="container">
<div class="row mt-5 info-detail info">
	<div class="col-sm-4">
		<img src="<?php echo SITEURL . '/assets/' . $res['thumb']; ?>" height="238">
	</div>
	<div class="col-sm-8">
		<p class="room"><?php echo $res['room_name']; ?></p>
		<div class="info-room mb-2">
			<ul class="people">
				<li><i class="fas fa-female"></i> <?php echo $res['adults']; ?> người lớn</li>
				<li><i class="fas fa-child"></i> <?php echo $res['children']; ?> trẻ em</li>
			</ul>
		</div>
		<p class="conf"><?php echo $res['confirmation']; ?></p>
		<div class="des">
			<ul>
				<li><p class="price1">Giá: <?php echo ue_format_price($res['price']); ?></p></li>
				<li><p><button type="button" class="btn btn-dark book-room detail-book">Đặt phòng</button></p></li>
			</ul>
		</div>
		
	</div>
</div>
 </div>
<?php
}else{
	echo "Không tìm thấy phòng nào!!";
}
?>