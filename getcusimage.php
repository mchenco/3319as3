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
	//get what customer's image we're looking for
	$whichCustomerID = $_POST["customer"];
	$query = 'SELECT cusimage FROM customers
		WHERE customers.customerid = "' . $whichCustomerID . '"';
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("database query failed.");
	}
	$row = mysqli_fetch_assoc($result);
	//if the image doesn't exist, allow customer to add an image
	if (!$row['cusimage']) {
		echo "<form action='addcusimage.php' method='post'>";
		echo "There is no image for this customer yet. <br>";
		echo "Enter the link of the customer image here:";
		echo "<input type='text' name='cusimage'> <br>";
		echo "<input type='hidden' name='customer' value='" .$whichCustomerID. "'>";
		echo "<input type='submit' value='Submit image'>";
		echo "</form>";
	}
	//if the image exists, display it
	else {
		echo "Here is the customer image.";
		echo "<img src= '" .$row['cusimage']. "'>";
	}
	mysqli_free_result($result);
?>
<?php
	mysqli_close($connection);
?>
<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>

</body>
<html>
