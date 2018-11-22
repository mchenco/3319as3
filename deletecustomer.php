<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Delete customer </title>
</head>

<body>
<?php
	include 'connectdb.php';
?>

<?php
	$customerid = $_POST["customer"];
	
	$query = 'DELETE FROM customers WHERE customerid = "' .$customerid. '"';
	
	if (!mysqli_query($connection, $query)) {
		die("Error: delete failed" . mysqli_error($connection));
	}
	echo "Customer ".$customerid." has been successfully deleted." ;	
	
	mysqli_close($connection);
?>
