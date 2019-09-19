<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$name     = "";
	$phone    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registerc');
	
	
	if(mysqli_connect_errno())
    {
	 echo "failed to connect " .mysqli_connect_error();
    }
  else
    {
	  echo "Success";
     }
	 
	 $query = "INSERT INTO users (username, name, email, phone, password) 
			            VALUES('cas','cas', 'cas','145@mail.com','1234')";
						
						
						mysqli_query($db, $query);

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($phone)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			//$query = "INSERT INTO users (username, name, email, phone, password) 
			  //          VALUES('cas','$cas', 'cas','145@mail.com','1234')";
			
			
			
			//VALUES('$username','$name', '$email','$phone','$password')";
			  //VALUES('$username','$name', '$email','$phone','$password')";
			 
					  
			//mysqli_query($db, $query);

			/*$_SESSION['username'] = $username;
			$_SESSION['name']  = $name;
			$_SESSION['phone'] = $phone;
  			$_SESSION['success'] = "You are now logged in";*/
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
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
							$_SESSION['success'] = "You have successfully  registered your slot ";

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You have successfully  registered your slot ";
				header('location: slotbook.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>