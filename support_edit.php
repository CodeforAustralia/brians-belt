<?php include("header.php"); ?>

	
		<div class="wrapper edit">
			<header class="table logged_in">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><h4>Support<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<h2>Update your support person</h2>
			</div>
			<div class="content conditions">
				
				<form action="support.php" class="form_account">
					<input type="text" placeholder="Name" name="name">
					<input type="text" placeholder="Phone" name="phone">
					<input type="email" placeholder="Email" name="email">
					<input type="text" placeholder="Location" name="location">
					<hr class="invisible" />
					<button type="submit" class="btn_next">Update</button>
				</form>

			</div>
		</div>
<?php include("footer.php"); ?>