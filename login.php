<?php 
include("header.php");
include('login_logic.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
	header("location: home.php");
}
?>

	
		<div class="wrapper">
			<header class="table">
				
				<a href="index.php" class="btn_left btn_back table_cell v_middle">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="3 -1.999 7.4 12" xml:space="preserve">
					<g id="Symbols">
						<g transform="translate(-102.000000, -19.000000)">
							<polygon id="btn_back" fill="#ffffff" points="112.4,27.601 111,29.001 105,23.001 111,17.001 112.4,18.401 107.8,23.001 		"/>
						</g>
					</g>
					</svg>
				</a>
				<div class="logo table_cell v_middle"><a href="index.php"><img src="img/logo.svg" /></a></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<p>Type in your account details</p>
			</div>
			<div class="content">
				<?php
				 if (!empty($_SESSION['error'])) {
					 echo '<div class="error">' . $_SESSION['error'] . '</div>';
					 unset($_SESSION['error']);
				 }
				 ?>
				<?php include("login_form.php"); ?>
				<div class="forgot">
					<a href="order_start.php">New? Create an account first.</a><br />
					<a href="forgot.php">Help! I forgot my password.</a>
				</div>
			</div>
		</div>
<?php include("footer.php"); ?>