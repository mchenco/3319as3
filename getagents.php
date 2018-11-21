<?php
	$query = "SELECT * FROM agents ORDER BY fname";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die ("Database query failed.");
	}
	
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<input type = 'radio' name='agent' value = '" . $row["agentid"] . "'>";
		echo "<b> Name: </b>" . $row["fname"] . " " . $row["lname"];
		echo " ";
		echo "<b> Agent ID: </b>" . $row["agentid"] . " ";
		echo "<br>";
	}
	echo "<br>";
mysqli_free_result($result);
?>

