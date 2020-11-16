<?php
$categories_sql = "select productCategory.productCategoryId, productCategory.productCategoryName, sum(product.quantity) as soluong
from product inner join ProductCategory on Product.productCategoryId = productCategory.productCategoryId
group by ProductCategory.productCategoryId, productCategory.productCategoryName;";
$categories = sqlsrv_query($conn, $categories_sql);
$brand_sql = "select brandsName, sum(product.quantity) as soluong
from product inner join Brands on product.brandsId = brands.brandsId
group by product.brandsId, brandsName;";
$brands = sqlsrv_query($conn, $brand_sql);
$i = 1;
$URL = array("");
?>
<div class="left-sidebar">
	<div class="sidenav">
		<button class="dropdown-btn">Categories<i class = "fa fa-plus"></i></button>
		<div class="dropdown-container">
			<?php while($category_row = sqlsrv_fetch_array($categories, SQLSRV_FETCH_ASSOC)) {
				$temp = "all_products_page.php?view=view&id_categories=".$category_row['productCategoryId'];
				array_push($URL,$temp);
				?>
				<a href="<?php echo $URL[$i]?>"><?php echo $category_row['productCategoryName'] ?><span>(<?php echo $category_row['soluong'] ?>)</span></a>
			<?php $i++;} ?>
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
			<?php if(isset($_GET['id_categories'])) {?>
			<a href="<?php echo 'all_products_page.php?view=view&id_categories='.$_GET['id_categories'].'&id_price=200000';?>"><200000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_categories='.$_GET['id_categories'].'&id_price=500000';?>"><500000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_categories='.$_GET['id_categories'].'&id_price=1000000';?>"><1000000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_categories='.$_GET['id_categories'].'&id_price=1500000';?>"><1500000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_categories='.$_GET['id_categories'].'&id_price=2000000';?>"><2000000đ</a>
			<?php } else {?>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=200000';?>"><200000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=500000';?>"><500000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=1000000';?>"><1000000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=1500000';?>"><1500000đ</a>
			<a href="<?php echo 'all_products_page.php?view=view&id_price=2000000';?>"><2000000đ</a>
			<?php } ?>
		</div>
	</div>
</div>