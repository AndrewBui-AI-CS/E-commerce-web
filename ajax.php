<?php
include('connection.php');
if($_POST['action'] == 'remove') {
  $remove_sql = "delete from cart
where productId = ?";
	$pid = $_GET['productId'];
$stmt = sqlsrv_prepare( $conn, $sql, array( &$pid));
sqlsrv_execute( $stmt );
} ?>