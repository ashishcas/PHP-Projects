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

           $uname = $_POST['username'];
           $class =$_POST['clss'];
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
            

        
           $sql = "INSERT  INTO `users` (username,class,january,jan,february,feb,march,mar,april,apr,may,mayd,june,jun,july,jul,august,aug,september,sep,
                      october,oct,november,nov,december,deci)
 VALUES
 ('$uname','$class',' ',' ',' ',' ',' ',' ',' ',' ',' ', ' ',' ',' ', ' ',' ',' ',' ',' ',' ',' ',' ', ' ',' ',' ',' ');";

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