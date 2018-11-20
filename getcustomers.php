<?php
	$query = "SELECT * FROM customers ORDER BY lname";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die ("Database query failed.");
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<input type = 'radio' name='customers' value = '" . $row["customerid"] . "'>";
		echo "<b> Name: </b>" . $row["lname"] . ", " . $row["fname"];
		echo " ";
		echo "<b> Customer ID: </b>" . $row["customerid"] . " ";
		echo "<b> City: </b>" . $row["city"] . " ";
		echo "<b> Phone: </b>" . $row["phone"] . " ";
		echo "<b> Agent ID: </b>" . $row["agentid"] . " ";
		echo "<br>";
	}
	echo "<br>";
mysqli_free_result($result);
?>

