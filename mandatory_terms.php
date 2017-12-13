<?php
include("header.php");
include('session_user.php');
?>

	
		<div class="wrapper terms">
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
				<div class="logo table_cell v_middle"><h4>Mandatory Terms<h4></div>
				<div class="btn_right table_cell v_middle"></div>
			</header>

			<div class="intro a_center">
				<h2>Every court order has the following mandatory terms. <br />You must follow all of the below.</h2>
			</div>
			<div class="content mandatory">

				<?php include("mandatory_terms_details.php"); ?>

			</div>
		</div>
<?php include("footer.php"); ?>