<?php
include('connection.php');
$brands_sql = "select * from brands";
$brands = sqlsrv_query($conn, $brands_sql);
$categories_sql = "select * from productCategory";
$categories = sqlsrv_query($conn, $categories_sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="main_page_css.php">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Project I</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="nav_bar">
				<div class="logo">
					<img src="logo/logo.png" width="125px">
				</div>
				<nav>
					<ul>
						<li><a href="main_page.html"><span>Home</span></a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="all_products_page.php">Products list</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href="account.html">Account</a></li>
					</ul>
				</nav>
				<img src="logo/cart.png" width="30px">
			</div>
			<div class="row">
				<div class="col-2">
					<h1>Check Out Our New Designs!</h1><br>
					<q>Make your whole set of clothes changed</q><br>
					<a href="" class = "btn">Explore Now&#8594;</a>
				</div>
				<div class="col-2">
					<img src="background/image1.png">
				</div>
			</div>
		</div>
	</header>
	<div class="collection">
		<h1 class = "title">New Collection</h1>
		<img src="background/background_2.jpg">
	</div>
	<div class="categories">
		<div class="small-container">
			<h1 class = "title">Categories</h1>
			<div class="row">
				<?php while($category_row = sqlsrv_fetch_array($categories, SQLSRV_FETCH_ASSOC)) {?>
				<div class="col-9">
					<a href="all_products_page.php"><img src="<?php echo $category_row['categoryImages']; ?>">
				</a>
					<h3><?php echo $category_row['productCategoryName'];?></h3>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="featured_products">
		<div class="small-container">
			<h1 class = "title">Featured Products</h1>
			<div class="row">
				<div class="col-3">
					<img src="features/feature-1.jpg">
					<h3></h3>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<p>$120</p>
				</div>
				<div class="col-3">
					<img src="features/feature-3.jpg">
					<h3></h3>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-o"></i>
					</div>
					<p>$125</p>
				</div>
				<div class="col-3">
					<img src="features/feature-2.jpg">
					<h3></h3>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star-half-o"></i>
					</div>
					<p>$159</p>
				</div>
			</div>
		</div>
	</div>
	<!-- still not used -->
	<div class="special_offer">
		<div class="container">
			<div class="row">
				<div class="col-2">
					<img src="">
				</div>
				<div class="col-2">
					<h1></h1>
					<p></p>
				</div>
			</div>
		</div>
	</div>
	<div class="advertising">
		<img src="background/discount.jpg">
	</div>
	<div class="brands">
		<div class="small-container">
			<div class="row">
				<?php while($brand_row = sqlsrv_fetch_array($brands, SQLSRV_FETCH_ASSOC)) { ?>
				<div class="col-x">
					<img src="<?php echo $brand_row['brandsImage']; ?>">
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="footer-col-1">
					<h3>About Us</h3>
					<p><a href="">+84794112293</a></p>
					<a href="mailto:buiviethoang12062000@gmail.com">buiviethoang12062000@gmail.com</a>
					<p><address>Ngo Hoa Binh, Hai Ba Trung, Ha Noi</address></p>
					<a href="">Specific In4</a>
				</div>
				<div class="footer-col-2">
					<h3>Help</h3>
					<ul>
						<li><a href="">FAQs</a></li>
						<li><a href="">Delivery Services</a></li>
						<li><a href="">Return & Exchanges</a></li>
						<li><a href="">Payment Options</a></li>
						<li><a href="">Unsubscribe</a></li>
					</ul>
				</div>
				<div class="footer-col-3">
					<img src="logo/logo.png" width="125px">
					<p>We're not merely your friend<br>We're your company!</p>
				</div>
				<div class="footer-col-4">
					<h3>Contact Us</h3>
					<ul>
						<li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>
						<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
						<li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
						<li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a></li>
						<li><a href=""><i class="fa fa-snapchat" aria-hidden="true"></i> Snapchat</a></li>
					</ul>
				</div>
				<div class="footer-col-5">
					<h3>Our Apps</h3>
					<p>Download our iOS app</p>
					<img src="logo/app-store.png" class="first_img">
					<img src="logo/app-store2.png" class="second-img">
					<p>Download our Android app</p>
					<img src="logo/play-store.png" class="first_img">
					<img src="logo/play-store2.png" class="second-img">
				</div>
			</div>
		</div>
		<hr>
		<div class="copyright">
			<p>Copyright&#169; by Bui Viet Hoang</p>
		</div>
	</div>
</footer>
</body>
</html>