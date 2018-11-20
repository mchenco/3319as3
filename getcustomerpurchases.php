<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Customer's Products </title>
</head>

<body>
<?php
	include 'connectdb.php'
?>

<h1> Here are the products purchased by the customer: </h1>
<ol>
<?php
	$whichCustomerID = $_POST["customers"];
	$query = 'SELECT DISTINCT products.description FROM products, purchases, customers
		WHERE purchases.customerid = "' . $whichCustomerID . '"
		AND purchases.productid = products.productid';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("database query2 failed.");
	}
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo $row["description"];
		echo "</li>";
	}
	mysqli_free_result($result);
?>
</ol>
<?php
	mysqli_close($connection);
?>
</body>
<html>
