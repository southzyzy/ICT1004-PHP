<?php define("CLIENT", TRUE);
require_once("serverside/base.php");
require_once("serverside/components/user/login.php");
define("WEBPAGE_TITLE", "Login");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<?php require_once("serverside/templates/html.head.php"); ?>
</head>
<body>
	<!-- Header -->
	<?php require_once("serverside/templates/header.php"); ?>
	<!-- End Header -->

	<!-- Banner Section -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="login.php">Login</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Section -->

	<!-- Login Section -->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="static/img/vendor/login.jpg" alt="">
						<div class="hover">
							<h4>New to <?php safe_echo(APP_TITLE); ?>?</h4>
							<p>Join our vibrant community now!</p>
							<a class="primary-btn" href="register.php">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" name="form-login" id="form-login" action="login.php" method="POST">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="loginid" name="loginid" placeholder="Login ID" autofocus>
							</div>

							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>

							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn success-bg">Log In</button>
								<!--<a href="reset.php">Forgot Password?</a>-->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Login Section -->

	<!-- Footer -->
	<?php require_once("serverside/templates/footer.php"); ?>
	<!-- End Footer -->

	<?php require_once("serverside/templates/html.js.php"); ?>

	<?php if ($error_login === TRUE) { ?>
	<script>
		$(document).ready(function() {
			notify("<?php safe_echo($error_message); ?>", "danger");
		});
	</script>
	<?php } ?>
</body>
</html>