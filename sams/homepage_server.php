<?php
session_start();
 $name = $_SESSION['username'];

 if(!$name)
 {
  header('location: index.php');
 }

date_default_timezone_set('Asia/Calcutta'); 

$db = mysqli_connect('localhost', 'root', '', 'sams');
$result = "";
    $ids = array();
function show_percentage(){
  $db = mysqli_connect('localhost', 'root', '', 'sams');
   $getsalesid = "SELECT * FROM salespersons";
   $result = mysqli_query($db,$getsalesid);
    


    if(!$result){
                printf("Error: %s\n", mysqli_error($db));
     }

     while($getids = mysqli_fetch_array($result)){
      $ids[] = $getids["userid"];
     }

     for ($i=0; $i <count($ids) ; $i++) { 
      # code...
      echo $ids[$i];
      $nam = $ids[$i]; 

      $sql = "SELECT COUNT(ticketid) AS total FROM booking
               WHERE salesid = '$nam' ";

      $totalCount = "SELECT COUNT(ticketid) AS totalcnt FROM booking ";

      $resTotal = mysqli_query($db,$totalCount);


       if(!$resTotal){
                printf("Error: %s\n", mysqli_error($db));
             }


        while($counts  = mysqli_fetch_assoc($resTotal)){
         $tot = $counts['totalcnt'];
         // echo '<br>'.$tot.'</br>';
         }

       $sqlBalcony = "SELECT COUNT(ticketid) AS total FROM booking
                      WHERE salesid = '$nam'
                      AND seat_type = 'balcony' ";

      $res = mysqli_query($db,$sql);

        if(!$res){
                printf("Error: %s\n", mysqli_error($db));
             }
      while($row = mysqli_fetch_assoc($res)){
      $cnt = $row['total']/$tot;
      // echo '<br>'. $cnt*100 .'</br>';
       }
     }

  }


//Code to caluclate the percentage of balcony and ordinary seats booked
 if(isset($_POST['percentage'])){


     $balcony_seats= "SELECT count(ticketid) as bal FROM booking WHERE seat_type = 'balcony'
         AND 
         showdate ='". $_POST['showd']."'
        ";


        $ordinary_seats= "SELECT count(ticketid) as ord FROM booking WHERE seat_type = 'ordinary'
         AND 
         showdate ='". $_POST['showd']."'
        ";
       
       $count_bal = "";
       $count_ord = "";

       $res_bal = mysqli_query($db,$balcony_seats);
       if($col = mysqli_fetch_assoc($res_bal)){
            $count_bal = $col['bal'];
            echo $col['bal'];
            //echo 'hel<br>'.$count_bal.'<br>';
       }

       if(!$res_bal){
                printf("Error: %s\n", mysqli_error($db));
        }
  
        $res_ord = mysqli_query($db,$ordinary_seats);
        if($col  = mysqli_fetch_assoc($res_ord)){
            $count_ord = $col['ord'];
            //echo "<br>".$count_ord."<br>";
       }

        $value= round(($count_bal*100)/($count_bal+$count_ord));
        $value2  = round(($count_ord*100)/($count_bal+$count_ord));
       //echo "";

             $total_price= "SELECT SUM(price) as amount FROM booking WHERE seat_type = 'ordinary'
         AND 
         showdate ='". $_POST['showd']."'
        ";

        $res_mon = mysqli_query($db,$total_price);

        if($col = mysqli_fetch_assoc($res_mon)){
          $price = $col['amount'];
        }
        $price_ord= "SELECT SUM(price) as mon FROM booking WHERE seat_type = 'balcony'
         AND 
         showdate ='". $_POST['showd']."'
        ";

        $res_mon = mysqli_query($db,$price_ord);
         $price_bal = "";
        if($col = mysqli_fetch_assoc($res_mon)){
          $price_bal = $col['mon'];
        }
          
          $price = $price+$price_bal;


       echo  '<script type="text/javascript">alert("NUMBER OF BALCONY SEATS BOOKED: '.$count_bal.' \n NUMBER OF ORDINARY SEATS BOOKED: '.$count_ord.'\n Total Money Collected:'.$price.'");</script>';

  //      echo  '<br><div class="breadcrumb"><div style="background-color : #dde2de;border-radius:10px;
  // border: 1px solid #191e1a; padding:10px; margin-bottom:10px;"><p>PERCENTAGE OF BALCONY SEATS BOOKED: '.$value.'</p></div>';

       
  //      echo  '<div class="breadcrumb"><div style="background-color : #dde2de;border-radius:10px;
  // border: 1px solid #191e1a; padding:10px; margin-bottom:10px;"><p>PERCENTAGE OF ORDINARY SEATS BOOKED: '.$value2.'</p></div>';


         if(!$res_ord){
                printf("Error: %s\n", mysqli_error($db));
        }




  //        echo  '<div class="col-md-3"><div style="background-color : #dde2de;border-radius:10px;
  // border: 1px solid #191e1a; padding:5px; margin-bottom:5px;"><p>Total Money Collected: '.$price.'</p></div>';

  



  }

?>