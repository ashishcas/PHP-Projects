<?php

session_start();

 $name = $_SESSION['username'];

 /*if(!$name)
 {
  header('location: adminlogin.php');
 }

   echo $name;

*/
 
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

      $db = mysqli_connect("localhost","root","","feepayment");

  

      if(isset($_POST['add_admin']))
      {

           $uname = mysqli_escape_string($db,$_POST['username']);
           $class = mysqli_escape_string($db,$_POST['clss']);
           $month = mysqli_escape_string($db,$_POST['month']);
           $amount = mysqli_escape_string($db,$_POST['amount']);
          /*$june = $_POST['june'];
          $july = $_POST['july'];
          $august = $_POST['august'];
          $september =$_POST['september'];
          $october =$_POST['october'];
          $november =$_POST['november'];
          $december =$_POST['december'];
          $january =$_POST['january'];
          $february =$_POST['february'];
          $march =$_POST['march'];
          $percentage =$_POST['percentage'];     */     
            

        
           $sql = "SELECT * FROM users where username = '$uname' and class = '$class'";

              $res = mysqli_query($db,$sql);

              $row = mysqli_fetch_array($res);

              if($row[$_POST['month']] > 0)
              {
                     echo "<script language=\"JavaScript\">\n";
        echo "alert('Payment already paid');\n";
        echo "window.location='update_payment.php'";
        echo "</script>";

              }
              else
              {
                 $qry = "UPDATE users set $month = '$amount' ";
                 $result = mysqli_query($db,$qry);
              }

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