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
				<p>Who is your case worker?</p>
			</div>
			<div class="content lr_25px">
				<form action="order_mandatory_terms.php" class="form_account">
					<input type="text" placeholder="Name" name="name">
					<input type="text" placeholder="Phone" name="phone">
					<input type="email" placeholder="Email" name="email">
					<input type="text" placeholder="Location" name="location">
					<hr class="invisible" />
					<button type="submit" class="a_left">Continue</button>
					<button type="submit" class="a_left">I'm not sure</button>
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>