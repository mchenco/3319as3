<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Update customer </title>
</head>

<body>
<?php
	include 'connectdb.php';
?>

<?php
	//get customer data from the form
	$customerid = $_POST["customer"];
	$newphone = $_POST["newphone"];
	
	//query to update customer's phone number in the table
	$query = 'UPDATE customers SET phone = "' .$newphone. '" WHERE customerid = "' .$customerid. '"';
	
	if (!mysqli_query($connection, $query)) {
		die("Error: update failed" . mysqli_error($connection));
	}
	echo "Phone number for Customer ".$customerid." has been successfully updated to " .$newphone."." ;	
	
	mysqli_close($connection);
?>

<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>


