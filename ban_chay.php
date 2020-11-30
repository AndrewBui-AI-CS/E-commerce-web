<?php
$product_sql = "select * from Product";
$products = sqlsrv_query($conn, $product_sql);
$x = 0;
$y = 0;
if(isset($_GET['productId']))
{
	$check_null = "select * from cart
where productId = ".$_GET['productId'];
	$check_null_exe = sqlsrv_query($conn, $check_null);
	$check_null_row = sqlsrv_fetch_array($check_null_exe, SQLSRV_FETCH_ASSOC);
	if($check_null_row) {
		$update_sql = "update cart
set quantityCart+=1
where productId = ".$_GET['productId'];
		$update = sqlsrv_query($conn, $update_sql);
	}
	else {
			$add_new_sql = "insert into cart
values (1, ".$_GET['productId'].", 1);";
		$add_new = sqlsrv_query($conn,$add_new_sql);
	}
}
?>
<div class="all-product">
	<div class="title">
	<h2>San pham ban chay</h2>
</div>
				<?php  while($product_row = sqlsrv_fetch_array($products, SQLSRV_FETCH_ASSOC)) { $x+=1;?>
					<div class="row">
						<?php while($product_row = sqlsrv_fetch_array($products, SQLSRV_FETCH_ASSOC)) { $y+=1;?>
							<div class="col-4">
								<div class="product-grid">
									<div class="product-image">
										<img src="<?php echo $product_row['images']; ?>">
										<span class="product-trend-label">TRENDING</span>
										<span class="product-discount-label">50%</span>
										<ul class="social">
											<li><a href="<?php echo "all_products_page.php?productId=".$product_row['productId'];?>" data-toggle="tooltip" data-placement="top" title="Add to cart"><i class = "fa fa-shopping-cart" onclick="cart_change()"></i></a></li>
											<li><a href="#" data-toggle="tooltip" data-placement="top" title="Wish List"><i class = "fa fa-heart"></i></a></li>
											<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class = "fa fa-random"></i></a></li>
											<li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class = "fa fa-search"></i></a></li>
										</ul>
									</div>
									<div class="product-content">
										<h3><?php echo $product_row['productName']; ?></h3>
										<p><?php echo $product_row['price']; ?><sup color='red';>đ</sup></p>
									</div>
								</div>
							</div>
							<?php if($y > 3) break;} ?>
						</div>
						<?php
						$y = 0;
						if($x > 3) break;}
						?>
						<div class="related-items">
							<div class="title">
								<h2>Related Items</h2>
							</div>
							<div class="row">
								<?php $y = 0; while($product_row = sqlsrv_fetch_array($products, SQLSRV_FETCH_ASSOC)) { $y+=1;?>
								<div class="col-4">
									<div class="product-grid">
										<div class="product-image">
											<img src="<?php echo $product_row['images']; ?>">
											<span class="product-trend-label">TRENDING</span>
											<span class="product-discount-label">50%</span>
											<ul class="social">
												<li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to cart"><i class = "fa fa-shopping-cart"></i></a></li>
												<li><a href="#" data-toggle="tooltip" data-placement="top" title="Wish List"><i class = "fa fa-heart"></i></a></li>
												<li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class = "fa fa-random"></i></a></li>
												<li><a href="#" data-toggle="tooltip" data-placement="top" title="Quick View"><i class = "fa fa-search"></i></a></li>
											</ul>
										</div>
										<div class="product-content">
											<h3><?php echo $product_row['productName']; ?></h3>
										    <p><?php echo $product_row['price']; ?><sup>đ</sup></p>
										</div>
									</div>
								</div>
								<?php if($y > 3) break;} ?>
							</div>
						</div>
						<div class="next-pages">
							<ul>
								<li><a href="">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href="">4</a></li>
								<a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							</ul>
						</div>
					</div>
				</div>
