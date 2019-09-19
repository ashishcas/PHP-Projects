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
        echo "window.location='salespersonlogin.php'";
        echo "</script>";

    }
    
   }
 
    //Assign the current timestamp as the user's
    //latest activity
$_SESSION['last_action'] = time();
  

      
      $uname ="";
      $pass1 = "";
      $pass2 = "";
      $errors = array();

      $db = mysqli_connect("localhost","root","","sams");

      if (!$db)
      {
      	echo "failed".mysqli_connect_error();
      }
       

      if(isset($_POST['login_user']))
      {

           $uname = $_POST['userid'];
          $password_1 = $_POST['pass'];
          
          		if (empty($uname)) { array_push($errors, "User id  is required"); }
			if (empty($password_1)) { array_push($errors, "Password is required"); }


        
        if (count($errors) == 0) {
           	   $password = md5($password_1);

           	    $sql = "SELECT * FROM salespersons WHERE  userid = '$uname' AND password = '$password'";

           $res = mysqli_query($db,$sql);

           if(mysqli_num_rows($res) == 1)
           {
          setcookie("userid", $_POST['userid'], time() + (86400 * 30)); 
           setcookie("pass", $_POST['pass'], time() + (86400 * 30)); 

           	   $_SESSION['userid'] = $uname;
               header('location: salespersonhomepage.php');
              }
          else
           {

           	      array_push($errors, "Username already exists");
       echo "<script language=\"JavaScript\">\n";
        echo "alert('Incorrect username or password');\n";
        echo "window.location='salepersonlogin.php'";
        echo "</script>";
      
          }
        }


      }
     
        ?>

