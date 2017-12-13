<?php include("header.php"); 

if (isset($_POST['submit'])) {


	$random_pw = bin2hex(random_bytes(10));
	$hashed_pw = password_hash($random_pw,PASSWORD_DEFAULT);

	$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
	$data = array('Username' => $logged_in_user, 'Password' => $hashed_pw);

	$body = Unirest\Request\Body::json($data);
	$response = Unirest\Request::post(getAPIURL() . '/user/password', $headers, $body);


	$body = 'Hi ' . $name . ',\n\n You recently requested to reset your password on Orion. Your temporary password is: \n ' . $random_pw . '\n\n Please login with the temporary password and make sure to change the password to a new one!\n\n You can do this by going to "My Profile" then "Change password". Once on the password change page, enter the temporary password into the "Old password" field and then put your new password into the "New password" fields.\n\n If you need anymore help, please talk to your case manager!';

	// Send Mail
	$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
	$data = array('To' => $email, 'ToName' => $name, 'From' => 'noreply@myorion.com.au', 'FromName' => 'Orion', 'Subject' => 'Orion: Password Reset', 'Body' => $body);

	$body = Unirest\Request\Body::json($data);
	$response = Unirest\Request::post(getAPIURL() . 'mail' . $order_ID, $headers, $body);


	if($response->body == '1') {
		$msg = "A new password has been emailed to you.";
	}
	else {
		$msg = "Error, please try again.";
	}
	
}
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
				<p>Type in your email</p>
			</div>
			<div class="content">
				<?php if(isset($msg)) {
					echo '<div class="error">' . $msg . '</div>';
				} ?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" class="form_account" method="post">
					<input type="email" placeholder="Email" name="email">
					<hr class="invisible" />
					<input type="submit" class="a_left" value="Submit" name="submit">
				</form>
			</div>
		</div>
<?php include("footer.php"); ?>