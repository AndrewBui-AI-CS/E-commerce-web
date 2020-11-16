<?php
$categories_sql = "select productCategory.productCategoryId, productCategory.productCategoryName, sum(product.quantity) as soluong
from product inner join ProductCategory on Product.productCategoryId = productCategory.productCategoryId
group by ProductCategory.productCategoryId, productCategory.productCategoryName;";
$categories = sqlsrv_query($conn, $categories_sql);
$brand_sql = "select brandsName, sum(product.quantity) as soluong
from product inner join Brands on product.brandsId = brands.brandsId
group by product.brandsId, brandsName;";
$brands = sqlsrv_query($conn, $brand_sql);
?>
<div class="left-sidebar">
	<div class="sidenav">
		<button class="dropdown-btn">Categories<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<?php while($category_row = sqlsrv_fetch_array($categories, SQLSRV_FETCH_ASSOC)) {?>
				<a href="all_products_page.php?view=view_by_categories&id=<?php echo $category_row['productCategoryId'];?>"><?php echo $category_row['productCategoryName'] ?><span>(<?php echo $category_row['soluong'] ?>)</span></a>
			<?php } ?>
		</div>
		<button class="dropdown-btn">Brands<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<?php while($brand_row = sqlsrv_fetch_array($brands, SQLSRV_FETCH_ASSOC)) {?>
				<a href=""><?php echo $brand_row['brandsName'] ?><span>(<?php echo $brand_row['soluong'] ?>)</span></a>
			<?php } ?>
		</div>
		<button class="dropdown-btn">Colors<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<a href="">Black</a>
			<a href="">White</a>
			<a href="">Gray</a>
			<a href="">Blue</a>
			<a href="">Red</a>
			<a href="">Yellow</a>
			<a href="">Green</a>
			<a href="">Pink</a>
		</div>
		<button class="dropdown-btn">Size<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<a href="">S</a>
			<a href="">M</a>
			<a href="">L</a>
			<a href="">XL</a>
			<a href="">XXL</a>
		</div>
		<button class="dropdown-btn">Prices<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<a href=""><200000đ</a>
			<a href=""><500000đ</a>
			<a href=""><1000000đ</a>
			<a href=""><1500000đ</a>
			<a href=""><2000000đ</a>
		</div>
	</div>
	<!-- <ul class = 'list-group'>
		<?php
		$sql = 'select * from brands';
		$result = sqlsrv_query($conn, $sql);
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
			?>
			<li class = 'list-group-item'>
				<div class="form-check">
					<label calss = 'form-check-label'>
						<input type="checkbox" name="" class = 'form-check-input product_check' value = "<?= $row['brandsName']; ?>" id = 'brand'> <?= $row['brandsName'];?>
					</label>
				</div>
			</li>
		<?php } ?>
	</ul> -->
</div>
<?php
$product_sql = "select * from Product";
$products = sqlsrv_query($conn, $product_sql);
$x = 0;
$y = 0;
?>
<!-- <div class="all-product" id = 'result'>
	<div class="title">
		<h2>San pham ban chay</h2>
	</div>
	<div class="text-center">
					<img src="background/background_1.jpg" id = 'loader' width="200" style='display: none'>
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
			</div> -->
<script type="text/javascript">
		$(document).ready(function(){
			$(".product_check").click(function() {
				$('#loader').show();
				var action = 'data';
				var brand = get_filter_text('brand');

				$.ajax({
					url: 'action.php',
					method:'POST',
					data: {action: action, brand: brand },
					success: function(response) {
						$('#result').html(response);
						$('#loader').hide();
						$('#textChange').text('Filtered Products');
					}
				});
			});
			function get_filter_text(text_id) {
			var filterData = [];
			$('#' + text_id + ':checked').each(function() {
				filterData.push($(this).val());
			});
			// document.write(filterData);
			return filterData;
		}
	});
	</script>