<?php

session_start();

 //$name = $_SESSION['username'];

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
      $dateofshow = "";
      $start_time = "";
      $end_time = "";
      $ordinary_seats = "";
      $balcony_seats = "";
      $vip_seats = "";
      $ordinary_price = "";
      $balcony_price = "";
      $showid = "";
            $errors = array();

      $db = mysqli_connect("localhost","root","","sams");

  

      if(isset($_POST['add_admin']))
      {

           $dateofshow = mysqli_escape_string($db,$_POST['clss']);
           $start_time = mysqli_escape_string($db,$_POST['time_from']);
           $end_time = mysqli_escape_string($db,$_POST['time_to']);
           $ordinary_seats = mysqli_escape_string($db,$_POST['oseats']);
           $balcony_seats = mysqli_escape_string($db,$_POST['bseats']);
           $vip_seats = mysqli_escape_string($db,$_POST['vseats']);
           $ordinary_price = mysqli_escape_string($db,$_POST['oprice']);
           $balcony_price = mysqli_escape_string($db,$_POST['bprice']);
           $sno = mysqli_escape_string($db,$_POST['sno']);
           $showid = mysqli_escape_string($db,$_POST['shid']);

           $showid .= $sno;
        
          // $sql = "SELECT * FROM users where username = '$uname' and class = '$class'";

           $dateofshow = date("Y-m-d",strtotime($dateofshow));

           if (empty($showid)) { array_push($errors, "Show id is required"); }

           $sql = "INSERT INTO showdetails(showid,showdate,start_at,end_at,no_ordinary_seats,no_balcony_seats,no_vip_seats,price_ordinary, price_balcony,sno) VALUES ('$showid','$dateofshow','$start_time','$end_time','$ordinary_seats','$balcony_seats','$vip_seats','$ordinary_price','$balcony_price','$sno')";

              $res = mysqli_query($db,$sql);

                            if(!$res)
              {
        //          echo "<script language=\"JavaScript\">\n";
        // echo "alert('Show details not updated');\n";
        // echo "window.location='update_show.php'";
        // echo "</script>"; .

                echo("ERROR : ".mysqli_error($db));
      }
      else
      {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Show details are updated');\n";
        echo "window.location='update_show.php'";
        echo "</script>"; 
      }

        }
      else
      {
        echo "data input failed";
      }

?>