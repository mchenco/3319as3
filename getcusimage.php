<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Customer's Products </title>
</head>

<body>
<?php
	include 'connectdb.php'
?>

<?php
	$whichCustomerID = $_POST["customer"];
	$query = 'SELECT cusimage FROM customers
		WHERE customers.customerid = "' . $whichCustomerID . '"';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("database query failed.");
	}
	$row = mysqli_fetch_assoc($result);
	if (!$row['cusimage']) {
		echo "<form action='addcusimage.php' method='post'>";
		echo "There is no image for this customer yet. <br>";
		echo "Enter the link of the customer image here:";
		echo "<input type='text' name='cusimage'> <br>";
		echo "<input type='hidden' name='customer' value='" .$whichCustomerID. "'>";
		echo "<input type='submit' value='Submit image'>";
		echo "</form>";
	}
	else {
		echo "Here is the customer image.";
		echo "<img src= '" .$row['cusimage']. "'>";
	}
	mysqli_free_result($result);
?>
<?php
	mysqli_close($connection);
?>
</body>
<html>
