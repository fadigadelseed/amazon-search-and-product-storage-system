<?php

  include 'connect.php';

  $query= "select id, name, description, sell_price, cost, quantity, user_id, vendor_id from Products_gadelsef";
  $result = mysql_query($query);
  $user_id=$_COOKIE["user_id"];

  echo "<h1>product TABLE</h1>";
  echo "<TABLE border=1>\n";
  echo "<tr><td>Product ID<td><td>Product name<td><td>Product description<td><td>sell_price<td><td>cost<td><td>quantity<td><td>user_id<td><td>vendor name<td></tr>";
  if ($result) {
    while($row = mysql_fetch_array($result)){
      $product_id = $row['id'];
      $product_name = $row['name'];
      $description = $row['description'];
      $sell_price = $row['sell_price'];
      $cost = $row['cost'];
      $quantity = $row['quantity'];
      $user_id = $row['user_id'];
      $vendor_id = $row['vendor_id'];
      $query2 = "SELECT name from Vendors where V_Id = $vendor_id";
  		$result2 = mysql_query($query2);
  		$rowvend = mysql_fetch_array($result2);
  		$queryname = "SELECT first_name,last_name from Users where id = $user_id";
  		$resultsname = mysql_query($queryname);
  		$rowname = mysql_fetch_array($resultsname);

      echo "<tr><td>$product_id<td><td>$product_name<td><td>$description<td><td>$sell_price<td><td>$cost<td><td>$quantity<td><td>$rowname[0] $rowname[1]<td><td>$rowvend[0]<td>";
      }
    echo "</TABLE>\n";
  }
?>
<a href="index.html"> home page </a><br>
<a href="add_product.html"> add a product </a><br>
<a href="search_amazon.php"> show result </a>
