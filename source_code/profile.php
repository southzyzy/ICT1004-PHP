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


<!-- Misc Section -->
    <?php if(!empty($own_profile_results)){ ?>
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="item-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">
                        Reviews
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="item-tabs-content">
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <h3 class="text-center">Reviews Listings</h3>
                    <br />
                    
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <?php 
                                        echo '<h4>' . (!empty($review_scores) ? (array_sum($review_scores)/count($review_scores)) : '-') . '</h4>';
                                        echo '<h6>(' . (!empty($review_scores) ? sizeof($review_scores) : '0') . ' Reviews)</h6>'; ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <?php 
                                        echo '<h3>Based on ' . sizeof($review_scores) . ' Reviews</h3>';
                                        $review_counts = array_count_values($review_scores);?>
                                        <ul class="list">
                                            <li>5 Star <label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label> <?php echo isset($review_counts['5']) ? $review_counts['5'] : '0'; ?></li>
                                            <li>4 Star <label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-b"></label> <?php echo isset($review_counts['4']) ? $review_counts['4'] : '0'; ?></li>
                                            <li>3 Star <label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-b"></label><label class="fa fa-star fa-star-b"></label> <?php echo isset($review_counts['3']) ? $review_counts['3'] : '0'; ?></li>
                                            <li>2 Star <label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-b"></label><label class="fa fa-star fa-star-b"></label><label class="fa fa-star fa-star-b"></label> <?php echo isset($review_counts['2']) ? $review_counts['2'] : '0'; ?></li>
                                            <li>1 Star <label class="fa fa-star fa-star-f"></label><label class="fa fa-star fa-star-b"></label><label class="fa fa-star fa-star-b"></label><label class="fa fa-star fa-star-b"></label><label class="fa fa-star fa-star-b"></label> <?php echo isset($review_counts['1']) ? $review_counts['1'] : '0'; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                <?php 
                                if (isset($reviews) === TRUE && empty($reviews) === FALSE) {
                                foreach ($reviews as $review) { ?>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <?php echo '<img class="rounded-circle review-profile-pic" src="' 
                                            . $review["seller_profile_pic"] . 
                                                '" alt="' . $review["seller_name"] . ' Profile Image">'; ?>
                                        </div>

                                        <div class="media-body">
                                            <?php
                                                echo '<h4>' . $review["seller_name"] . '</h4>';
                                                for($i = 0; $i < $review["rating"]; $i++){
                                                    echo '<label class="fa fa-star fa-star-f">';
                                                }
                                                for($i = 0; $i < (5-$review["rating"]); $i++){
                                                    echo "<label class=\"fa fa-star fa-star-b\">";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <?php echo '<p>' . $review["description"] ?>
                                </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <p>Your Rating:</p>
                                <ul class="list">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <p>Outstanding</p>
                                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name" onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''" onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Your Full name'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''" onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Email Address'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''" onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Phone Number'">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Review" onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''" onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Review'"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="primary-btn">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- End Misc Section-->

<!-- Footer -->
<?php require_once("serverside/templates/footer.php"); ?>
<!-- End Footer -->

<?php require_once("serverside/templates/html.js.php"); ?>
</body>
</html>
