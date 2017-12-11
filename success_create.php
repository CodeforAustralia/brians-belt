<?php include("header.php"); ?>

	
		<div class="wrapper">
			<header class="table">
				<div class="btn_left table_cell v_middle">
					<span class="btn_back d_inline_block">&nbsp</span>
				</div>
				<div class="logo table_cell v_middle"><a href="index.php"><img src="img/logo.svg" /></a></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<p>Your account was sucessfully created!<br />Please login.</p>
				<?php include("login_form.php"); ?>
			</div>
			<div class="forgot">
				<a href="forgot.php">Help! I forgot my password.</a>
			</div>
		</div>
<?php include("footer.php"); ?>