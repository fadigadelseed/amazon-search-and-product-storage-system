<?php

	$user_id=$_COOKIE["user_id"];

	setcookie('user_id',$user_id,time() + (86400 * -2), './');

	echo "You Have Logged out";
		echo "<br><br>";

	echo"<a href = 'index.html'> Go to Login.";
		echo "<br><br>";

	echo"<a href = 'search_amazon.php'> Go Home.";


	die;
?>
