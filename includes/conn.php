<?php
$serverName="localhost";
$serverUser="root";
$dbPassword="";// put empty by default
$dbName="games";
$conn=new mysqli($serverName,$serverUser,$dbPassword,$dbName);
if(! $conn){// check if connection to database is not available
	die("Error connecting to database. ");
}

?>