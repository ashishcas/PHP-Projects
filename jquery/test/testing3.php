
<?php

 session_start();
 date_default_timezone_set('Asia/Calcutta');
  $errors = array(); 
  // connect to database
  $results = array();
  $db = mysqli_connect('localhost', 'root', '', 'sams');
  $date = date("Y-m-d");
  $sql = "SELECT * FROM showdetails"; 
 $sdate = '';
   $seats = array();
   $resi= '';
 if (isset($_POST['seat'])) {
    // receive all input values from the form
    $showdate = mysqli_real_escape_string($db, $_POST['showd']);
    $showno = mysqli_real_escape_string($db, $_POST['shown']);
    $seatype = $_POST['seat_type'];
   
    // form validation: ensure that the form is correctly filled
    if (empty($showdate)) { array_push($errors, "ShowDate is required"); }
    if (empty($showno)) { array_push($errors, "Show Number is required"); }
    if (empty($seatype)) { array_push($errors, "Seat Type is required"); }

    

    // register user if there are no errors in the form
    echo $showdate."<br>";
    echo $seatype;
    echo $_POST['showd'];
    if (count($errors) == 0) {
      $query = "SELECT * FROM booking 
      WHERE sno = $showno
        AND showdate = '". $_POST['showd']."'
        ";
      $resi = mysqli_query($db, $query);
   
      if($resi){
        while($col = mysqli_fetch_array($resi)){
          $seats[] = $col['seatno'];
       }

          }else{
       	printf(mysqli_error($db));
       }

      }

  }

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
     <form method = "post" action="testing3.php">
       <div class="breadcrumb">
        <label>Enter Show Date</label>
         <input class="form-control" type = "date" name = "showd" placeholder="Enter Show Date">
         <label>Enter Show Number</label>
         <input class="form-control" type = "number" name = "shown" placeholder="Enter Show Number">
         <label>Enter Seat Type</label>
       </div>
         <div  class="custom-control custom-radio">
         <label>Enter Seat Type</label>
         <br>
              <input type="radio"  name="seat_type" value = "balcony">
              <label >BALCONY</label>
              <input  type="radio"  name="seat_type" value = "ordinary">
              <label >ORDINARY</label>
       </div>          <div class="btn btn-primary btn-block">
            <button class="btn btn-primary btn-block" name ="seat">
              SUBMIT
            </button>
          </div>

     </form>

     <?php
     foreach ($seats as $key) {
       echo $key;
     }

     ?>
</body>
</html>