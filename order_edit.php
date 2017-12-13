<?php
include("header.php");
include('session_user.php');

// Set start & end dates of order
$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/order/' . $order_ID, $headers);

foreach ($response->body as $order) {
	$start = $order->StartDate;
	$end = $order->EndDate;

	$start_date = date("Y-m-d", strtotime($start));
	$end_date = date("Y-m-d", strtotime($end));

	$start_explode = explode('-', $start_date);
	$start_year = $start_explode[0];
	$start_month   = $start_explode[1];
	$start_day  = $start_explode[2];

	$end_explode = explode('-', $end_date);
	$end_year = $end_explode[0];
	$end_month   = $end_explode[1];
	$end_day  = $end_explode[2];
} 


if (isset($_POST['submit'])) {
	$start_year = $_POST['start_year'];
	$start_month   = $_POST['start_month'];
	$start_day  = $_POST['start_day'];

	$end_explode = explode('-', $end_date);
	$end_year = $_POST['end_year'];
	$end_month   = $_POST['end_month'];
	$end_day  = $_POST['end_day'];

	// Set start & end dates of order
	$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
	$data = array('StartDate' => $start_year . '-' . $start_month . '-' . $start_day, 'EndDate' => $end_year . '-' . $end_month . '-' . $end_day, 'Status' => 'CUR');

	$body = Unirest\Request\Body::json($data);
	$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/order/' . $order_ID, $headers, $body);

	// Iterate through the variables by re-assigning them
	// http://php.net/manual/en/language.variables.variable.php
	for($i = 1; $i < 21; $i++) {

		$id = $_POST['id_' . $i];
		$detail = $_POST['detail_' . $i];
	  
	  // echo $i . " " . $$id . " " . $$detail . '<br />';

	  if($id == 'on') 
	  	$conditionStatus = 1;
	  else 
	  	$conditionStatus = 0;


			$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
			$data = array('StartDate' => 'TODAY', 'EndDate' => 'TODAY', 'ConditionStatus' => $conditionStatus, 'Detail' => $detail);

			$body = Unirest\Request\Body::json($data);
			$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/condition/order/' . $order_ID . '/condition/' . $i, $headers, $body);

	}

	if($response->body == '1') {
		$msg = "Order successfully updated!";
	}
	else {
		$msg = "Error, please try again.";
	}

};
?>
	
		<div class="wrapper edit">
			<header class="table logged_in">
				
				<a href="order.php" class="btn_left btn_back table_cell v_middle">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="3 -1.999 7.4 12" xml:space="preserve">
					<g id="Symbols">
						<g transform="translate(-102.000000, -19.000000)">
							<polygon id="btn_back" fill="#ffffff" points="112.4,27.601 111,29.001 105,23.001 111,17.001 112.4,18.401 107.8,23.001 		"/>
						</g>
					</g>
					</svg>
				</a>
				<div class="logo table_cell v_middle"><h4>My Order<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<h2>Update your order</h2>
			</div>
			<div class="content conditions">
				<?php if(isset($msg)) {
					echo '<div class="error">' . $msg . '</div>';
				} ?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" class="form_account" method="post">
					<div class="date">
						<h4>Start Date</h4>
						<div class="d_flex">
							<input type="number" placeholder="DD" name="start_day" min="1" max="31" value="<?php if(isset($start_day)) echo $start_day;?>">
							<input type="number" placeholder="MM" name="start_month" min="1" max="12" value="<?php if(isset($start_month)) echo $start_month;?>">
							<input type="number" placeholder="YYYY" name="start_year" min="1990" max="2200" value="<?php if(isset($start_year)) echo $start_year;?>">
						</div>
						<hr class="invisible" />
						<h4>End Date</h4>
						<div class="d_flex">
							<input type="number" placeholder="DD" name="end_day" min="1" max="31" value="<?php if(isset($end_day)) echo $end_day;?>">
							<input type="number" placeholder="MM" name="end_month" min="1" max="12" value="<?php if(isset($end_month)) echo $end_month;?>">
							<input type="number" placeholder="YYYY" name="end_year" min="1990" max="2200" value="<?php if(isset($end_year)) echo $end_year;?>">
						</div>
					</div>
				
				<?php

				$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
				$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/condition/order/' . $order_ID, $headers);

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
						<textarea name="detail_<?php echo $condition->TypeID; ?>" placeholder="Additional details"><?php if($condition->ConditionStatus == '1') echo $condition->Detail; ?></textarea>
					</div>
				</div>

				<?php } ?>
					<input type="submit" class="a_left btn_next" name="submit" value="Update">
				</form>

			</div>
		</div>
<?php include("footer.php"); ?>