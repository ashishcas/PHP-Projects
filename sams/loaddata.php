<?php

session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'sams');


if( isset( $_POST['user_name'] ) )
{

$name = $_POST['user_name'];


$selectdata = " SELECT * FROM salespersons WHERE username = $name";

$query = mysqli_query($db,$selectdata);

while($row = mysqli_fetch_array($query))
{
 echo "<p>".$row['userid']."</p>";
}

}else{
	echo "error";
}
?>