<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Add a new customer </title>
</head>

<body>
<?php
	include 'connectdb.php';
?>

<?php
	//find out what customer and what the image is from the form	
	$customer = $_POST["customer"];
	$cusimage = $_POST["cusimage"];
	//query to add the images to the customer
	$query = 'UPDATE customers SET cusimage = "' .$cusimage. '" WHERE customerid = "' .$customer. '"';

	if (!mysqli_query($connection, $query)) {
		die("Error: insert failed" . mysqli_error($connection));
	}
	//confirm image was added
	else {
		echo "The new customer image was added!";
		echo "<img src= '" .$cusimage. "'>";
	}

	mysqli_close($connection);
?>
<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>

