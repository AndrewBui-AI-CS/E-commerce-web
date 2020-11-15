<?php
$serverName = "HOANGBUI-PC\SQPEXPRESS";
$databaseName = "Project_web_ban_hang";

$connectionInfo = array("Database"=>$databaseName,"CharacterSet" => "UTF-8");

/* Connect using SQL Server Authentication. */
$conn = sqlsrv_connect( $serverName, $connectionInfo);
// if($conn) {
// 	echo "Connect successfully"."<br/>";
// }
// else {
// 	echo "Fail to connect";
// }
// $tsql = "SELECT * FROM Product";

/* Execute the query. */

// $stmt = sqlsrv_query( $conn, $tsql);
// while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
// 	echo $row['productName'].", ".$row['productId']."<br />";
// }
// if ( $stmt)
// {
// 	echo "Statement executed.<br>\n";
// }
// else
// {
// 	echo "Error in statement execution.\n";
// 	die( print_r( sqlsrv_errors(), true));
// }
/* Free statement and connection resources. */
// sqlsrv_free_stmt( $stmt);
// sqlsrv_close( $conn);
?>