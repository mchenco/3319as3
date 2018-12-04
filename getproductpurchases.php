<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Total sales for a given product </title>
</head>

<body>
<?php
	include 'connectdb.php'
?>

<?php
	//find out what product the user is asking about via the form
	$productid = $_POST["product"];
	//query to find the purchases of the products
	$query = 'SELECT SUM(purchases.quantity) AS total, products.description, products.cost
		FROM products, purchases
		WHERE purchases.productid = "' .$productid. '" AND products.productid = "' .$productid. '"';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("database query failed.");
	}
	
	//printing the table of purchases of that product
	echo "Here are the total sales for the product";
	echo "<table>
		<thead>
		<tr>
			<th> Description </th>
			<th> Total Sold </th>
			<th> Revenue </th>
		</tr>
		</thead>
		<tbody>";
	while ($row = mysqli_fetch_assoc($result)) {
		$revenue = $row["total"] * $row["cost"];
		echo "<tr>";
		echo "<td>" . $row["description"] . "</td>";
		echo "<td>" . $row["total"] . "</td>";
		echo "<td>" . $revenue. "</td>";
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
