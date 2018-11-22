<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Update customer </title>
</head>

<body>
<?php
	include 'connectdb.php';
?>

<?php
	$customerid = $_POST["customer"];
	$newphone = $_POST["newphone"];
	
	$query = 'UPDATE customers SET phone = "' .$newphone. '" WHERE customerid = "' .$customerid. '"';
	
	if (!mysqli_query($connection, $query)) {
		die("Error: update failed" . mysqli_error($connection));
	}
	echo "Phone number for Customer ".$customerid." has been successfully updated to " .$newphone."." ;	
	
	mysqli_close($connection);
?>
