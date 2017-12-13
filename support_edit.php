<?php
include("header.php");
include('session_user.php');

// Get the support's ID
$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/support', $headers);

if($response->body != NULL) {

foreach ($response->body as $support) {

		$supp_id = $support->SupportID;
		$supp_name = $support->Name;
		$supp_email = $support->email;
		$supp_phone = $support->Phone;
		$supp_location = $support->Location;

	}
}

if (isset($_POST['name'])) {

	$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
	
	$_POST['name'] = trim($_POST['name']);
	$_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
	$_POST['email'] = trim($_POST['email']);
	$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$_POST['phone'] = trim($_POST['phone']);
	$_POST['phone'] = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);	
	$_POST['location'] = trim($_POST['location']);
	$_POST['location'] = filter_var($_POST['location'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

	$data = array('Name' => $_POST['name'], 'email' => $_POST['email'], 'Phone' => $_POST['phone'], 'Location' => $_POST['location']);

	$body = Unirest\Request\Body::json($data);

	if($support_id != NULL) {
		$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/support/' . $supp_id, $headers, $body);
	}
	else {
		$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/support', $headers, $body);

	}


	if($response->body == '1') {
		$msg = "Support successfully changed!";
	}
	else {
		$msg = "Error, please try again.";
	}
}

?>

	
		<div class="wrapper edit">
			<header class="table logged_in">
				
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="3 -1.999 7.4 12" xml:space="preserve">
					<g id="Symbols">
						<g transform="translate(-102.000000, -19.000000)">
							<polygon id="btn_back" fill="#ffffff" points="112.4,27.601 111,29.001 105,23.001 111,17.001 112.4,18.401 107.8,23.001 		"/>
						</g>
					</g>
					</svg>
				</a>
				<div class="logo table_cell v_middle"><h4>Support<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<h2>Update your support person</h2>
			</div>
			<div class="content conditions">
				
				<?php if(isset($msg)) {
					echo '<div class="error">' . $msg . '</div>';
				} ?>
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" class="form_account" method="post">
					<input type="text" placeholder="Name" name="name" value="<?php if(isset($supp_id)) echo $supp_id;?>">
					<input type="text" placeholder="Phone" name="phone" value="<?php if(isset($supp_phone)) echo $supp_phone;?>">
					<input type="email" placeholder="Email" name="email" value="<?php if(isset($supp_email)) echo $supp_email;?>">
					<input type="text" placeholder="Location" name="location" value="<?php if(isset($supp_location)) echo $supp_location;?>">
					<hr class="invisible" />
					<button type="submit" class="btn_next">Update</button>
				</form>

			</div>
		</div>
<?php include("footer.php"); ?>