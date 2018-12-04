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
	// get the list of existing customer IDs	
	$query1 = 'SELECT customerid FROM customers';
	$result = mysqli_query($connection, $query1);	
	$existing_ids = mysqli_fetch_row($result);
	
	//keep generating a random id until you get one that doesn't already exist
	$random_gen_id = rand(0,99);
	while (in_array($random_gen_id, $existing_ids)) {
		$random_gen_id = rand(0,99);
		echo $random_gen_id;
	}
	
	//use form data and the random id to create a new user
	$customerid = $random_gen_id;
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$city = $_POST["city"];
	$phone = $_POST["phonenumber"];
	$agentid = $_POST["agent"];
	
	//query to add the new customer into the table
	$query = 'INSERT INTO customers VALUES("' .$customerid. '", "' .$fname. '", "' .$lname. '", "' .$city. '", "' .$phone. '", "' .$agentid. '")';

	if (!mysqli_query($connection, $query)) {
		die("Error: insert failed" . mysqli_error($connection));
	}

	echo "The new customer was added!";
	mysqli_close($connection);
?>


<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>



