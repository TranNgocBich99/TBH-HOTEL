<?php
$res = UE_Input::get_session('hotel_cart');
if(!empty($res)){
?>
	<div class="list-product">
		<p><a href="#"><?php echo 'Danh sách <span>'. count($res) .'</span> phòng'; ?></a></p>

	</div>
    <div style="overflow: hidden">
    <div style="width: 50%; float: left">
<?php
	echo '<form action="'. ue_get_link('cart', 'update') .'" method="POST">';
	echo '<div class="box cart-table"><table>';
	?>
    <tr>
        <th>STT</th>
        <th>Ảnh</th>
        <th>Sách</th>
        <th>Giá</th>
        <th></th>
    </tr>
    <?php
    $i = 1;
	foreach ($res as $key => $value) {
	    echo '<tr>';
		$link_detail = ue_get_link('room', 'detail') . '&room_id=' . $value['room_id'];
		?>
        <td><?php echo $i; ?></td>
        <td><a href="<?php echo $link_detail; ?>"><img src="<?php echo SITEURL; ?>assets/<?php echo $value['thumb']; ?>" width="50" height="50"></a></td>
        <td><a href="<?php echo $link_detail; ?>"><?php echo $value['room_name']; ?></a></td>
        <td><?php echo ue_format_price($value['price']); ?></td>
        <td>
            <a href="<?php echo ue_get_link('cart', 'remove') . '&room_id=' . $value['room_id']; ?>" class="delete-book"><i class="fa fa-trash"></i></a>
        </td>
		<?php
		echo '</tr>';
		$i++;
	}
	echo '</table></div>';
    echo '</form>';

	?>
        <div class="total-price">
            Tổng tiền:
		    <?php
		    $total_price = ue_get_cart_total_price();
		    echo ue_format_price($total_price);
		    ?>
            <form action="<?php echo ue_get_link('order', 'create_order'); ?>" method="POST">
                <button type="submit" name="create_order" class="tt">Thanh toán</button>
            </form>
        </div>
    </div>

    </div>
    <?php
}else{
    ?>
    <div class="message">
    <?php
	echo 'Bạn chưa đặt phòng nào!';
    ?>
    </div>
<?php
}
?>
