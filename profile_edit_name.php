<?php
include("header.php");
include('session_user.php');

if (isset($_POST['name'])) {
	$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
	
	$_POST['name'] = trim($_POST['name']);
	$_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

	$data = array('Name' => $_POST['name']);

	$body = Unirest\Request\Body::json($data);
	$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/update/name', $headers, $body);

	if($response->body == '1') {
		$msg = "Name successfully changed!";
	}
	else {
		$msg = "Error, please try again.";
	}
}

?>

	
		<div class="wrapper edit">
			<header class="table logged_in">
				
				<a href="profile.php" class="btn_left btn_back table_cell v_middle">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="3 -1.999 7.4 12" xml:space="preserve">
					<g id="Symbols">
						<g transform="translate(-102.000000, -19.000000)">
							<polygon id="btn_back" fill="#ffffff" points="112.4,27.601 111,29.001 105,23.001 111,17.001 112.4,18.401 107.8,23.001 		"/>
						</g>
					</g>
					</svg>
				</a>
				<div class="logo table_cell v_middle"><h4>My Profile<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<h2>Update your name</h2>
			</div>
			<div class="content conditions">
				<?php if(isset($msg)) {
					echo '<div class="error">' . $msg . '</div>';
				} ?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" class="form_account" method="post">
					<input type="text" placeholder="Name" name="name">
					<hr class="invisible" />
					<button type="submit" class="btn_next">Update</button>
				</form>

			</div>
		</div>
<?php include("footer.php"); ?>