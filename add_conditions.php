<?php 
session_start();
include("header.php");

foreach ($_POST as $key => $value) {
	$_SESSION['post'][$key] = $value;
}
?>

	
		<div class="wrapper">
			<header class="table">
				<div class="btn_left table_cell v_middle">
					<span class="btn_back d_inline_block">&nbsp</span>
				</div>
				<div class="logo table_cell v_middle"><a href="index.php"><img src="img/logo.svg" /></a></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<p><strong>Court Order</strong><br />Let's add your conditions</p>
			</div>
			<div class="content conditions">
				<form action="order_length.php" class="form_account" method="post">

				<?php

				$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
				$response = Unirest\Request::get('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/conditions', $headers);

				foreach ($response->body as $condition) {
				?>
				<div class="conditions_wrapper">
					<div class="d_flex">
						<div class="condition_title"><h3><?php echo $condition->ConditionName; ?></h3></div>
						<div class="condition_toggle">
						  <input type="checkbox" name="id_<?php echo $condition->TypeID; ?>" class="mobileToggle" id="id_<?php echo $condition->TypeID; ?>">
						  <label for="id_<?php echo $condition->TypeID; ?>"></label>
						</div>
					</div>
					<div class="condition_details">
						<textarea name="detail_<?php echo $condition->TypeID; ?>" placeholder="Additional details"></textarea>
					</div>
				</div>

				<?php } ?>

					<button type="submit" class="a_left btn_next">Next</button>
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>