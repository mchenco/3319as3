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

<h1> Here are the products: </h1>

<?php
	$order = $_POST["order"];
	$sort = $_POST["sort"];
	
	if ($order && $sort) {
		$query = 'SELECT * FROM products ORDER BY ' .$order. ' ' .$sort; 
		echo $query;
	}

	else {
		$query = 'SELECT * FROM products ORDER BY description';
	}	
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Database query3 failed.");
	}
	
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
