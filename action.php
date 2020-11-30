<!-- <?php
include('connection.php');
if(isset($_POST['action'])) {
	$sql = '
	select * from product inner join brands on brands.brandsId = product.brandsId inner join productCategory on product.productCategoryId = ProductCategory.productCategoryId
	where brandsName is not null';
	if(isset($_POST['brand'])) {
		$brand = implode("','", $_POST['brand']);
		$sql = $sql."  and brandsName in ("."'".$brand."')";
	}
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$products = sqlsrv_query( $conn, $sql, $params, $options );
	$rows_count = sqlsrv_num_rows( $products );
	$output='';
	if($rows_count > 0) {
		while($row = sqlsrv_fetch_array($products, SQLSRV_FETCH_ASSOC)){
		$output.=' <div class="col-md-3 mb-2">
					 	<div class="card-deck">
					 		<div class="card border-secondary">
					 			<img src="'.$row['images'].'" alt="" class ="card-img-top">
					 			<div class="card-img-overlay">
					 				<h6 style = "margin-top: 175px;" class = "text-light bg-info text-center round p-1">'.$row['productName'].'</h6>
					 			</div>
					 			<div class="card-body">
					 				<h4 class = "card-title text-danger">PRice: '.number_format($row['price']).'</h4>
					 			</div>
					 		</div>
					 	</div>
					 </div>';
		}}
		else {
		$output = "<h3>No product found</h3>";
	}
	echo $output;
}
?> -->
<?php
include('connection.php');
$shipping_time = "";
foreach($_GET['ship'] as $time) {
	$shipping_time= $shipping_time.$time;
}
$subtotal_display_sql = "select * from Order_Info where orderId = (select top 1 Order_Info.orderId from Order_Info order by orderId desc)";
$subtotal_display = sqlsrv_query($conn, $subtotal_display_sql);
$subtotal_row = sqlsrv_fetch_array($subtotal_display, SQLSRV_FETCH_ASSOC);
if(isset($_GET['name'])&&isset($_GET['address'])&&isset($_GET['email'])&&isset($_GET['phone'])&&isset($_GET['company'])&&isset($_GET['date'])&&isset($_GET['code'])&&isset($_GET['ship'])) {
	$update_order_sql = "update Order_Info set userName =N'".$_GET['name']."',address=N'".$_GET['address']."',email='".$_GET['email']."',phonenumber=".$_GET['phone'].",company='".$_GET['company']."',date='".$_GET['date']."',paymentCode=".$_GET['code'].",shippingTime='".$shipping_time."',idCart=1 where orderId = (select top 1 Order_Info.orderId from Order_Info order by orderId desc)";
	// $update_order = sqlsrv_query($conn, $update_order_sql);
}
 ?>
<html>
<body>

<h2>Your order has been proceeded</h2>
<p>Make sure all the in4 below is correct</p>
<p>Your full name is: <?php echo $_GET['name']; ?></p>
<p>Your phone number is: <?php echo $_GET['phone']; ?></p>
<p>Your email is: <?php echo $_GET['email']; ?></p>
<p>Your address is: <?php echo $_GET['address']; ?></p>
<p>Date of shipping: <?php echo $_GET['date']; ?></p>
<p>Payment code: <?php echo $_GET['code']; ?></p>
<p>Company: <?php echo $_GET['company']; ?></p>
<p>Time of shipping: <?php $name = $_GET['ship'];
foreach ($name as $shipping){
    echo "<br/>".$shipping;
}
 ?></p>
 <h3><strong>Subtotal: <?php echo $subtotal_row['subtotal']; ?>đ</strong></h3>
</body>
</html>