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
	$productid = $_POST["product"];
	$query = 'SELECT SUM(purchases.quantity) AS total, products.description, products.cost
		FROM products, purchases
		WHERE purchases.productid = "' .$productid. '" AND products.productid = "' .$productid. '"';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("database query failed.");
	}
	
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
</body>
<html>
