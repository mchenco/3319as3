<?php
	$query = "SELECT * FROM agents ORDER BY fname";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die ("Database query failed.");
	}
	
	echo "
		<table>
			<thead>
			<tr>
				<th> Select </th>
				<th> Name </th>
				<th> Agent ID </th>
			</tr>
			</thead>
			<tbody>
		";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td> <input type = 'radio' name='agent' value = '" . $row["agentid"] . "'> </td>";
		echo "<td>" . $row["fname"] . " " . $row["lname"] . "</td>";
		echo "<td>" . $row["agentid"] . "</td>";
		echo "</tr>";
	}
	echo "</tbody> </table>";
mysqli_free_result($result);
?>

