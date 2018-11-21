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
	
	$query1 = 'SELECT customerid FROM customers';
	$result = mysqli_query($connection, $query1);	
	$existing_ids = mysqli_fetch_row($result);

	$random_gen_id = rand(0,99);
	
	while (in_array($random_gen_id, $existing_ids)) {
		$random_gen_id = rand(0,99);
		echo $random_gen_id;
	}

	$customerid = $random_gen_id;
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$city = $_POST["city"];
	$phone = $_POST["phonenumber"];
	$agentid = $_POST["agent"];
	
	$query = 'INSERT INTO customers VALUES("' .$customerid. '", "' .$fname. '", "' .$lname. '", "' .$city. '", "' .$phone. '", "' .$agentid. '")';

	if (!mysqli_query($connection, $query)) {
		die("Error: insert failed" . mysqli_error($connection));
	}

	echo "The new customer was added!";
	mysqli_close($connection);
?>
