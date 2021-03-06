<?php define("CLIENT", TRUE);
require_once("serverside/base.php");
require_once("serverside/components/listing/item.php");
define("WEBPAGE_TITLE", "Item Details");
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
					<?php if (isset($item) === TRUE) { ?>
					<h1>Item Details</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">
							Home<span class="lnr lnr-arrow-right"></span>
						</a>
						<a href="listing.php?id=<?php safe_echo($item["cat_id"]); ?>">
							<?php safe_echo(truncate($item["cat_name"], 35)); ?><span class="lnr lnr-arrow-right"></span>
						</a>
						<a href="">
							<?php safe_echo(truncate($item["title"], 35)); ?>
						</a>
					</nav>
					<?php } else { ?>
					<h1>Item Not Found</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="listing.php?id=1">Listings</a>
					</nav>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Section -->

	<?php if (isset($item) === TRUE) { ?>
	<!-- Item Section -->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<?php foreach ($item["picture"] as $pic) { ?>
						<div class="single-prd-item">
							<img src="<?php safe_echo($pic); ?>">
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>
							<?php safe_echo($item["title"]); ?>
						</h3>
						<h2>
							S$<?php safe_echo($item["price"]); ?>
						</h2>
						<ul class="list">
							<hr class="dotted" />
							<li>
								<a class="active" href="profile.php?id=<?php safe_echo($item["user_id"]); ?>">
									<span><i class="fas fa-user"></i></span>
									<?php safe_echo($item["user_name"]); ?>
								</a>
							</li>
							<hr class="dotted" />
							<li>
								<a class="active no-click-pointer">
									<span><span><i class="fas fa-award"></i></span></span>
									<?php safe_echo($item["condition"]); ?>/10&nbsp;
									<?php
									if ($item["condition"] < 5) {
										safe_echo("(Poor)");
									} else if ($item["condition"] >= 5 && $item["condition"] < 8) {
										safe_echo("(Good)");
									} else if ($item["condition"] !== 10) {
										safe_echo("(Very Good)");
									} else {
										safe_echo("(Brand New)");
									}
									?>
								</a>
							</li>
							<li>
								<a class="active no-click-pointer">
									<span><span><i class="fas fa-history"></i></span></span>
									<?php safe_echo($item["item_age"]); ?> month(s)
								</a>
							</li>
							<li>
								<a class="active no-click-pointer">
									<span><i class="fas fa-map-marked-alt"></i></span>
									<?php safe_echo($item["meetup_location"]); ?>
								</a>
							</li>
							<hr class="dotted" />
							<li>
								<a class="active" href="listing.php?id=<?php safe_echo($item["cat_id"]); ?>">
									<span><i class="fas fa-list"></i></span>
									<?php safe_echo($item["cat_name"]); ?>
								</a>
							</li>
							<li>
								<a class="active no-click">
									<span><span><i class="fas fa-tags"></i></span></span>
									<?php safe_echo($item["tags"]); ?>
								</a>
							</li>
						</ul>
						<p>
							<?php safe_echo($item["description"]); ?>
						</p>
						<div class="card_area d-flex align-items-center">
							<?php
							if (isset($current_user_id) && $current_user_id === $item["user_id"]) {
								if ($item["sold"] === FALSE) {
							?>
							<form id="form-listing-sold" action="profile.php" method="post">
								<input type="hidden" name="action" value="sold_listing" required readonly>
								<input type="hidden" name="id" value="<?php safe_echo($item["id"]); ?>" required readonly>
								<button type="submit" class="info-btn">Mark As Sold</button>
							</form>
							<?php } ?>

							<form id="form-listing-delete" action="profile.php" method="post">
								<input type="hidden" name="action" value="delete_listing" required readonly>
								<input type="hidden" name="id" value="<?php safe_echo($item["id"]); ?>" required readonly>
								<button type="submit" class="danger-btn">Delete Listing</button>
							</form>
							<?php } else if ($session_is_admin === FALSE) { ?>
							<a class="success-btn" href="<?php safe_echo($convo_link); ?>" data-toggle="tooltip" data-placement="top" title="Chat with the Seller to make an offer!">
								Make an Offer
							</a>
							<a class="info-btn" href="<?php safe_echo($convo_link); ?>">Chat with Seller</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Item Section -->

	<!-- Misc Section -->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="item-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
						About Seller
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="related-tab" data-toggle="tab" href="#related" role="tab" aria-controls="related" aria-selected="false">
						Related Listings
					</a>
				</li>
			</ul>
			<div class="tab-content" id="item-tabs-content">
				<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="comment_list">
								<div class="review_item">
									<h3>About Me</h3>
									<div class="media">
										<div class="d-flex">
											<img class="img-listing-user-dp" src="<?php safe_echo($item["user_pic"]); ?>">
										</div>
										<div class="media-body">
											<h4>
												<?php safe_echo($item["user_name"]); ?>
											</h4>
											<h5>
												Joined <?php safe_echo($item["user_join_date"]); ?>
											</h5>
											<h5>
												<a href="profile.php?id=<?php safe_echo($item["user_id"]); ?>">
													See Profile
												</a>
											</h5>
										</div>
									</div>
									<p>
										<?php safe_echo($item["user_bio"]); ?>
									</p>
									<br /><br />
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<h3>My Other Listings</h3>
							<div class="row review_box">
								<?php
								if (isset($related_seller_items) === TRUE && empty($related_seller_items) === FALSE) {
									foreach ($related_seller_items as $row) {
								?>
								<div class="col-lg-6 col-md-6 col-sm-8 mb-20">
									<div class="single-related-product d-flex">
										<a href="item.php?id=<?php safe_echo($row["id"]); ?>">
											<img class="img-related-item" src="<?php safe_echo($row["picture"]); ?>">
										</a>
										<div class="desc">
											<a href="item.php?id=<?php safe_echo($row["id"]); ?>" class="title">
												<?php safe_echo($row["title"]); ?>
											</a>
											<div class="price">
												<h6>S$<?php safe_echo($row["price"]); ?></h6>
											</div>
										</div>
									</div>
								</div>
								<?php
									}
								} else {
								?>
								<div class="col-12 mb-20">
									<h6 class="mt-3">
										No Listings to Show
									</h6>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="related" role="tabpanel" aria-labelledby="related-tab">
					<h3 class="text-center">Similar Listings</h3>
					<br />
					<div class="row align-items-center">
						<?php if (isset($related_items) === TRUE && empty($related_items) === FALSE) { ?>
						<?php foreach ($related_items as $row) { ?>
						<div class="col-lg-4 col-md-6 col-sm-8 mb-20">
							<div class="single-related-product d-flex">
								<a href="item.php?id=<?php safe_echo($row["id"]); ?>">
									<img class="img-related-item" src="<?php safe_echo($row["picture"]); ?>">
								</a>
								<div class="desc">
									<a href="item.php?id=<?php safe_echo($row["id"]); ?>" class="title">
										<?php safe_echo($row["title"]); ?>
									</a>
									<div class="price">
										<h6>S$<?php safe_echo($row["price"]); ?></h6>
									</div>
								</div>
							</div>
						</div>
						<?php }
						} else {
						?>
						<div class="col-12 mb-20">
							<h6 class="mt-3 text-center">
								No Suggestions to Show
							</h6>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Misc Section-->
	<?php } ?>

	<!-- Footer -->
	<?php require_once("serverside/templates/footer.php"); ?>
	<!-- End Footer -->

	<?php require_once("serverside/templates/html.js.php"); ?>
	<script>
		$(document).ready(function() {
			$("#form-listing-sold").on("submit", function(e) {
				const result = confirm("Are you sure you want to mark this listing as sold?");
				if (result === true) {
					return true;
				} else {
					e.preventDefault();
					return false;
				}
			});

			$("#form-listing-delete").on("submit", function(e) {
				const result = confirm("Are you sure you want to delete this listing?");
				if (result === true) {
					return true;
				} else {
					e.preventDefault();
					return false;
				}
			});
		})
	</script>
</body>
</html>