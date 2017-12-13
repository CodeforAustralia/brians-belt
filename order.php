<?php
include("header.php");
include('session_user.php');
?>

	
		<div class="wrapper">
			<header class="table logged_in">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><h4>My Order<h4></div>
				<a href="order_edit.php" class="btn_right btn_edit table_cell v_middle a_right">
					Edit
				</a>
			</header>

			<div class="intro a_center order">
				<h2>Your Order Information</h2>
				<div class="d_flex"><h3>Your Order finishes on<br /><strong>03 July 2018</strong></h3></div>
				<a class="d_flex" href="mandatory_terms.php">
					<div class="icon_order"><img src="img/icon-mandatory.svg" /></div><h3>Mandatory Terms</h3>
				</a>
				
				<hr class="invisible" />
				<h2>Your Conditions</h2>
				<?php

				$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
				$response = Unirest\Request::get('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/client/' . $JAID . '/condition/order/' . $order_ID, $headers);

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