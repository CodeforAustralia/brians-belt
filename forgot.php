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
				<p>Type in your account email</p>
			</div>
			<div class="content lr_25px">
				<form action="success.php" class="form_account">
					<input type="email" placeholder="Email" name="email">
					<hr class="invisible" />
					<button type="submit" class="a_left">Submit</button>
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>