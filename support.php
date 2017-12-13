<?php
include("header.php");
include('session_user.php');

$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get('http://ec2-54-66-246-123.ap-southeast-2.compute.amazonaws.com/brian/src/public/client/' . $JAID . '/support', $headers);

if($response->body == NULL)
	header('Location: support_edit.php'); 

foreach ($response->body as $support) {

	$supp_name = $support->Name;
	$supp_email = $support->email;
	$supp_phone = $support->Phone;
	$supp_location = $support->Location;

} ?>

		<div class="wrapper">
			<header class="table logged_in">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><h4>Support<h4></div>
				<a href="support_edit.php" class="btn_right btn_edit table_cell v_middle a_right">
					Edit
				</a>
			</header>

			<div class="intro a_center">
				<div class="circle_outer d_flex">
					<div class="circle_middle d_flex">
						<div class="circle_inner d_flex">
							<h1>A</h1>
						</div>
					</div>
				</div>
				<h3><?php echo $supp_name; ?></h3>
				<h4><?php echo $supp_email; ?></h4>
			</div>
			<div class="content support">
				<div class="support_toolbar">
					<a href="tel:<?php echo $supp_phone; ?>"><img src="img/phone.svg" class="icon_support" /></a>
					<a href="mailto:<?php echo $supp_email; ?>"><img src="img/email.svg" class="icon_support" /></a>
				</div>
				<div class="support_detail">
					<h4>Phone</h4>
					<hr />
					<p><?php echo $supp_phone; ?></p>
					<h4>Location</h4>
					<hr />
					<p><?php echo $supp_location; ?></p>
					<h4>Email</h4>
					<hr />
					<p><?php echo $supp_email; ?></p>
				</div>
			</div>
		</div>
<?php include("footer.php"); ?>