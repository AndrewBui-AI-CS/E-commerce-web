<?php
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
?>
