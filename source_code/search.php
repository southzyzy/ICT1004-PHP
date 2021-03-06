<?php define("CLIENT", TRUE);
require_once("serverside/base.php");
require_once("serverside/components/search.php");
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

<!-- Features Section -->
<section class="features-area section_gap">
	<div class="container section_gap">
		<h2>Search results for "<?php safe_echo($search_query) ?>"</h2>
		<hr />
		<form method="post" action="search.php">
			<?php
			foreach ($results_listings as $row) {
				foreach (explode(",", $row["tags"]) as $tag) {
					if (trim($tag) !== $search_query) {
			?>
				<button type="submit" class="genric-btn info-border tags-btn" name="search_query" value="<?php safe_echo($tag); ?>">
					<?php safe_echo($tag); ?>
				</button>
			<?php }
				}
			} ?>
		</form>

		<div class="col-xl-12 col-lg-8 col-md-7 section_gap">
			<div class="row">
				<?php if (count($results_listings) === 0) { ?>
					<div class="col-12">
						<?php if (isset($selected_cat_name) === False) { ?>
							<h3>Sorry, there are no items found.</h3>
						<?php } ?>
					</div>
					<?php
				} else {
					foreach ($results_listings as $row) {
						?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product shadow p-3 mb-5 bg-white rounded">
								<figure class="img-equalise">
									<img src="<?php safe_echo($row["picture"]); ?>">
								</figure>
								<div class="product-details">
									<h6 class="listing-title">
										<?php safe_echo($row["title"]); ?>
									</h6>
									<div class="listing-seller">
										Listed by: <h6><?php safe_echo($row["user_name"]); ?></h6>
									</div>
									<div class="price">
										<h6>S$<?php safe_echo($row["price"]); ?></h6>
									</div>
									<div class="prd-bottom">
										<a href="item.php?id=<?php safe_echo($row["id"]); ?>" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">view</p>
										</a>
										<a href="profile.php?id=<?php safe_echo($row["user_id"]); ?>" class="social-info">
											<span class="lnr lnr-user"></span>
											<p class="hover-text">seller info</p>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php }
				} ?>
			</div>
		</div>
	</div>

</section>
<!-- End Features Section -->
<!-- Footer -->
<?php require_once("serverside/templates/footer.php"); ?>
<!-- End Footer -->

<?php require_once("serverside/templates/html.js.php"); ?>
</body>
</html>