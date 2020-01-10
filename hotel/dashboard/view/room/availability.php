<?php
	$room_id = $book['room_id'];
?>
<div class="ue-room-availability">
	<div class="calendar-wrapper" data-post-id="<?php echo $room_id; ?>">
		<div class="col-right">
			<div class="calendar-content">

			</div>
			<div class="overlay">
				<span class="spinner is-active"></span>
			</div>
		</div>
		<div class="col-left">
			<div class="calendar-form">
				<div class="form-group">
					<label for="calendar_check_in"><strong>Check In</strong></label>
					<input readonly="readonly" type="text" class="widefat option-tree-ui-input date-picker" name="calendar_check_in" id="calendar_check_in" placeholder="Check In">
				</div>
				<div class="form-group">
					<label for="calendar_check_out"><strong>Check Out</strong></label>
					<input readonly="readonly" type="text" class="widefat option-tree-ui-input date-picker" name="calendar_check_out" id="calendar_check_out" placeholder="Check Out">
				</div>
				<div class="form-group">
					<label for="calendar_price"><strong>Price (VND)</strong></label>
					<input type="text" name="calendar_price" id="calendar_price" class="widefat option-tree-ui-input form-control" placeholder="Price">
				</div>
				<div class="form-group">
					<label for="calendar_status"><strong>Status</strong></label>
					<select name="calendar_status" id="calendar_status" class="">
						<option value="available">Available</option>
						<option value="unavailable">Unavailble</option>
					</select>
				</div>
				<div class="form-group">
					<div class="form-message">
						<p></p>
					</div>
				</div>
				<div class="form-group" >
					<input type="hidden" name="calendar_post_id" value="<?php echo$room_id; ?>">
					<input type="submit" id="calendar_submit" class="option-tree-ui-button button button-primary" name="calendar_submit" value="Set Availability">
				</div>
			</div>
			<p style="margin-top: 50px;"><i class="fa fa-info-circle"></i> <i>You can select and drag dates in the calendar to select check in and check out date</i></p>
			<div class="box-caption">
				<ul>
					<li><span class="is-custom"></span>Custom price</li>
					<li><span class="is-unavailable"></span>Unavailable</li>
				</ul>
			</div>
		</div>
	</div>
</div>
