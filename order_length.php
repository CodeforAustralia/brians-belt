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
				<p>How long is your order?</p>
			</div>
			<div class="content lr_25px order">
				<form action="success_create.php" class="form_account">
					<h4>Start Date</h4>
					<div class="d_flex">
						<input type="text" placeholder="DD" name="day">
						<input type="text" placeholder="MM" name="month">
						<input type="text" placeholder="YYYY" name="year">
					</div>
					<hr class="invisible" />
					<h4>End Date</h4>
					<div class="d_flex">
						<input type="text" placeholder="DD" name="day">
						<input type="text" placeholder="MM" name="month">
						<input type="text" placeholder="YYYY" name="year">
					</div>
					<hr class="invisible" />
					<button type="submit" class="a_left">Finish</button>
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>