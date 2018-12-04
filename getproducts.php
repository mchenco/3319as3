<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Products </title>
</head>

<body>
<?php
	include 'connectdb.php'
?>

<?php
	//get the specific order/sort that the customer wanted to sort the list by
	$order = $_POST["order"];
	$sort = $_POST["sort"];
	
	//query with a specific order and sort
	if ($order && $sort) {
		$query = 'SELECT * FROM products ORDER BY ' .$order. ' ' .$sort; 
	}

	//if the user does not supply order/sort, just use a basic query
	//this exists because getproducts.php is used in other places which don't rely on the user supplying a order/sort
	else {
		$query = 'SELECT * FROM products ORDER BY description';
	}	
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Database query3 failed.");
	}
	
	//print out the products in a table
	echo "
		<table>
			<thead>
			<tr>
				<th> Select </th>
				<th> Description </th>
				<th> Product ID </th>
				<th> Price </th>
				<th> Quantity </th>
			</tr>
			</thead>
			<tbody>
		";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td> <input type='radio' name='product' value='" .$row["productid"]. "' > </td>";
		echo "<td>" . $row["description"] . "</td>";
		echo "<td>" . $row["productid"] . "</td>";
		echo "<td>" . $row["cost"] . "</td>";
		echo "<td>" . $row["quantity"] . "</td>";
		echo "</tr>";
	}
	echo "
		</tbody>
		</table>";
	mysqli_free_result($result);
?>
