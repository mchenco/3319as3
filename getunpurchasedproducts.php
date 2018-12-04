<?php
	//query to find unpurchased products
	$query = 'SELECT description FROM products WHERE productid NOT IN (SELECT productid FROM purchases)';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Database query failed.");
	}
	
	//print them out in a list
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo "<td>" . $row["description"] . "</td>";
		echo "</li>";
	}
	mysqli_free_result($result);
?>

