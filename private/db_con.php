<?php

	date_default_timezone_set("Europe/Madrid");

	$servername = "localhost";
	$username = "root";         
	$password = "";             	
	$dbname = "xat_db";
	
	$conn = new mysqli($servername, $username, $password, $dbname);

	$conn->query("SET time_zone = '+1:00';");	

?>