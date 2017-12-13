<?php 
session_start();
include("header.php");
?>

	
		<div class="wrapper">
			<header class="table">
				
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
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
				<p>Let's set up your account.</p>
			</div>
			<div class="content">
				<?php
				 if (!empty($_SESSION['error'])) {
					 echo '<div class="error">' . $_SESSION['error'] . '</div>';
					 unset($_SESSION['error']);
				 }
				 ?>
				<form action="staff_setup.php" class="form_account" method="post">
					<input type="text" placeholder="Name" name="name" value="<?php
				 if (!empty($_SESSION['name'])) {
					 echo $_SESSION['name'];
					 unset($_SESSION['name']);
				 }
				 ?>">
					<input type="email" placeholder="Email" name="email" value="<?php
				 if (!empty($_SESSION['email'])) {
					 echo $_SESSION['email'];
					 unset($_SESSION['email']);
				 }
				 ?>">
					<hr class="invisible" />
					<input type="password" placeholder="Password" name="password" value="abc">
					<input type="password" placeholder="Confirm Password" name="password_verify" value="abc">
					<hr class="invisible" />
					<button type="submit" class="a_left">Continue</button>
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>