

<?php
	// Database configuration 	
	$hostname = "localhost"; 
	$username = "web289user"; 
	$password = "Cy3ru$1973"; 
	$dbname   = "DSG";
	 
	// Create database connection 
	$db_connect = mysqli_connect($hostname, $username, $password, $dbname); 
	 
	// Check connection 
	if ($db_connect->connect_error) { 
	    die("Connection failed: " . $db_connect->connect_error); 
	}
?>