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
				<p>How long is your order?</p>
			</div>
			<div class="content lr_25px order">
				 <span id="error">
				<?php
				// To show error of page 2.
				if (!empty($_SESSION['error_page4'])) {
				 echo $_SESSION['error_page4'];
				 unset($_SESSION['error_page4']);
				}
				?>
				 </span>
				<form action="success_create.php" class="form_account" method="post">
					<h4>Start Date</h4>
					<div class="d_flex">
						<input type="number" placeholder="DD" name="start_day" min="1" max="31" value="1">
						<input type="number" placeholder="MM" name="start_month" min="1" max="12" value="1">
						<input type="number" placeholder="YYYY" name="start_year" min="1990" max="2200" value="1990">
					</div>
					<hr class="invisible" />
					<h4>End Date</h4>
					<div class="d_flex">
						<input type="number" placeholder="DD" name="end_day" min="1" max="31" value="1">
						<input type="number" placeholder="MM" name="end_month" min="1" max="12" value="1">
						<input type="number" placeholder="YYYY" name="end_year" min="1990" max="2200" value="2000">
					</div>
					<hr class="invisible" />
					<button type="submit" class="a_left">Finish</button>
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>