<?php define("CLIENT", TRUE);
require_once("serverside/base.php");
require_once("serverside/constants.php");
require_once("serverside/components/admin/admin.php");
require_once("serverside/components/admin/user.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once("serverside/templates/html.head.php"); ?>
</head>

<body>
  <?php require_once("serverside/templates/header.php"); ?>




  <!-- Banner Section -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Admin Dashboard Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="admin_page.php">Admin Dashboard Page<span class="lnr lnr-arrow-right"></span></a>
            <a href="edit_account.php?edituser=">Enable/Disable Account</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Section -->

<!-- Admin Dashboard Page -->
<div id="page-wrapper">

			<div class="container-fluid">



        <div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-money fa-fw"></i>
							</h3>
						</div>

<?php

  foreach ($results_selectedupdateuserdetails as $row) {

 ?>
            <form class="row contact_form" name="form-contact" id="form-contact" action="edit_account2.php" METHOD="POST">
  						<div class="col-md-6">
  							<div class="form-group">

  							ID:	<input type="text" class="form-control" id="id" name="id" value="<?php safe_echo($row['id']); ?>" readonly>
  							</div>
                <div class="form-group">
  							Name:	<input type="text" class="form-control" id="name" name="name" value="<?php safe_echo($row['name']); ?>" readonly>
  							</div>
                <div class="form-group">
  							LoginID:	<input type="text" class="form-control" id="loginid" name="loginid" value="<?php safe_echo($row['loginid']); ?>" readonly>
  							</div>
                <div class="form-group">
  							Email:	<input type="text" class="form-control" id="email" name="email" value="<?php safe_echo($row['email']); ?>" readonly>
  							</div>

                <?php
                if ($row['suspended'] == 1) {
                  safe_echo("User is suspended. Enable user account?"); ?>
                  <input type="hidden" id="suspended" name="suspended" value="<?php safe_echo($row['suspended']);?>">
                  <?php
                }
                else {
                  safe_echo("User is not suspended. Disable user account?"); ?>
                  <?php $row['suspended'] = 0;?>
                  <input type="hidden" id="suspended" name="suspended" value="<?php safe_echo($row['suspended']); ?>">
                  <?php
                }
              }
               ?>
  						<div class="col-md-12 text-right">

  							<button type="submit"  name="updateuser" class="primary-btn"><?php if ($row['suspended'] == 1) {?> Enable <?php } else {?> Disable <?php }?></button>
  						</div>


  					</form>
            <p></p>
					</div>
				</div>

			</div>
    </div>

<!--End Admin Dashboard Page -->

  <!-- Footer -->
	<?php require_once("serverside/templates/footer.php"); ?>
	<!-- End Footer -->

	<?php require_once("serverside/templates/html.js.php"); ?>
</body>

</html>
