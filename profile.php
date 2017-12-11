<?php include("header.php"); ?>

	
		<div class="wrapper">
			<header class="table logged_in">
				<a href="javascript:history.go(-1)" class="btn_left btn_back table_cell v_middle">
					<
				</a>
				<div class="logo table_cell v_middle"><h4>Profile<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<div class="circle_outer d_flex">
					<div class="circle_middle d_flex">
						<div class="circle_inner d_flex">
							<h1>J</h1>
						</div>
					</div>
				</div>
				<h3>Jaydon Bates</h3>
				<h4>jaydon.bates@gmail.com</h4>
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
				<a class="d_flex" href="profile_edit_password.php#">
					<div class="icon_profile">
						<img src="img/Lock.svg" />
					</div><h3>Change password</h3>
				</a>
				<hr />
				<hr class="invisible" />
				<h4>Settings</h4>
				<hr />
				<a class="d_flex" href="index.php">
					<div class="icon_profile">
						<img src="img/Unlock.svg" />
					</div><h3>Log out</h3>
				</a>
				<hr />
			</div>
		</div>
<?php include("footer.php"); ?>