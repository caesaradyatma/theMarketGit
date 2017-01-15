<?php
  //$path ="/Applications/XAMPP/xamppfiles/temp/";
  //session_save_path($path);

  session_start();

  //Mysql Connect configuration
  mysql_connect("localhost","root","my_password") or DIE("Connection error");

  //Database Connect configuration
  mysql_select_db('themarket') or DIE("");

/*
	$db_host     = "localhost";
	$db_user     = "fusevamf_fuse16";
	$db_password = "fuse-2016";
	$db_table    = "fusevamf_fuse16";
	//$site_baseAddress = "http://".$_SERVER['SERVER_NAME']."/bingo2016reg/";
	//$regis_close = "1466726399"; // Last registration unix timestamp
	//$payment_close = "1466726399"; // Last registration unix timestamp
	//$payment_earlyBird = "1466121599"; // Earlybird registration unix timestamp
*/	
/*	// Create connection
	$conn = mysql_connect($db_host, $db_user, $db_password);
	//$conn= mysql_connect("localhost","root","");
	mysql_select_db($db_table);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
*/
	// Start the session
	//session_start();
  

 ?>
