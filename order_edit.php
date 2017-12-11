<?php include("header.php"); ?>

	
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
				$uri = 'http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/client/111/condition/order/1';

				$response = \Httpful\Request::get($uri)
				->addHeader('Content-Type', 'application/json')
				->addHeader('Authorization', 'Basic Tnl5anJjY1FlQkY0Z0o4cDo/dXI1SEZmRSZyKlZfJFghUDUtUzNUSi1jYnU/Uk5mKw==')
				->send();

				$json = json_decode($response);

				foreach ($json as $condition) {
				?>
				<div class="conditions_wrapper">
					<div class="d_flex">
						<div class="condition_title"><h3><?php echo $condition->ConditionName; ?></h3></div>
						<div class="condition_toggle">
						  <input type="checkbox" name="<?php echo $condition->ConditionSlug; ?>" class="mobileToggle" id="<?php echo $condition->ConditionSlug; ?>" <?php if($condition->ConditionStatus) { echo 'checked';}?>>
						  <label for="<?php echo $condition->ConditionSlug; ?>"></label>
						</div>
					</div>
					<div class="condition_details">
						<textarea name="detail_<?php echo $condition->ConditionSlug; ?>" placeholder="Additional details"></textarea>
					</div>
				</div>

				<?php } ?>
					<button type="submit" class="a_left btn_next">Update</button>
				</form>

			</div>
		</div>
<?php include("footer.php"); ?>