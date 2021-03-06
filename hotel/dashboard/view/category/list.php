<?php
$role = ue_get_role();
if(!in_array($role, array(0))){
	header('Location:' . SITEURL);
	exit();
}
?>
<div class="table-room ">
	<h3 class="mb-4">Danh mục <a href="<?php echo ue_get_admin_link('category','add'); ?>" class="btn btn-info btn-sm float-right">Thêm mới</a></h3>
	<?php
	if(!empty($res)) {
		UE_Message::show('category');
		?>
		<table class="table">
			<thead>
			<tr>
				<th scope="col">Ảnh</th>
				<th scope="col">Tên</th>
				<th scope="col">Mô tả</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($res as $k => $v){ ?>
			<tr>
				<td><img src="<?php echo SITEURL . '/assets/' . $v['thumb']; ?>" width="80" height="60"/></td>
				<td><?php echo $v['category_name']; ?></td>
                <td><?php echo ue_cut_string($v['description']); ?></td>
				<td>
					<a href="<?php echo ue_get_admin_link('category', 'edit') . '/' . $v['category_id']; ?>" class="btn btn-info btn-sm">Sửa</a>
					<a href="<?php echo ue_get_admin_link('category', 'delete') . '/' . $v['category_id']; ?>" class="btn btn-danger btn-sm btn-delete">Xóa</a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php
	}else{
		?>
		<div class="alert alert-warning">Không có danh mục nào.</div>
		<?php
	}
	?>
</div>