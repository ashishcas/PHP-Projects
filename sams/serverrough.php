<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'sams');



  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
   $pass = md5('ashish');
  $user_check_query = "INSERT INTO showmanager (username,password)  VALUES ( 'ashish','$pass');";
  $result = mysqli_query($db, $user_check_query);
  
  

  // Finally, register user if there are no errors in the form
//   if (count($errors) == 0) {
//   	$password = md5($password_1);//encrypt the password before saving in the database

//   	$query = "INSERT INTO users (username, email, password) 
//   			  VALUES('$username', '$email', '$password')";
//   	mysqli_query($db, $query);
//   	$_SESSION['username'] = $username;
//   	$_SESSION['success'] = "You are now logged in";
//   	header('location: index.php');
//   }
// }
