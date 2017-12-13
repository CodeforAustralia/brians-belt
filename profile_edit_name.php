<?php
include("header.php");
include('session_user.php');
?>

	
		<div class="wrapper edit">
			<header class="table logged_in">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><h4>My Profile<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<h2>Update your name</h2>
			</div>
			<div class="content conditions">
				
				<form action="profile.php" class="form_account">
					<input type="text" placeholder="Name" name="name">
					<hr class="invisible" />
					<button type="submit" class="btn_next">Update</button>
				</form>

			</div>
		</div>
<?php include("footer.php"); ?>