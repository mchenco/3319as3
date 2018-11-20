<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title> Store </title>
</head>

<body>
	<?php
		include 'connectdb.php';
	?>

	<h1> Welcome to the store </h1>
	
	<h2> Customer Information </h2>
		<form action="getcustomerpurchases.php" method="post">
			<?php
				include 'getcustomers.php';
			?>
		<input type="submit" value="Get Customer Purchases">
		</form>
	
	<h2> Products </h2>
		<?php
			include 'getproducts.php';
		?>
	
	<h2> Insert a new purchase </h2>
		<form action = "addnewpurchase.php" method="post">
			Choose a customer: <br> <?php include 'getcustomers.php'; ?> <br>
			Choose a product: <br> <?php include 'getproducts.php'; ?> <br>
			Quantity purchased: <input type="text" name="quantity"> <br>
		<input type="submit" value="Add New Purchase">
		</form>
	<h2> Insert a new customer </h2>
	<h2> Update a customer phone number </h2>
	<h2> Delete a customer </h2>
	<h2> List all customers who bought more than X of any product </h2>
	<h2> List the description of a product that has never been purchased </h2>
	<h2> List the total number of purchases for a particular product </h2>
	<h2> BONUS: Add an extra field to the customer's table </h2>
	<?php
		mysqli_close($connection);
	?>

</body>
</html>
