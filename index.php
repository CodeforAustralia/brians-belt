<?php include("header.php"); 
session_start();
if(session_destroy()) {}
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
				<p>Is this your first time <br />using Orion?</p>
			</div>
			<div class="content">
				<a href="order_start.php" class="btn_select d_block a_center">Yes. <br />Tell me more.</a>
				<a href="login.php" class="btn_select d_block a_center">No. <br />I'd like to login.</a>
			</div>
		</div>

<?php include("footer.php"); ?>