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
	//get the customer id from the form, and query the database to see what was purchased by that customer
	$whichCustomerID = $_POST["customer"];
	$query = 'SELECT DISTINCT products.description FROM products, purchases, customers
		WHERE purchases.customerid = "' . $whichCustomerID . '"
		AND purchases.productid = products.productid';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("database query2 failed.");
	}
	//print out a list of products that were purchased
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo $row["description"];
		echo "</li>";
	}
	mysqli_free_result($result);
?>
</ol>

<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>

<?php
	mysqli_close($connection);
?>
</body>
<html>
