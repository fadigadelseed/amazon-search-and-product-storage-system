<?php
include('connection.php');
for($i=0; $i < count( $_POST["product_id"] ); $i++) {

	$product_id[$i] = $_POST["product_id"][$i];

	}

for($i=0; $i < count( $_POST["product_desc"] ); $i++) {

	$product_desc[$i] = $_POST["product_desc"][$i];
	$query = "update Products_faregk SET description = '$product_desc[$i]' WHERE id = $product_id[$i]";
	$result = mysql_query($query);

	}


for($i=0; $i < count( $_POST["sell_price"] ); $i++) {

	$sell_price[$i] = $_POST["sell_price"][$i];
	$query = "update Products_faregk SET sell_price = '$sell_price[$i]' WHERE id = $product_id[$i]";
	$result = mysql_query($query);

	//echo $sell_price[$i];

	}
for($i=0; $i < count( $_POST["cost"] ); $i++) {

	$cost[$i] = $_POST["cost"][$i];
	$query = "update Products_faregk SET cost = '$cost[$i]' WHERE id = $product_id[$i]";
	$result = mysql_query($query);

	//echo $cost[$i];

	}

for($i=0; $i < count( $_POST["quantity"] ); $i++) {

	$quantity[$i] = $_POST["quantity"][$i];
	$query = "update Products_faregk SET quantity = '$quantity[$i]' WHERE id = $product_id[$i]";
	$result = mysql_query($query);

	}
echo "<style:'color:green;'>Your Update has been processed Successfully ";
	echo "<br><br>";

	echo"<a  href= view_product.php> View Products</a> ";
	echo"<a  href= logout.php> <br>Login</a> </br>";

	echo "<br><br>";







?>
