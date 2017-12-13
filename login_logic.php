<?php 

if(isset($_SESSION['login_user'])){
	header("location: home.php");
}

// echo $_SESSION['login_user'];

session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	echo 'isset';
	if (empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	}
	else	{
		// Define $username and $password
		$email=$_POST['email'];
		$password=$_POST['password'];

		// To protect MySQL injection for Security purpose
		$email = stripslashes($email);
		$password = stripslashes($password);
		// Selecting Database

		$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
		$data = array('Username' => $email, 'Password' => $password);

		$body = Unirest\Request\Body::json($data);
		$response = Unirest\Request::post('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/user/login', $headers, $body);

		if ($response->body == '1') {
			$_SESSION['login_user'] = $email; // Initializing Session
			header("location: home.php"); // Redirecting To Other Page
		} else {
			$error = "Username or Password is invalid";
		}
	}
}

?>