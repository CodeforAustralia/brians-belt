<?php
include("header.php");
include('session_user.php');

$headers = array('Content-Type' => 'application/json', 'Authorization' => getAuthorization());
$response = Unirest\Request::get(getAPIURL() . 'client/' . $JAID . '/support', $headers);

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
				
				<a href="home.php" class="btn_left btn_back table_cell v_middle">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="3 -1.999 7.4 12" xml:space="preserve">
					<g id="Symbols">
						<g transform="translate(-102.000000, -19.000000)">
							<polygon id="btn_back" fill="#ffffff" points="112.4,27.601 111,29.001 105,23.001 111,17.001 112.4,18.401 107.8,23.001 		"/>
						</g>
					</g>
					</svg>
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
							<h1><?php echo substr($supp_name, 0, 1); ?></h1>
						</div>
					</div>
				</div>
				<h3><?php echo $supp_name; ?></h3>
				<h4><?php echo $supp_email; ?></h4>
			</div>
			<div class="content support">
				<div class="support_toolbar clearfix">
					<?php if($supp_phone != 0){ ?>
					<a href="tel:<?php echo $supp_phone; ?>"><img src="img/phone.svg" class="icon_support" /></a>
					<?php } if($supp_email != NULL) { ?>
					<a href="mailto:<?php echo $supp_email; ?>"><img src="img/email.svg" class="icon_support" /></a>
					<?php } ?>
				</div>
				<div class="support_detail">
					<?php if($supp_phone != 0){ ?>
					<h4>Phone</h4>
					<hr />
					<p><?php echo $supp_phone; ?></p>
					<?php } if($supp_email != NULL) { ?>
					<h4>Email</h4>
					<hr />
					<p><?php echo $supp_email; ?></p>
					<?php } if($supp_location != NULL) { ?>
					<h4>Location</h4>
					<hr />
					<p><?php echo $supp_location; ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
<?php include("footer.php"); ?>