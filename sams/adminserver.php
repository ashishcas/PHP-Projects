<?php
      session_start();

        //minutes or more.
      $expireAfter = 30;
 
       //Check to see if our "last action" session
    //variable has been set.
      if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();

       echo "<script language=\"JavaScript\">\n";
        echo "alert('session expired');\n";
        echo "window.location='login.php'";
        echo "</script>";

    }
    
   }
 
    //Assign the current timestamp as the user's
    //latest activity
$_SESSION['last_action'] = time();
  

      
      $uname ="";
      $email = "";
      $phone = "";
      $pass1 = "";
      $pass2 = "";
      $errors = array();

      $db = mysqli_connect("localhost","root","","newdata");

      if (!$db)
      {
      	echo "failed".mysqli_connect_error();
      }
       

      if(isset($_POST['login_admin']))
      {

           $uname = $_POST['username'];
          $password_1 = $_POST['pass'];
          
          		if (empty($uname)) { array_push($errors, "Name is required"); }
			if (empty($password_1)) { array_push($errors, "Password is required"); }


        
        if (count($errors) == 0) {
           	   $password = md5($password_1);

           	    $sql = "SELECT * FROM admin WHERE  username = '$uname' AND password = '$password'";

           $res = mysqli_query($db,$sql);

           if(mysqli_num_rows($res) == 1)
           {
          setcookie("username", $_POST['username'], time() + (86400 * 30)); 
           setcookie("pass", $_POST['pass'], time() + (86400 * 30)); 

           	   $_SESSION['username'] = $uname;
               header('location: adminhomepage.php');
              }
                   }


      }
     
        ?>