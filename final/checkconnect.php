<?php

session_start();

 
 $db =  mysqli_connect("localhost:3306","root","","expertsdb");
 
 $username = mysqli_real_escape_string($db, $_POST['username']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
 $pass = mysqli_real_escape_string($db, $_POST['password_1']);
 
 if(mysqli_connect_errno())
    {
	 echo "failed to connect " .mysqli_connect_error();
    }
  else
    {
	  echo "Success";55
     }


 $sql = "INSERT INTO  costumertb (username,name,email,phone,password) 
             VALUES('$first','$last','$mail','$phone','$pass');";
 
 
 if(mysqli_query($db,$sql))
 {
	 echo "DATA INSERTED";
 }
 else
 {
	 echo "DATA NOT INSERTED";
 }
 
 
 ?>