<?php
include('connection.php');
$cart_sql = "select * from Product inner join Cart on product.productId = Cart.productId";
$cart = sqlsrv_query($conn, $cart_sql);
$sum = 0;
$i=0;
if(isset($_GET['productId']))
{
	$remove_sql = "delete from cart
    where productid = ".$_GET['productId'];
	$remove = sqlsrv_query($conn, $remove_sql);
	if( isset( $_GET["caller"] ) && $_GET["caller"] == "somevalue" ) {
    // I'm using Location because this will remove the get value
    header( "Location: cart.php" );
    exit;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="cart_css.php">
	<link rel="stylesheet" type="text/css" href="all_products_page_css.php">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
						<li><a href="main_page.php"><span>Home</span></a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="all_products_page.php">Products list</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="account.php">Account</a></li>
					</ul>
				</nav>
				<img src="logo/cart.png" width="30px">
			</div>
			<div class="row">
				<div class="col-2">
					<h1>Check Out Our New Designs!</h1>
					<p>Se khong lam ban phai that vong</p>
					<a href="" class = "btn">Explore Now&#8594;</a>
				</div>
				<div class="col-2">
					<img src="background/image1.png">
				</div>
			</div>
		</div>
	</header>
	<!-- -----------cart items details------------ -->
	<div class="small-container cart-page">
		<table>
			<tr>
				<th>Product</th>
				<th>Quantity</th>
				<th>Subtotal</th>
			</tr>
			<?php while($row = sqlsrv_fetch_array($cart, SQLSRV_FETCH_ASSOC)) {?>
			<tr>
				<td>
					<div class="cart-info">
						<img src="<?php echo $row['images']?>">
						<div>
							<p><?php echo $row['productName'] ?></p>

						<small>Price: <?php echo $row['price']?>đ</small>
						<br>
						<a href="<?php echo "cart.php?caller=somevalue&productId=".$row['productId']?>">Remove</a>
						</div>

					</div>
				</td>
				<td><input type="number" name="" value="<?php echo $row['quantityCart'] ?>"></td>
				<td><del><?php echo $row['price']*$row['quantityCart'];?>đ</del>    <?php $sum+= $row['promotionPrice']*$row['quantityCart']; echo $row['promotionPrice']*$row['quantityCart'];?>đ</td>
			</tr>
						<?php } ?>
		</table>
		<div class="total-price">
			<table>
				<tr>
					<td>Subtotal</td>
					<td><?php echo $sum ?>đ</td>
				</tr>
				<tr>
					<td>Tax</td>
					<td>35.000đ</td>
				</tr>
				<tr>
					<td>Total</td>
					<td><?php $total = $sum + 35000; echo $total;?>đ</td>
				</tr>
			</table>
		</div>
		<a href="<?php echo "order.php?subtotal=".$total ?>" class = 'btn'>Confirm order</a>
	</div>
	<!-- -----------------------footer------------------- -->
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
	<!-- -------------js for toggle menu----------------- -->
	<script>
		var menuItems = document.getElementById('MenuItems')
		menuItems.style.maxHeight = "0px";
		function menutoggle() {
			if (menuItems.style.maxHeight == "0px") {
				menuItems.style.maxHeight = "200px";
			}
			else {
				menuItems.style.maxHeight = "0px";
			}
		}
		function remove() {
      		$.ajax({
           type: "POST",
           url: 'ajax.php',
           data:{action:'remove'},
           success:function(html) {
             alert(html);
           }

      });
 }
	</script>
</body>
</html>