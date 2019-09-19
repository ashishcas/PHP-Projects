<?php 
  
	session_start();
    
	$expireAfter = 30;
	
	// variable declaration
	
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'search');
	//$conn = mysqli_connect('localhost', 'root', '', 'expertsdb');
	
	
	if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";





	$query = "INSERT INTO answer (anso, anst, area,from , to , quantity, points)  VALUES('asd', 'asd', 'asdfd','2014-10-10'','2014-10-10',20,30)";
				// VALUES('$anso', '$anst', '$area','$from_date','$to_date','$quantity','$points');
			$results = mysqli_query($db, $query);
			
			if($results)
			{
			echo "failed";
			}
			
?>