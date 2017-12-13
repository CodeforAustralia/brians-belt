<?php 
session_start();
include("header.php");

function return_account_setup($msg) {
	$_SESSION['error_page4'] = $msg;
	header("location: order_length.php");
}

if (isset($_POST['start_day'])) {

	if (!empty($_SESSION['post'])){
		if (empty($_POST['start_day']) || empty($_POST['start_month']) || empty($_POST['start_year']) || empty($_POST['end_day']) || empty($_POST['end_month']) || empty($_POST['end_year'])) {
			return_account_setup('Please fill in ALL the fields.');
		}

	 	else {
			foreach ($_POST as $key => $value) {
				$_SESSION['post'][$key] = $value;
			}

			extract($_SESSION['post']); // Function to extract array.

			$email = strtolower($email);
			
			$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
			$data = array('Username' => $email, 'Password' => $password, 'Role' => 'Offender', 'Location' => '1', 'FirstName' => $name, 'email' => $email, 'OptedIn' => '1', 'AssignedStaff' => 'Orion_admin');

			$body = Unirest\Request\Body::json($data);
			$response = Unirest\Request::post(getAPIURL() . 'user/new', $headers, $body);


			// Get the JAID using the username
			$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
			$response = Unirest\Request::get(getAPIURL() . 'client/username/' . $email, $headers);

			foreach ($response->body as $user) {
				$JAID = $user->JAID;
			}


			// Get order assigned to JAID
			$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
			$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/order', $headers);

			foreach ($response->body as $user) {
				$order_ID = $user->OrderID;
			}

			// Iterate through the variables by re-assigning them
			// http://php.net/manual/en/language.variables.variable.php
			for($i = 1; $i < 21; $i++) {
			  $id = 'id_' . $i;
			  $detail = 'detail_' . $i;
			  
			  // echo $i . " " . $$id . " " . $$detail . '<br />';

			  if($$id == 'on') 
			  	$conditionStatus = 1;
			  else 
			  	$conditionStatus = 0;


					$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
					$data = array('StartDate' => 'TODAY', 'EndDate' => 'TODAY', 'ConditionStatus' => $conditionStatus, 'Detail' => $$detail);

					$body = Unirest\Request\Body::json($data);
					$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/condition/order/' . $order_ID . '/condition/' . $i, $headers, $body);

			}

			// Set start & end dates of order
			$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
			$data = array('StartDate' => $start_year . '-' . $start_month . '-' . $start_day, 'EndDate' => $end_year . '-' . $end_month . '-' . $end_day, 'Status' => 'CUR');

			$body = Unirest\Request\Body::json($data);
			$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/order/' . $order_ID, $headers, $body);

			// Set support staff
			if(!$support) {
				$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
				$data = array('Name' => $supp_name, 'Phone' => $supp_phone, 'email' => $supp_email, 'Location' => $supp_location);

				$body = Unirest\Request\Body::json($data);
				$response = Unirest\Request::post(getAPIURL() . 'client/' . $JAID . '/support', $headers, $body);
			}



			session_destroy();
		}
	} else {
		header("location: account_setup.php"); // Redirecting to first page.
	}
} 
else {
	if (empty($_SESSION['error_page4'])) {
		return_account_setup('Please fill in ALL the fields.');
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
				<p>Your account was sucessfully created!<br /></p>
			</div>
			<div class="forgot">
				<a href="login.php">Please login</a>
			</div>
		</div>
<?php include("footer.php"); ?>