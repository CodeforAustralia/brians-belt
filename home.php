<?php
include("header.php");
include('session_user.php');
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
				<p>The best preparation for <br />
				tomorrow is doing your <br />
				best today.</p>
				<sub>H. Jackson Brown, JR.</sub>
			</div>
			<div class="content lr_25px home a_center">
				<div class="clearfix">
					<a href="profile.php">
						<div class="icon c_orange d_flex"><img src="img/profile.svg" alt=""></div>
						<p>My Profile</p>
					</a>
					<a href="order.php">
						<div class="icon c_green d_flex"><img src="img/order.svg" alt=""></div>
						<p>My Order</p>
					</a>
				</div>
				<div class="clearfix">
					<a href="resources.php">
						<div class="icon c_purple d_flex"><img src="img/resources.svg" alt=""></div>
						<p>Resources</p>
					</a>
					<a href="support.php">
						<div class="icon c_blue d_flex"><img src="img/support.svg" alt=""></div>
						<p>Support</p>
					</a>
				</div>
			</div>
		</div>
<?php include("footer.php"); ?>