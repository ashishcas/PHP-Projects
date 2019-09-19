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
		$name = mysqli_real_escape_string($db, $_POST['pname']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$description = mysqli_real_escape_string($db, $_POST['description']);

		

		// form validation: ensure that the form is correctly filled
		if (empty($name)) { array_push($errors, "Username is required"); }
		if (empty($fname)) { array_push($errors, "Password is required"); }
		if (empty($description)) { array_push($errors, "description is required"); }

	

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//encrypt the password before saving in the database
			$query = "INSERT INTO project(name,fname,description) 
					  VALUES('$name','$fname','$description')";
			mysqli_query($db, $query);

			header('location: addproject.php');
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