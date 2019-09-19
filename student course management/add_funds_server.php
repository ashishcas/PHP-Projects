<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'udis');

	// REGISTER USER
	if (isset($_POST['add_student'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['fundname']);
		$userid = mysqli_real_escape_string($db, $_POST['type']);
		$amount = mysqli_real_escape_string($db, $_POST['amount']);
		$date = mysqli_real_escape_string($db, $_POST['date']);
		

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }


	

		// register user if there are no errors in the form
		if (count($errors) == 0) {

			$query = "INSERT INTO funds(name,type,amount,fdate) 
					  VALUES('$username', '$userid', '$amount','$date')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: add_funds.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM  admin WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
							$_SESSION['success'] = "You have successfully  registered your slot ";

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You have successfully  registered your slot ";
				header('location: index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>