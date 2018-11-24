<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Add a new customer </title>
</head>

<body>
<?php
	include 'connectdb.php';
?>

<?php
	
	$customer = $_POST["customer"];
	$cusimage = $_POST["cusimage"];
	$query = 'UPDATE customers SET cusimage = "' .$cusimage. '" WHERE customerid = "' .$customer. '"';

	if (!mysqli_query($connection, $query)) {
		die("Error: insert failed" . mysqli_error($connection));
	}

	else {
		echo "The new customer image was added!";
		echo "<img src= '" .$cusimage. "'>";
	}

	mysqli_close($connection);
?>
