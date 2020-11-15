<?php include('connection.php');
$x = 0;
$y = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Document</title>
</head>
<body>

	<h3 class = 'text-center text-light bg-info p-2'>Advanced PRoduct filter</h3>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<h5>Filter Products</h5>
				<hr>
				<h6 class = "text-info">Select Brand</h6>
                <ul class = 'list-group'>
                	<?php
                	$sql = 'select * from brands';
                	$result = sqlsrv_query($conn, $sql);
                	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                	 ?>
                	<li class = 'list-group-item'>
                		<div class="form-check">
                			<label calss = 'form-check-label'>
                				<input type="checkbox" name="" class = 'form-check-input product_check' value = "<?= $row['brandsName']; ?>" id = 'brands'> <?= $row['brandsName'];?>
                			</label>
                		</div>
                	</li>
                <?php } ?>
                </ul>
			</div>
			<div class="col-lg-9">
				<h5 class = 'text-center' id = 'textChange'>All product</h5>
				<hr>
				<div class="text-center">
					<img src="background/background_1.jpg" id = 'loader' width="200" style='display: none'>
				</div>
				<div  class = 'row' id = 'result'>
					<?php
					$sql = 'select * from product';
					$result = sqlsrv_query($conn, $sql);
					while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) { $x+=1;
					 ?>
					 <div class="col-md-3 mb-2">
					 	<div class="card-deck">
					 		<div class="card border-secondary">
					 			<img src="<?php echo $row['images']; ?>" alt="" class ='card-img-top'>
					 			<div class="card-img-overlay">
					 				<h6 style = 'margin-top: 175px;' class = 'text-light bg-info text-center round p-1'><?php echo $row['productName'];?></h6>
					 			</div>
					 			<div class="card-body">
					 				<h4 class = 'card-title text-danger'>PRice: <?php echo number_format($row['price']); ?></h4>
					 			</div>
					 		</div>
					 	</div>
					 </div>
					<?php } ?>
				</div>
			</div>
			</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".product_check").click(function() {
				$('#loader').show();
				var action = 'data';
				var brand = get_filter_text('brands');

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
</body>
</html>