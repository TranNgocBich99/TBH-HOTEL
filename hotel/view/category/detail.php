<?php
if(!empty($res)){

	?>
	<p class="" style="color: #bf0000; font-size: 22px; font-weight: 600; text-align: center;margin-top: 40px;">Danh sách các phòng</p>
	<?php
	foreach ($res as $k => $v) {
		$link_detail = ue_get_link('room', 'detail') . '/' . $v['room_id'];
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
				<li><i class="fas fa-child"></i> <?php echo $v['children']; ?> trẻ em</li>
			</ul>
		</div>
		<p class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
		<div class="des">
			<ul>
				<li><p><a href="<?php echo $link_detail; ?>">Chi tiết <i class="fas fa-caret-right"></i></a></p></li>
				<li><p class="price">Giá: <?php echo ue_format_price($v['price']); ?></p></li>
			</ul>
		</div>
		
	</div>
	<div class="col-sm-4">
		<form action="<?php echo ue_get_link('cart', 'add_cart'); ?>" method="POST">
            <input type="hidden" name="room_id" value="<?php echo $v['room_id']; ?>" />
			<button  type="submit" class="buy-book btn btn-dark book-room btnroom" name="add_to_cart" value="1">Đặt phòng</button>
		</form>
	</div>
</div>
 </div>
<?php
}
}else{
	echo "Không tìm thấy phòng nào!!";
}
?>