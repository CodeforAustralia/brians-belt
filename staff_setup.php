<?php 
session_start();
include("header.php");

function return_account_setup($msg) {
	$_SESSION['error'] = $msg;
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['email'] = $_POST['email'];
	header("location: account_setup.php");
}

if (isset($_POST['name'])){

	if (empty($_POST['name'])	|| empty($_POST['email'])	|| empty($_POST['password']) || empty($_POST['password_verify']))
		return_account_setup('Please fill in ALL the fields.');

	else {
		// Sanitizing email field to remove unwanted characters.
		$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
		// After sanitization Validation is performed.
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){ 

			$uri = getAPIURL() . 'user/' . $_POST['email'];

			$response = \Httpful\Request::get($uri)
			->addHeader('Content-Type', 'application/json')
			->addHeader('Authorization', getAuthorization())
			->send();

			$json = json_decode($response);

			if($json != NULL) {
				return_account_setup('The email is already in use, please try another.');
			}

			if (($_POST['password']) === ($_POST['password_verify'])) {

				$_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);

				foreach ($_POST as $key => $value) {
					$_SESSION['post'][$key] = $value;
				}
			} else {
				return_account_setup('The passwords do not match.');
			}
		} else {
			return_account_setup('Invalid Email Address.');
		}
	}
} else {
	if (empty($_SESSION['error_page2'])) {
			return_account_setup('');
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
				<p>Who is your case worker?</p>
			</div>
			<div class="content">
				<?php
				 if (!empty($_SESSION['error_page2'])) {
					 echo '<div class="error">' . $_SESSION['error_page2'] . '</div>';
					 unset($_SESSION['error_page2']);
				 }
				 ?>
				<form action="order_mandatory_terms.php" class="form_account" method="post">
					<input type="text" placeholder="Name" name="supp_name" value="<?php
				 if (!empty($_SESSION['supp_name'])) {
					 echo $_SESSION['supp_name'];
					 unset($_SESSION['supp_name']);
				 }
				 ?>">
					<input type="text" placeholder="Phone" name="supp_phone" value="<?php
				 if (!empty($_SESSION['supp_phone'])) {
					 echo $_SESSION['supp_phone'];
					 unset($_SESSION['supp_phone']);
				 }
				 ?>">
					<input type="email" placeholder="Email" name="supp_email" value="<?php
				 if (!empty($_SESSION['supp_email'])) {
					 echo $_SESSION['supp_email'];
					 unset($_SESSION['supp_email']);
				 }
				 ?>">
					<input type="text" placeholder="Location" name="supp_location" value="<?php
				 if (!empty($_SESSION['supp_location'])) {
					 echo $_SESSION['supp_location'];
					 unset($_SESSION['supp_location']);
				 }
				 ?>">
					<hr class="invisible" />
					<button type="submit" class="a_left">Continue</button>
					<input type="submit" class="btn_next a_left" name="support" value="I'm not sure">
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>