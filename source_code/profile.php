<?php define("CLIENT", TRUE);
require_once("serverside/base.php");
require_once("serverside/components/user/profile_listing.php");
define("WEBPAGE_TITLE", "Profile");
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <?php require_once("serverside/templates/html.head.php"); ?>
    <style>
        a {
            color: inherit;
        }
    </style>

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
                <h1>Profile</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Profile</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<section class="features-area">
    <div class="container">
        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">
                    <?php foreach ($own_profile_results as $profile) { ?>
                        <div class="col-lg-6">
                            <h2>Profiles</h2>
                            <hr>
                            <figure>
                                <img class="rounded-circle" src="<?php safe_echo($profile['profile_pic']); ?>"
                                     alt="User Profile Image"
                                     height="200"
                                     width="200">
                            </figure>
                        </div>

                        <div class="col-lg-5 offset-lg-1">
                            <div class="s_product_text">
                                <input type="hidden" id="user_id" name="user_id"
                                       value="<?php safe_echo((int)$_SESSION["user_id"]); ?>">

                                <div class="row form-group">
                                    <div class="col-4">
                                        <h4>Name</h4>
                                        <p><?php safe_echo($profile["name"]); ?></p>
                                    </div>
                                    <div class="col-5">
                                        <h4>Email</h4>
                                        <p class="word_break"><?php safe_echo($profile["email"]); ?></p>
                                    </div>
                                    <div class="col-3">
                                        <h4>Gender</h4>
                                        <p><?php safe_echo($profile["gender"]); ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <h4>Join Date</h4>
                                        <p><?php safe_echo($profile["join_date"]); ?></p>
                                    </div>
                                    <div class="col-8">
                                        <h4>Bio</h4>
                                        <p><?php safe_echo($profile["bio"]); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <br/>
                                    <?php if((int)($_GET['id']) === $_SESSION["user_id"]){ ?>
                                        <div class="col-12 form-group card_area align-items-center text-center">
                                            <button type="submit" name="selling_submit" class="btn info-btn">
<!--                                                <a href="user_profile.php?id=--><?php //echo$_SESSION["user_id"]; ?><!--">Edit Profile</a>-->
                                                <a href="edit_profile.php">Edit Profile</a>
                                            </button>
                                        </div>
                                   <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="features-area">
    <div class="container">
    </div>
</section>
<!-- Footer -->
<?php require_once("serverside/templates/footer.php"); ?>
<!-- End Footer -->

<?php require_once("serverside/templates/html.js.php"); ?>
</body>
</html>
