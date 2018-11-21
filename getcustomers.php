<?php
	$query = "SELECT * FROM customers ORDER BY lname";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die ("Database query failed.");
	}
	
	echo "<table>
		<thead>
		<tr>
			<th> Select </th>
			<th> Last Name </th>
			<th> First Name </th>
			<th> Customer ID </th>
			<th> City </th>
			<th> Phone </th>
			<th> Agent ID </th>
		</tr>
		</thead>
		<tbody>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td> <input type='radio' name='customer' value = '" . $row["customerid"] . "'> </td>";
		echo "<td>" . $row["lname"] . "</td>";
		echo "<td>" . $row["fname"] . "</td>";
		echo "<td>" . $row["customerid"] . "</td>";
		echo "<td>" . $row["city"] . "</td>";
		echo "<td>" . $row["phone"] . "</td>";
		echo "<td>" . $row["agentid"] . "</td>";
		echo "</tr>";
	}
	echo "</tbody> </table>";
mysqli_free_result($result);
?>

