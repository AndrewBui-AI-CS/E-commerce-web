<?php
$categories_sql = "select productCategory.productCategoryId, productCategory.productCategoryName, sum(product.quantity) as soluong
from product inner join ProductCategory on Product.productCategoryId = productCategory.productCategoryId
group by ProductCategory.productCategoryId, productCategory.productCategoryName;";
$categories = sqlsrv_query($conn, $categories_sql);
$brand_sql = "select brandsName, product.brandsId, sum(product.quantity) as soluong
from product inner join Brands on product.brandsId = brands.brandsId
group by product.brandsId, brandsName;";
$brands = sqlsrv_query($conn, $brand_sql);
$size_sql = "select * from Size";
$size = sqlsrv_query($conn, $size_sql);
$i = 1;
$j = 1;
$k = 1;
$URL = array("");
?>
<div class="left-sidebar">
	<div class="sidenav">
		<button class="dropdown-btn">Categories<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<?php while($category_row = sqlsrv_fetch_array($categories, SQLSRV_FETCH_ASSOC)) {
				if(isset($_GET['id_brands']) and isset($_GET['id_size'])) {
					$temp = "all_products_page.php?view=view&id_brands=".$_GET['id_brands']."&id_size=".$_GET['id_size']."&id_categories=".$category_row['productCategoryId'];
					// array_push($URL,$temp);
				}
				else if(isset($_GET['id_brands'])) {
					$temp = "all_products_page.php?view=view&id_brands=".$_GET['id_brands']."&id_categories=".$category_row['productCategoryId'];
					// array_push($URL,$temp);
				}
				else if(isset($_GET['id_brands'])) {
					$temp = "all_products_page.php?view=view&id_size=".$_GET['id_size']."&id_categories=".$category_row['productCategoryId'];
					// array_push($URL,$temp);
				}
				else $temp = "all_products_page.php?view=view&id_categories=".$category_row['productCategoryId'];
					array_push($URL,$temp);?>
					<a href="<?php echo $URL[$i]?>"><?php echo $category_row['productCategoryName'] ?><span>(<?php echo $category_row['soluong']; echo $i;?>)</span></a>
			<?php $i++;$k++;} ?>
		</div>
		<button class="dropdown-btn">Brands<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<?php while($brand_row = sqlsrv_fetch_array($brands, SQLSRV_FETCH_ASSOC)) {
				if(isset($_GET['id_categories']) and isset($_GET['id_size'])) {
					$temp = "all_products_page.php?view=view&id_categories=".$_GET['id_categories']."&id_size=".$_GET['id_size']."&id_brands=".$brand_row['brandsId'];
					// array_push($URL,$temp);
				}
				else if(isset($_GET['id_categories'])) {
					$temp = "all_products_page.php?view=view&id_categories=".$_GET['id_categories']."&id_brands=".$brand_row['brandsId'];
					// array_push($URL,$temp);
				}
				else if(isset($_GET['id_size'])) {
					$temp = "all_products_page.php?view=view&id_size=".$_GET['id_size']."&id_brands=".$brand_row['brandsId'];
					// array_push($URL,$temp);
				}
				else $temp = "all_products_page.php?view=view&id_brands=".$brand_row['brandsId'];
				array_push($URL,$temp);
					?>
				<a href="<?php echo $URL[$i]?>"><?php echo $brand_row['brandsName'] ?><span>(<?php echo $brand_row['soluong']; echo $j; ?>)</span></a>
			<?php $i++;$j++;} ?>
		</div>
		<button class="dropdown-btn">Size<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<?php while($size_row = sqlsrv_fetch_array($size, SQLSRV_FETCH_ASSOC)) {
				if(isset($_GET['id_categories']) and isset($_GET['id_brands'])) {
					$temp = "all_products_page.php?view=view&id_categories=".$_GET['id_categories']."&id_brands=".$_GET['id_brands']."&id_size=".$size_row['idSize'];
					// array_push($URL,$temp);
				}
				else if(isset($_GET['id_categories'])) {
					$temp = "all_products_page.php?view=view&id_categories=".$_GET['id_categories']."&id_size=".$size_row['idSize'];
					// array_push($URL,$temp);
				}
				else if(isset($_GET['id_brands'])) {
					$temp = "all_products_page.php?view=view&id_brands=".$_GET['id_brands']."&id_size=".$size_row['idSize'];
					// array_push($URL,$temp);
				}
				else $temp = "all_products_page.php?view=view&id_size=".$size_row['idSize'];
				array_push($URL,$temp);
					?>
				<a href="<?php echo $URL[$i]?>"><?php echo $size_row['sizeName'] ?><span>(<?php echo $size_row['quantity'];echo $k;?>)</span></a>
			<?php $i++;} ?>
		</div>
			<button class="dropdown-btn">Prices<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<?php if(isset($_GET['id_categories'])) {?>
			<a href="<?php echo $URL[$_GET['id_categories']].'&id_price=200000';?>"><200000đ</a>
			<a href="<?php echo $URL[$_GET['id_categories']].'&id_price=500000';?>"><500000đ</a>
			<a href="<?php echo $URL[$_GET['id_categories']].'&id_price=1000000';?>"><1000000đ</a>
			<a href="<?php echo $URL[$_GET['id_categories']].'&id_price=1500000';?>"><1500000đ</a>
			<a href="<?php echo $URL[$_GET['id_categories']].'&id_price=2000000';?>"><2000000đ</a>
			<?php } else if(isset($_GET['id_brands'])) {?>
			<a href="<?php echo $URL[ $k+ $_GET['id_brands']].'&id_price=200000';?>"><200000đ</a>
			<a href="<?php echo $URL[ $k+ $_GET['id_brands']].'&id_price=500000';?>"><500000đ</a>
			<a href="<?php echo $URL[ $k+ $_GET['id_brands']].'&id_price=1000000';?>"><1000000đ</a>
			<a href="<?php echo $URL[ $k+ $_GET['id_brands']].'&id_price=1500000';?>"><1500000đ</a>
			<a href="<?php echo $URL[ $k+ $_GET['id_brands']].'&id_price=2000000';?>"><2000000đ</a>
		    <?php } else if(isset($_GET['id_size'])){?>
		    <a href="<?php echo $URL[$k+$j+$_GET['id_size']].'&id_price=200000';?>"><200000đ</a>
			<a href="<?php echo $URL[$k+$j+$_GET['id_size']].'&id_price=500000';?>"><500000đ</a>
			<a href="<?php echo $URL[$k+$j+$_GET['id_size']].'&id_price=1000000';?>"><1000000đ</a>
			<a href="<?php echo $URL[$k+$j+$_GET['id_size']].'&id_price=1500000';?>"><1500000đ</a>
			<a href="<?php echo $URL[$k+$j+$_GET['id_size']].'&id_price=2000000';?>"><2000000đ</a>
			<?php } else { ?>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=200000';?>"><200000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=500000';?>"><500000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=1000000';?>"><1000000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=1500000';?>"><1500000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=2000000';?>"><2000000đ</a>
			<?php } ?>
		</div>
	</div>
</div>