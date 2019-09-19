<?php
session_start();
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
         echo '<br>'.$tot.'</br>';
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
     	echo '<br>'. $cnt*100 .'</br>';
       }
     }

  }


//Code to caluclate the percentage of balcony and ordinary seats booked
  if(isset($_POST['percentage'])){


  	echo $_POST['showd'];
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
            echo 'hel<br>'.$count_bal.'<br>';
       }

       if(!$res_bal){
                printf("Error: %s\n", mysqli_error($db));
        }
  
        $res_ord = mysqli_query($db,$ordinary_seats);
        if($col  = mysqli_fetch_assoc($res_ord)){
            $count_ord = $col['ord'];
            echo "<br>".$count_ord."<br>";
       }

       echo "";
       echo  '<div class="col-md-3"><div style="background-color : #99FFCC;border-radius:10px;
	border: 1px solid #008000; padding:5px; margin-bottom:5px;"><p>PERCENTAGE OF BALCONY'.($count_bal*100)/($count_bal+$count_ord).'</p></div>';

       
         if(!$res_ord){
                printf("Error: %s\n", mysqli_error($db));
        }


     $total_price= "SELECT SUM(price) as amount FROM booking WHERE seat_type = 'ordinary'
         AND 
         showdate ='". $_POST['showd']."'
        ";

        $res_mon = mysqli_query($db,$total_price);

        if($col = mysqli_fetch_assoc($res_mon)){
        	$price = $col['amount'];
        }

         echo  '<div class="col-md-3"><div style="background-color : #99FFCC;border-radius:10px;
	border: 1px solid #008000; padding:5px; margin-bottom:5px;"><p>Money Collected'.$price.'</p></div>';


  }

?>
<!-- 
<?php echo show_percentage();?> -->


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post" action="testing4.php">
		<div class="breadcrumb">
        <label>Enter Show Date</label>
         <input class="form-control" type = "date" name = "showd" placeholder="Enter Show Date">
       </div>
        <div class="btn btn-primary btn-block">
            <button class="btn btn-primary btn-block" name ="percentage">
              SUBMIT
            </button>
          </div>
		
	</form>

</body>
</html>