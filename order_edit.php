<?php
include("header.php");
include('session_user.php');
?>

	
		<div class="wrapper edit">
			<header class="table logged_in">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><h4>My Order<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<h2>Update your order</h2>
			</div>
			<div class="content conditions">
				<form action="order.php" class="form_account">
					<div class="date">
						<h4>Start Date</h4>
						<div class="d_flex">
							<input type="text" placeholder="DD" name="day">
							<input type="text" placeholder="MM" name="month">
							<input type="text" placeholder="YYYY" name="year">
						</div>
						<hr class="invisible" />
						<h4>End Date</h4>
						<div class="d_flex">
							<input type="text" placeholder="DD" name="day">
							<input type="text" placeholder="MM" name="month">
							<input type="text" placeholder="YYYY" name="year">
						</div>
					</div>
				
				<?php

				$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
				$response = Unirest\Request::get('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/client/' . $JAID . '/condition/order/' . $order_ID, $headers);

				foreach ($response->body as $condition) {
				?>
				<div class="conditions_wrapper">
					<div class="d_flex">
						<div class="condition_title"><h3><?php echo $condition->ConditionName; ?></h3></div>
						<div class="condition_toggle">
						  <input type="checkbox" name="id_<?php echo $condition->TypeID; ?>" class="mobileToggle" id="id_<?php echo $condition->TypeID; ?>" <?php if($condition->ConditionStatus == '1') echo 'checked'; ?>>
						  <label for="id_<?php echo $condition->TypeID; ?>"></label>
						</div>
					</div>
					<div class="condition_details">
						<textarea name="detail_<?php echo $condition->TypeID; ?>" placeholder="Additional details"></textarea>
					</div>
				</div>

				<?php } ?>
					<button type="submit" class="a_left btn_next">Update</button>
				</form>

			</div>
		</div>
<?php include("footer.php"); ?>