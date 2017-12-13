<?php
session_start();// Starting Session

// Storing Session
$logged_in_user=$_SESSION['login_user'];

// Get the JAID using the username
$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/client/username/' . $logged_in_user, $headers);

foreach ($response->body as $user) {
	$JAID = $user->JAID;
}

// Get the Order ID
$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/client/' . $JAID . '/order', $headers);

foreach ($response->body as $order) {
	$order_ID = $order->OrderID;
}

// Get First Name and Email
$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/client/' . $JAID, $headers);

$name = $response->body->FirstName;
$email = $response->body->Username;

if(!isset($JAID) && !isset($order_ID)){
	header('Location: index.php'); // Redirecting To Home Page
}
?>