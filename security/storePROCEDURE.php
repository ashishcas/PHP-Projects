<?php 
	session_start();

	// variable declaration
	$errors = array(); 
	$_SESSION['success'] = "";
	$first = "fgt1";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'search');
	
	
	if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
         }

	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
        $sql = "CALL GET_ALL()";
		
		$res = mysqli_query($db,$sql);
		
		while($result = mysqli_fetch_array($res))
        {
			print "<pre>";
			print_r($result);
		}
	
	
	?>