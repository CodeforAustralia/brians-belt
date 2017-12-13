<?php
include("header.php");
include('session_user.php');

$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/order/' . $order_ID, $headers);

foreach ($response->body as $order) {
	$end = $order->EndDate;
	$end_date = date("Y-m-d", strtotime($end));

	$end_explode = explode('-', $end_date);
	$end_year = $end_explode[0];
	$end_month   = $end_explode[1];
	$end_day  = $end_explode[2];
}

?>

	
		<div class="wrapper">
			<header class="table logged_in">
				
				<a href="home.php" class="btn_left btn_back table_cell v_middle">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="3 -1.999 7.4 12" xml:space="preserve">
					<g id="Symbols">
						<g transform="translate(-102.000000, -19.000000)">
							<polygon id="btn_back" fill="#ffffff" points="112.4,27.601 111,29.001 105,23.001 111,17.001 112.4,18.401 107.8,23.001 		"/>
						</g>
					</g>
					</svg>
				</a>
				<div class="logo table_cell v_middle"><h4>My Order<h4></div>
				<a href="order_edit.php" class="btn_right btn_edit table_cell v_middle a_right">
					Edit
				</a>
			</header>

			<div class="intro a_center order">
				<h2>Your Order Information</h2>
				<div class="d_flex"><h3>Your Order finishes on<br /><strong><?php echo $end_day . ' ' . jdmonthname($end_month,1) . ' ' . $end_year; ?></strong></h3></div>
				<a class="d_flex" href="mandatory_terms.php">
					<div class="icon_order"><img src="img/icon-mandatory.svg" /></div><h3>Mandatory Terms</h3>
				</a>
				
				<hr class="invisible" />
				<h2>Your Conditions</h2>
				<?php

				$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
				$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/condition/order/' . $order_ID, $headers);

				foreach ($response->body as $condition) {
					if($condition->ConditionStatus == '1') {
					?>

					<a class="d_flex" href="<?php echo $condition->ConditionSlug; ?>.php">
						<div class="icon_order"><img src="img/<?php echo $condition->Image; ?>" /></div><h3><?php echo $condition->ConditionName; ?></h3>
					</a>

					<?php 
					}
				} ?>
				
			</div>
		</div>
<?php include("footer.php"); ?>