<?php

 // session_start();
date_default_timezone_set('Asia/Calcutta'); 

 
  $errors = array(); 
  // connect to database
  $results = array();
  $db = mysqli_connect('localhost', 'root', '', 'sams');
  $sql = "SELECT * FROM booking";


  function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 
  
  $res = mysqli_query($db,$sql);
   $connect = mysqli_connect("localhost", "root", "", "sams"); 

         if(isset($_POST['cancel']))
      {

           $dateofshow = mysqli_escape_string($db,$_POST['showd']);
           $name = mysqli_escape_string($db,$_POST['name']);
           $ticket = mysqli_escape_string($db,$_POST['ticketid']);

     
        $sqlprice = "SELECT * FROM booking WHERE ticketid = '$ticket' AND name = '$name'
         AND 
         showdate ='". $_POST['showd']."'
        ";
          $today = date("Y-m-d");
          echo $today;

          $days = dateDiffInDays($today,$_POST['showd']);
          echo $days;
          // $sql = "SELECT * FROM users where username = '$uname' and class = '$class'";
              $resprice = mysqli_query($db,$sqlprice);
              
              if(!$resprice){
                printf("Error: %s\n", mysqli_error($db));
              }
           
           $amount = "";
           $seat_type = "";

              if($refund = mysqli_fetch_array($resprice)){
                echo $refund['price'];
                 $amount  = $refund['price'];
                 $seat_type = $refund['seat_type'];
              }



              if (($days == '3' || $days == '2' || $days == '1') && $seat_type == 'ordinary')  {
                $amount = $amount-10;
                   $output =  "<div><p>refunded money is <p> <br>".  $amount  . "<br></div>"; 
               }  
            else if (($days == '3' || $days == '2' || $days == '1' ) && $seat_type == 'balcony')  {
                $amount = $amount-15;
                   $output =  "<div><p>refunded money is <p> <br>".  $amount  . "<br></div>"; 
               }else if($days == '0'){

                $amount = $amount*0.5;
               }else{
                $amount = $amount-5;
                   $output = "<div><p>refunded money is <p> <br>".  $amount  . "<br></div>" ; 

               }     

               return $output;

        if(!$res)
              {
        //          echo "<script language=\"JavaScript\">\n";
        // echo "alert('Show details not updated');\n";
        // echo "window.location='cancel_ticket.php'";
        // echo "</script>"; 
      }
      else
      {
        echo "success";

      }

        }
 
?>