<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registerc');
	
	
	
			$query = "INSERT INTO users (username,name, email,phone, password) 
			  VALUES('jikl','sdfg', 'rtgt@mail.com','7894561234','74895')";
			
			//$query = "INSERT INTO users (username, email, password) 
			//		  VALUES('$username', '$email', '$password')";
					  
					  
			mysqli_query($db, $query);

			


?>