<?php
$product_sql = "select Product.*, productCategoryName from Product, ProductCategory where  product.productCategoryId = productCategory.productCategoryId and product.productCategoryId
 = ".$_GET["id"];
$products = sqlsrv_query($conn, $product_sql);
$x = 0;
$y = 0;
$product_row = sqlsrv_fetch_array($products, SQLSRV_FETCH_ASSOC)
?>
<div class="all-product">
	<div class="title">
		<h2><?php echo $product_row['productCategoryName']?></h2>
	</div>
	<?php  while($product_row) { $x+=1;?>
		<div class="row">
			<?php while($product_row = sqlsrv_fetch_array($products, SQLSRV_FETCH_ASSOC)) { $y+=1;?>
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
					<?php $y = 0; while($product_row) { $y+=1;?>
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