<?php
include("header.php");
include('session_user.php');
?>

	
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
				<div class="logo table_cell v_middle"><h4>Profile<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<div class="circle_outer d_flex">
					<div class="circle_middle d_flex">
						<div class="circle_inner d_flex">
							<h1><?php echo substr($name, 0, 1); ?></h1>
						</div>
					</div>
				</div>
				<h3><?php echo $name; ?></h3>
				<h4><?php echo $email; ?></h4>
			</div>
			<div class="content profile">
				<h4>Profile</h4>
				<hr />
				<a class="d_flex" href="profile_edit_name.php">
					<div class="icon_profile">
						<img src="img/Profile.svg" />
					</div><h3>Change name</h3>
				</a>
				<hr />
				<a class="d_flex" href="profile_edit_password.php">
					<div class="icon_profile">
						<img src="img/Lock.svg" />
					</div><h3>Change password</h3>
				</a>
				<hr />
				<hr class="invisible" />
				<h4>Settings</h4>
				<hr />
				<a class="d_flex" href="logout.php">
					<div class="icon_profile">
						<img src="img/Unlock.svg" />
					</div><h3>Log out</h3>
				</a>
				<hr />
			</div>
		</div>
<?php include("footer.php"); ?>