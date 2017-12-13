<?php 
session_start();
include("header.php");
?>

	
		<div class="wrapper">
			<header class="table">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><a href="index.php"><img src="img/logo.svg" /></a></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<p>Let's set up your account.</p>
			</div>
			<div class="content lr_25px">
				 <span id="error">
				 <?php
				 if (!empty($_SESSION['error'])) {
					 echo $_SESSION['error'];
					 unset($_SESSION['error']);
				 }
				 ?>
				 </span>
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