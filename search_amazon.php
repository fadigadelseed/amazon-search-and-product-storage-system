
<HTML>
	<?php
	include 'connect.php';

	$username = $_POST["username"];
	$password = $_POST["password"];
	$keyword = urlencode($_POST["keywords"]);
	$ipadd = $_SERVER['REMOTE_ADDR'];
	$ipadd1 =  substr($ipadd,0,3);
	$ipadd2 =  substr($ipadd,0,8);

	$query = "SELECT login, password, role, first_name, last_name, address, zipcode, state, id FROM Users WHERE login='{$_POST[username]}';";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	$user_id = $row[8];

	if(strcmp($row[0],$username) != 0){ // make sure login and username are the same
		echo"Login ID <b>$username</b> Does not Exist in the Database" . '<br>';
		echo"<a href = index.html> Click Here to Login.</a>";
		exit();
	}else if(strcmp($row[1], $password) != 0){ // make sure password is the same
		echo"User Exits, but password is incorrect". '<br>';
		echo"<a href = index.html> Click Here to Login.</a>";
		exit();
	}else{
		//Set cookie
		setcookie('user_id',$user_id,time() + (86400 * 2), './');
		if(isset($_COOKIE["user_id"])&&!empty($_COOKIE["user_id"])){
			$user_id=$_COOKIE["user_id"];
		}

		if(strcmp($row[2], 'staff') !=0){

			if ($user_id<=0) {
				echo "Please login first!<br>\n";
				echo"<a href = index.html> Click Here to Login.</a>";

				die;
			}else{

				echo "Welcome <b>$row[3] $row[4] </b> ";
				echo "from IP : '$ipadd' " . '<br>';
				echo "you are a '$row[2]'" . '<br>';
				if(strcmp($ipadd1,'10.') ==0 ||strcmp($ipadd2,'131.125.') ==0){
					echo "you are from Kean Domain" . '<br>';
				}else{
					echo "you are Not from Kean Domain" . '<br>';
				}
				echo "your address is $row[5] , $row[7] $row[6]" ;


				echo"<a  href= add_product.html><br>Click Here To Add a New Product</a></br> ";
				echo"<a  href= view_product.php> View Products</a> ";
				echo"<a  href= logout.php> <br>Logout</a> </br>";

				die;
			}
		}
		if(strcmp($row[2], 'staff') ==0){
			echo "Welcome <b>$row[3] $row[4] </b> ";
			echo "from IP : '$ipadd' " . '<br>';
			echo "you are a '$row[2]'" . '<br>';
			if(strcmp($ipadd1,'10.') ==0 ||strcmp($ipadd2,'131.125.') ==0){
				echo "you are from Kean Domain" . '<br>';
			}else{
				echo "you are Not from Kean Domain" . '<br>';
			}
			echo "your address is $row[5] , $row[7] $row[6]" ;

			echo"<a href= add_product.html><br>Click Here To Add a New Product</a></br> ";
			echo"<a href= view_product.php> View Products</a> ";
			echo"<a href= display_update.php> <br>Update Products</a> </br>";
			echo"<a href= logout.php> <br>Logout</a> </br>";
		}
	}
	?>

</HTML>
