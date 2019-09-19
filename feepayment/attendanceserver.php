<?php


 $name = $_SESSION['username'];

 /*if(!$name)
 {
  header('location: adminlogin.php');
 }

   echo $name;

*/



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
      $june = "";
      $july = "";
      $august = "";
      $september = "";
      $october = "";
      $november = "";
      $december = "";
      $january = "";
      $february = "";
      $march = "";
      $percentage = "";
      $errors = array();

      $db = mysqli_connect("localhost","root","","newdata");

  

      if(isset($_POST['attend_admin']))
      {

           $uname = $_POST['username'];
          $june = $_POST['june'];
          $july = $_POST['july'];
          $august = $_POST['august'];
          $september =$_POST['september'];
          $october =$_POST['october'];
          $november =$_POST['november'];
          $december =$_POST['december'];
          $january =$_POST['january'];
          $february =$_POST['february'];
          $march =$_POST['march'];
          $percentage =$_POST['percentage'];          
            

        
           $sql = "INSERT  INTO attendance (username,june,july,august,september,october,november,december,january,february,march,percentage)
      VALUES('$uname','$june','$july','$august','$september','$october','$november',
                  '$december','$january','$february','$march','$percentage')";

              $res = mysqli_query($db,$sql);

              if(!$res)
              {
                echo "input not inserted";
              }
      }
      else
      {
        echo "data input failed";
      }

?>