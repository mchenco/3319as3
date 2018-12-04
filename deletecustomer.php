<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Delete customer </title>
</head>

<body>
<?php
	include 'connectdb.php';
?>

<?php
	//find out what customer was selected to be deleted from the form
	$customerid = $_POST["customer"];
	
	//sql query to delete the customer
	$query = 'DELETE FROM customers WHERE customerid = "' .$customerid. '"';
	
	if (!mysqli_query($connection, $query)) {
		die("Error: delete failed" . mysqli_error($connection));
	}
	echo "Customer ".$customerid." has been successfully deleted." ;	
	
	mysqli_close($connection);
?>

<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>


