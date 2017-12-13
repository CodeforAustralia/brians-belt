<?php 

if(isset($_SESSION['login_user'])){
	header("location: home.php");
}


session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$_SESSION['error'] = "Username or Password is invalid";
	}
	else	{
		// Define $username and $password
		$email=$_POST['email'];
		$email = strtolower($email);
		$password=$_POST['password'];

		// To protect MySQL injection for Security purpose
		$email = stripslashes($email);
		$password = stripslashes($password);
		// Selecting Database

		$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
		$response = Unirest\Request::get(getAPIURL() . 'user/password/' . $email, $headers);

    if(password_verify($_POST["password"], $response->body)) {
			$_SESSION['login_user'] = $email; // Initializing Session
			header("location: home.php"); // Redirecting To Other Page
		} else {
			$_SESSION['error'] = "Username or Password is invalid";
		}
	}
}

?>