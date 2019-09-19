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
        echo "window.location='index.php'";
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

      $db = mysqli_connect("localhost","root","","registration");

      if (!$db)
      {
      	echo "failed".mysqli_connect_error();
      }

      $dt = date("Y-m-d");

      $sql = "INSERT INTO datetest(user,datee) VALUES ('$dt','$dt')";

      $res = mysqli_query($db,$sql);

      if($res)
      {
        echo $dt;
      }
      else
      {
        echo "failed";
      }
       


      
     
        ?>