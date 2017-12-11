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
				<p>Every court order has the following mandatory terms. <br />You must follow all of the below.</p>
			</div>
			<div class="content mandatory">

				<?php include("mandatory_terms_details.php"); ?>

				<a class="btn_next d_block" href="add_conditions.php">Next</a>
			</div>
		</div>
<?php include("footer.php"); ?>