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
		$username = mysqli_real_escape_string($db, $_POST['iname']);
		$userid = mysqli_real_escape_string($db, $_POST['iloc']);

		$no = mysqli_real_escape_string($db, $_POST['no']);
		

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($userid)) { array_push($errors, "Password is required"); }

	

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$query = "INSERT INTO inventory(name,location,no) 
					  VALUES('$username', '$userid', '$no')";
			mysqli_query($db, $query);


			header('location: add_inventory.php');
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