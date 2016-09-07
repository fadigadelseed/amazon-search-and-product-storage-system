<?php

    include 'connect.php';

    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
		$cost = $_POST['cost'];
    $sell_price = $_POST['sell_price'];
		$quantity = $_POST['quantity'];
    $vendor_id = $_POST['select_vendor'];
    $user_id=$_COOKIE["user_id"];

    $query = "SELECT name FROM Products_gadelsef";
    $result = mysql_query($query);
    if ($user_id<=0) {
    echo "Please login first!<br>\n";
    exit();
    }

while($row=mysql_fetch_array($result)){
      if(strcmp($row['name'], $product_name) == 0){
  			echo " already exists in database.";
  			exit();
      }
    }
      if($cost <= 0){
  			echo "cost can not be equal to zero or less then zero.";
  			exit();
      }

      if($sell_price <= 0 || $sell_price < $cost){
    			echo "sell price can not be equal to zero or less then the cost.";
    			exit();
        }

      else{
        $sql = "INSERT INTO Products_gadelsef (name, description, sell_price, cost, quantity, user_id, vendor_id)
        VALUES ('$product_name', '$description', $sell_price, $cost, $quantity, $user_id, $vendor_id)";


        $result = mysql_query($sql);

        if($result){
          echo "product has inserted in database";
        } if(!$result){
          echo "insertion is unsuccessful.";
        }
      }
?>
<br><a href="view_product.php"> view the products </a>
