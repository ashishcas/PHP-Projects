<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbtuts";
$res = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$res)
{
	echo "not succeded";
}
?>