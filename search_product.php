<?php
include 'connect.php';

$keyword = $_POST["keywords"];

$star = "*";




if(strcmp($keyword, $star) == 0){

	$query = "SELECT id, name, description,sell_price,cost,quantity,user_id,Vendor_id from Products_gadelsef";
	$result = mysql_query($query);


	echo "<center><TABLE border=1>\n";
	echo "<tr><td>Product ID<td><td>Product Name<td><td>Product Description<td><td>Sell Price<td><td>Product
			Cost<td><td>Quantity<td><td>User Name<td><td>Vendor Name<td> </tr>";
	while($row = mysql_fetch_array($result)){
		$product_id = $row['id'];
		$product_name = $row['name'];
		$description = $row['description'];
		$sell_price = $row['sell_price'];
		$cost = $row['cost'];
		$quantity = $row['quantity'];
		$user_id = $row['user_id'];
		$vendor_id =$row['Vendor_id'];
		$query2 = "SELECT name from Vendors where V_Id = $vendor_id";
		$result2 = mysql_query($query2);
		$rowvend = mysql_fetch_array($result2);
		$queryname = "SELECT first_name,last_name from Users where id = $user_id";
		$resultsname = mysql_query($queryname);
		$rowname = mysql_fetch_array($resultsname);

		echo "<tr><td>$product_id<td><td>$product_name<td><td>$description<td><td>$sell_price<td><td>$cost<td><td>$quantity<td><td>
			$rowname[0] $rowname[1]<td><td>$rowvend[0]<td>";

	}
	echo "</table>";
		echo"<a href = 'index.html'> Go Back.";

	die;
}

$query3 = "SELECT id,name,description,sell_price,cost,quantity,user_id,Vendor_id from Products_gadelsef WHERE name = '$keyword' ";
$query4 = "SELECT id,name,description,sell_price,cost,quantity,user_id,Vendor_id from Products_gadelsef WHERE description like '%$keyword%' ";
$result3 = mysql_query($query3);
$result4 = mysql_query($query4);
$row5 = mysql_fetch_row($result3);
$row3 = mysql_fetch_row($result4);


if(!empty($row5[0]) || !empty($row3[0])){

		echo "<center><TABLE border=1>\n";
			echo "<tr><td>Product ID<td><td>Product Name<td><td>Product Description<td><td>Sell Price<td><td>Product
				Cost<td><td>Quantity<td><td>User Name<td><td>Vendor Name<td> </tr>";

		$product_id = $row5[0];
		$product_name = $row5[1];
		$description = $row5[2];
		$sell_price = $row5[3];
		$cost = $row5[4];
		$quantity = $row5[5];
		$user_id = $row5[6];
		$vendor_id =$row5[7];
		$query2 = "SELECT name from Vendors where V_Id = $vendor_id";
		$result2 = mysql_query($query2);
		$rowvend = mysql_fetch_array($result2);
		$queryname = "SELECT first_name,last_name from Users where id = $user_id";
		$resultsname = mysql_query($queryname);
		$rowname = mysql_fetch_array($resultsname);

		echo "<tr><td>$product_id<td><td>$product_name<td><td>$product_desc<td><td>$sell_price<td><td>$cost<td><td>$quantity<td><td>
			$rowname[0] $rowname[1]<td><td>$rowvend[0]<td>";


		$product_id = $row3[0];
		$product_name = $row3[1];
		$description = $row3[2];
		$sell_price = $row3[3];
		$cost = $row3[4];
		$quantity = $row3[5];
		$user_id = $row3[6];
		$vendor_id =$row3[7];
		$query2 = "SELECT name from Vendors where V_Id = $vendor_id";
		$result2 = mysql_query($query2);
		$rowvend = mysql_fetch_array($result2);
		$queryname = "SELECT first_name,last_name from Users where id = $user_id";
		$resultsname = mysql_query($queryname);
		$rowname = mysql_fetch_array($resultsname);

		echo "<tr><td>$product_id<td><td>$product_name<td><td>$description<td><td>$sell_price<td><td>$cost<td><td>$quantity<td><td>
			$rowname[0] $rowname[1]<td><td>$rowvend[0]<td>";
		echo"</TABLE>";
			echo"<a href = 'index.html'> Go Back.";

		die;

}else{
	echo "No Records Found for Keyword: <b>$keyword</b>";
		echo"<br><br>";
		echo"<a href = 'index.html'> Go Back.";

	exit();
	}
	echo"<a href = 'index.html'> Go Back.";

?>
