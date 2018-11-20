<?php
	$query = 'SELECT * FROM products ORDER BY description';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Database query3 failed.");
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<input type='radio' name='product' value='" .$row["productid"]. "' >";
		echo $row["description"];
		echo "<b> Product ID: </b>" . $row["productid"] . " ";
		echo "<b> Price: </b>" . $row["cost"] . " ";
		echo "<b> Quantity: </b>" . $row["quantity"] . " ";
		echo "<br>";
	}
	mysqli_free_result($result);
?>
