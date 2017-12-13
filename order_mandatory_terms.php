<?php 
session_start();
include("header.php");

function return_account_setup($msg) {
	$_SESSION['error_page2'] = $msg;
	$_SESSION['supp_name'] = $_POST['supp_name'];
	$_SESSION['supp_phone'] = $_POST['supp_phone'];
	$_SESSION['supp_email'] = $_POST['supp_email'];
	$_SESSION['supp_location'] = $_POST['supp_location'];
	header("location: staff_setup.php");
}

if (isset($_POST['supp_name'])){
	if (empty($_POST['supp_name'])) {
		return_account_setup('Please fill in a name, or choose "I\'m not sure".');
	}
	else {

		foreach ($_POST as $key => $value) {
			$_SESSION['post'][$key] = $value;
		}
	}
}
else {
	if (empty($_SESSION['error_page3'])) {
		return_account_setup('Please fill in a name, or choose "I\'m not sure".');
	}
}
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
				<p>Every court order has the following mandatory terms. <br />You must follow all of the below.</p>
			</div>
			<div class="content mandatory">

				<?php include("mandatory_terms_details.php"); ?>

				<a class="btn_next d_block" href="add_conditions.php">Next</a>
			</div>
		</div>
<?php include("footer.php"); ?>