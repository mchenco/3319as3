<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Customers who bought over X products </title>
</head>

<body>
<?php
	include 'connectdb.php'
?>

<?php
	//find out what product the customer is asking about
	$productid = $_POST["product"];
	$quantity = $_POST["quantity"];
	//query to get the product/purchase data
	$query = 'SELECT customers.fname, customers.lname, purchases.quantity, products.description
		FROM products, purchases, customers
		WHERE purchases.productid = "' . $productid . '"
		AND purchases.quantity >= "' . $quantity .'"
		AND customers.customerid = purchases.customerid
		AND products.productid = purchases.productid';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("database query2 failed.");
	}
	//print out the purchases in a table
	echo "Here are the customers who purchased over " .$quantity. " of the chosen product <br>";
	echo "<table>
		<thead>
		<tr>
			<th> First Name </th>
			<th> Last Name </th>
			<th> Product Description </th>
			<th> Purchase Quantity </th>
		</tr>
		</thead>
		<tbody>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>" . $row["fname"] . "</td>";
		echo "<td>" . $row["lname"] . "</td>";
		echo "<td>" . $row["description"] . "</td>";
		echo "<td>" . $row["quantity"] . "</td>";
		echo "</tr>";
	}
	echo "</tbody> </table>";
	mysqli_free_result($result);
	mysqli_close($connection);
?>
<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>


</body>
<html>
