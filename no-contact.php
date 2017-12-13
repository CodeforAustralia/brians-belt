<?php
include("header.php");
include('session_user.php');

$current_condition = strtolower(ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)));

$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/condition/order/' . $order_ID, $headers);
?>

	
		<div class="wrapper condition">
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
				<div class="logo table_cell v_middle"><h4>Conditions<h4></div>
				<div class="btn_right table_cell v_middle"></div>
				</a>
			</header>
<?php foreach ($response->body as $condition) {
	if($condition->ConditionSlug == $current_condition) { ?>
		

			<div class="intro">
				<h2 class="a_center"><?php echo $condition->ConditionName; ?></h2>
				<?php if($condition->Detail != NULL) { ?>
				<div class="notice">
					<h3>Your notes:</h3>
					<p><?php echo $condition->Detail; ?>
					</p>
				</div>
				<?php
				}
				?>
			</div>

			<div class="content">
				<h4>Description: </h4>
				<p><?php echo $condition->ConditionDescription; ?></p>				
			</div>
			<?php 
	}
}
?>
		</div>
<?php include("footer.php"); ?>