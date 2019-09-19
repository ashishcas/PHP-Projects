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
      $userid= "";
      $pass = "";
            $errors = array();

      $db = mysqli_connect("localhost","root","","sams");

  

      if(isset($_POST['add_admin']))
      {

           $uname = $_POST['username'];
           $userid =$_POST['userid'];
           $pass = $_POST['password'];
           $pass = md5($pass);

        $sql = "INSERT INTO salespersons(username,userid,password) VALUES ('$uname','$userid','$pass');";
        $res = mysqli_query($db,$sql);

              if(!$res)
              {
                 echo "<script language=\"JavaScript\">\n";
        echo "alert('Account not created');\n";
        echo "window.location='addsalesperson.php'";
        echo "</script>"; 
      }
      else
      {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Account created successfully');\n";
        echo "window.location='addsalesperson.php'";
        echo "</script>"; 
      }
}
?>