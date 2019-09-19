
<?php

  session_start();
date_default_timezone_set('Asia/Calcutta'); 
$_SESSION['refund'] = "";


 
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
                   echo  " <br>".  $amount  . "<br>"; 
               }  
            else if (($days == '3' || $days == '2' || $days == '1' ) && $seat_type == 'balcony')  {
                $amount = $amount-15;
                   echo  " <br>".  $amount  . "<br>"; 
               }else if($days == '0'){

                $amount = $amount*0.5;
               }else{
                $amount = $amount-5;
                   echo  " <br>".  $amount  . "<br>"; 

               }     


               $_SESSION['refund'] = $amount;

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


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class = "table-responsive">
                    <table class = "table">
                      <thead><tr>
                        <th>Show Date</th>
                        <th>Ticket Id</th>
                        <th>Show number</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Seat Type</th>
                      </tr></thead>
                      <tbody>
                        <?php 
                        while($row = mysqli_fetch_array($res)){
                          echo '<tr>
          <td>'.$row['showdate'].'</td>
          <td>'.$row['ticketid'].'</td>
          <td>'.$row['sno'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['price'].'</td>
          <td>'.$row['seat_type'].'</td>     
           </tr>';
                        }?>
                      </tbody>
                    </table>
                  </div>
          </div> 
                       <form method = "post" action="result.php">
       <div class="breadcrumb">
        <label>Enter Show Date</label>
         <input class="form-control" type = "date" name = "showd" placeholder="Enter Show Date">
       </div>
         <div class="breadcrumb">
         <label>Enter Ticket id</label>
         <input class="form-control" type = "text" name = "ticketid" placeholder="Enter Ticket id">
       </div>
       <div class="breadcrumb">
         <label>Enter Name </label>
         <input class="form-control" type = "text" name = "name" placeholder="Enter Name On ticket">
       </div>
       <div class="btn btn-primary btn-block">
            <button class="btn btn-primary btn-block" name ="cancel">
              SUBMIT
            </button>
          </div>
     </form>
           </div>  
        </div>
      </div>

      <script type="text/javascript">
    $(document).ready(function(){
        $("button").click(function(){

            $.ajax({
                type: 'POST',
                url: 'testing34.php',
                success: function(data) {
                    alert(data);
                    $("p").text(data);

                }
            });
   });
});

</script>
    
</body>
</html>