<?php
$product_sql = "select Product.* , productCategoryName, Brands.brandsId, brandsName
from Product, ProductCategory, Brands where Product.productCategoryId = ProductCategory.productCategoryId
and Product.brandsId = brands.brandsId ";
$title_sql = $product_sql;
if (isset($_GET['view'])) {
 if(isset($_GET['id_categories'])) {
 		$product_sql= $product_sql."and Product.productCategoryId=".$_GET["id_categories"];
 		$title_sql = $title_sql."and Product.productCategoryId=".$_GET["id_categories"];


}
 	if(isset($_GET['id_price'])) {
 		$product_sql = $product_sql."and price <".$_GET['id_price'];
 		$title_sql = $title_sql."and price <".$_GET['id_price'];
 }
 if(isset($_GET['id_brands'])) {
 		$product_sql = $product_sql."and brands.brandsId =".$_GET['id_brands'];
 		$title_sql = $title_sql."and brands.brandsId =".$_GET['id_brands'];
 }
 if(isset($_GET['id_size'])) {
 		$product_sql = $product_sql."and productId in (select productsize.productId  from productSize inner join size on productSize.idSize = Size.idSize where productSize.idSize =".$_GET['id_size'].")";
 		$title_sql = $title_sql."and productId in (select productsize.productId  from productSize inner join size on productSize.idSize = Size.idSize where productSize.idSize =".$_GET['id_size'].")";
 }
}
$products = sqlsrv_query($conn, $product_sql);
$title = sqlsrv_query($conn, $title_sql);
$title_row = sqlsrv_fetch_array($title, SQLSRV_FETCH_ASSOC);
$x = 0;
$y = 0;
?>
<div class="all-product">
	<div class="title" >
		<h1><?php
		if(isset($_GET['id_categories'])) {
			if(empty($title_row)) echo "No product found!"."<br>"."Please go back to main page";
			else
			echo $title_row['productCategoryName'];}
		else if(isset($_GET['id_brands'])) {if(empty($title_row)) echo "No product found!"."<br>"."Please go back to main page";
			else echo $title_row['brandsName'];}
		else if(isset($_GET['id_price'])) {if(empty($title_row)) echo "No product found!"."<br>"."Please go back to main page";
			else echo '<'.$_GET['id_price'];}
		else echo "Sản phẩm ngẫu nhiên";
		?></h1>
	</div>
		<div class="row">
			<?php while($product_row = sqlsrv_fetch_array($products, SQLSRV_FETCH_ASSOC)) {?>
				<div class="col-4">
					<div class="product-grid">
						<div class="product-image">
							<img src="<?php echo $product_row['images'];?>">
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
				<?php } ?>
			</div>
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