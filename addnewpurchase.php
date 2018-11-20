<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Add a new purchase </title>
</head>

<body>
<?php
	include "connectdb.php";
?>

<h1> Add purchase information: </h1>
<ol>

<?php
	$customerID = $_POST["customerid"];
	$productID = $_POST["purchaseid"];
	$quantity = $_POST["quantity"];
	
	$query = 'INSERT INTO purchases values("' .$customerID. '", "' .$productID. '", "' .$quantity. '")';
	
	if (!mysqli_query($connection, $query)) {
		die("Error: insert failed" . mysqli_error($connection));
	}
	
	echo "Your purchase was added!";
	mysqli_close($connection);
?>
</ol>
</body>
</html>
