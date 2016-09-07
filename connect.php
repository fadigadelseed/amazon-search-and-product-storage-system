<?php
  $hostname = "imc.kean.edu";
  $username = "gadelsef";
  $password = "0920298";
  $dbname = "CPS3740_2016S";
  $usertable='Users';


  mysql_connect($hostname,$username, $password) OR DIE("Unable to connect to database! Please try again later");
  mysql_select_db($dbname);

?>
