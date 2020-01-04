<div class="table-book mt-4">
	<h3 class="mb-4">Nhân viên <a href="<?php echo ue_get_admin_link('user','add_User'); ?>" class="btn btn-info btn-sm float-right">Thêm mới</a></h3>
	<?php
	if(!empty($res)) {
		UE_Message::show('user');
		?>
		<table class="table">
			<thead>
			<tr>
				<th scope="col">Tên đăng nhập</th>
				<th scope="col">Email</th>
				<th scope="col">Quyền</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($res as $k => $v){ ?>
			<tr>
				<td><?php echo $v['username']; ?></td>
				<td><?php echo $v['email']; ?></td>
				<td><?php echo isset($role_data[$v['role']]) ? $role_data[$v['role']] : '---'; ?></td>
				<td>
			
					<a href="<?php echo ue_get_admin_link('user', 'edit') . '/' . $v['id']; ?>" class="btn btn-info btn-sm">Sửa</a>
        
                    <a href="<?php echo ue_get_admin_link('user', $delete_action ) . '/' . $v['id']; ?>" class="btn btn-danger btn-sm btn-delete">Xóa</a>
          
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php
	}else{
		?>
		<div class="alert alert-warning">Không có nhân viên nào.</div>
		<?php
	}
	?>
</div>
