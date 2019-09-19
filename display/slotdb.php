<?php

    session_start();
	
	// variable 
		$username = "";
	$email    = "";
	$dbdate = date("Y-m-d");
	$dbtime = date("H:i:s");
	$errors = array(); 
	$_SESSION['success'] = "";
	
	$db = mysqli_connect('localhost', 'root', '', 'slotbook');
	
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$dbdate =  mysqli_real_escape_string($db, $_POST['dbdate']);
		$dbtime =  mysqli_real_escape_string($db, $_POST['dbtime']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
        if(empty($dbdate))   { array_push($errors, "Date and time is required"); }

		
		 
		
		//$q = "SELECT id from bookb WHERE date= '$dbdate' AND  time = '$dbtime' ";
		
           $res = mysqli_query($db,"SELECT * from bookb WHERE date='$dbdate' ");
		   $res2 = mysqli_query($db,"SELECT * from bookb  time = '$dbtime' ");
		// register user if there are no errors in the form
		
		if(($res->num_rows) == 0  || ($res2->num_rows) == 0 )
		{
		if (count($errors) == 0) {
	
			$query = "INSERT INTO bookb (date, time) 
					  VALUES('$dbdate', '$dbtime')";
			mysqli_query($db, $query);
			
			 $_SESSION['date'] = $dbdate;
			 $_SESSION['time'] = $dbtime;

			//$_SESSION['username'] = $username;
			//$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}
		}
		else
		{
			echo 'Not possible to book this slot';
			//header('location: index.php');
		}

	}
