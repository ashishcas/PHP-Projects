<?php  
 
  $db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
//$username = "";
$db_name = 'search'; // Database Name

$input = "";
//$username = $_SESSION['username'];


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

if(isset($_POST['sub']))
{
        $inpt = mysqli_real_escape_string($conn, $_POST['inp']);
      $sql = "INSERT INTO tabtest (data) VALUES ('$inpt')";
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

}




?>