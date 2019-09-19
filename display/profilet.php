<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'search'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT  question
		FROM  questiontb';
		
$qry = mysqli_query($conn, $sql);

if (!$qry) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>



