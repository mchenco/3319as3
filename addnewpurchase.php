<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> Add a new purchase </title>
</head>

<body>
<?php
	include "connectdb.php";
?>

<h1> Add purchase information: </h1>
<ol>

<?php
	//get the selected customer, product, quantity from the form
	$customerID = $_POST["customer"];
	$productID = $_POST["product"];
	$quantity = $_POST["quantity"];
	
	//query to check if the purchase already exists (to see if just quantity needs to be updated)
	$query1 = 'SELECT COUNT(quantity) FROM purchases
		WHERE "' .$customerID. '" = customerid,
		AND "' .$productID. '" = productid';
	
	$purchase_exists = mysqli_query($connection, $query1);
	
	//if the purchase exists, update the quantity of the purchase
	if ($purchase_exists >= 0) {
		$query2 = 'SELECT quantity FROM purchases
			WHERE "' .$customerID. '" = customerid,
			AND "' .$productID.'" = productid';
		$purchase_exists_quantity = mysqli_query($connection, $query2);
		
		$new_quantity = intval($purchase_exists_quantity) + intval($quantity); 
		$query = 'UPDATE purchases SET quantity = "' .$new_quantity. '"
			WHERE customerid = "' .$customerID. '"
			AND productid = "' .$productID. '"';
	}

	//otherwise, insert a new purchase into the table
	else { 
		$query = 'INSERT INTO purchases values("' .$productID. '", "' .$customerID. '", "' .$quantity. '")';
	
	}

	if (!mysqli_query($connection, $query)) {
		die("Error: insert failed" . mysqli_error($connection));
	}
	
	echo "Your purchase was added!";
	mysqli_close($connection);
?>
</ol>
<form action="http://cs3319.gaul.csd.uwo.ca/vm032/assignment3/index2.php">
	<input type="submit" value="Go back to home page" />
</form>

</body>
</html>
