<?php include("header.php"); ?>

	
		<div class="wrapper">
			<header class="table">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><a href="index.php"><img src="img/logo.svg" /></a></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<p>Type in your account details</p>
			</div>
			<div class="content lr_25px">
				<?php include("login_form.php"); ?>
				<div class="forgot">
					<a href="order_start.php">New? Create an account first.</a><br />
					<a href="forgot.php">Help! I forgot my password.</a>
				</div>
			</div>
		</div>
<?php include("footer.php"); ?>