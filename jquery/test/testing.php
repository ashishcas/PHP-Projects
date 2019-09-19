<?php

session_start();
date_default_timezone_set('Asia/Calcutta'); 

 $salesid = $_SESSION['userid'];
 $sdate = " ";
 $sno = " ";
 $stype = " ";
 $query = "";
 
 echo $salesid;

 if(!$salesid)
 {
  header('location: salespersonlogin.php');
 }
 $conn =  mysqli_connect('localhost', 'root', '', 'sams');
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM show_details";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["showdate"].'">'.$row["showdate"].'</option>';  
           $sdate = $row["showdate"];
      }  
      return $output;  
 }  

 
   if(isset($_POST["check"])) {

      echo "hellllooo";

     $showdate = date('Y-m-d',strtotime($_POST['showd']));
     $showdate = mysqli_real_escape_string($conn,$showdate);

     $sno = $_POST["shown"];
     //$sid = mysqli_real_escape_string($conn,$_POST["showid"]);
     $stype = $_POST["seat_type"];
     $now = Date("Y-m-d");
     $ticketid = "NITR".rand(1000,9999);
      $itemValues=0;
      $queryValue = "";
      echo $showdate;
      echo $sno;
     // echo $sid;

    $sdate = $showdate;

     // echo $stype;
     // echo $now;
     // echo $ticketid;

  // validating the show date and show number

     //$checkquery = "SELECT * FROM showdetails where sno = $sno and showid = '". $_POST['showid']."'";
    $checkquery = "SELECT * FROM showdetails where sno = $sno and showdate = '". $_POST['showd']."'";
     $checkresult = mysqli_query($conn,$checkquery);

     if($checkresult){

       echo "SHOW DETAILS ARE VALIDATED";


    $itemCount = count($_POST["item_name"]);
    echo $itemCount;
   
    $price = "";
      $row = mysqli_fetch_assoc($checkresult);
      echo "checking";
      printf ("%s (%s)\n",$row["showdate"],$row["showid"]);  //Getting the price of the seats 
     if(strcmp($stype,"balcony") == 0){

      $price = $row["price_balcony"];
     }else if(strcmp($stype,"ordinary") == 0){
      $price = $row["price_ordinary"];
     }
     echo ("price is ".$price);
     echo("--");
     

     
    

    $query = "INSERT INTO booking (salesid,ticketid, dob, name, seatno, seat_type, showdate, sno, price) VALUES ";
    $val1 = "";
    $val2 = "";
    for($i=0;$i<$itemCount;$i++) {
      if(!empty($_POST["item_name"][$i]) || !empty($_POST["item_price"][$i])) {
        $itemValues++;
        if($queryValue!="") {
          $queryValue .= ",";
        }
        $queryValue .= "('" . $salesid . "','" . $ticketid ."','" . $now . "','" . $_POST["item_name"][$i] . "', '" . $_POST["item_price"][$i] . "','" . $stype . "','" . $sdate . "','" . $sno . "',
        '" . $price . "')";
        $val1 = $_POST["item_name"][$i] ;
        $val2 = $_POST["item_price"][$i] ;
        echo $queryValue;
      }
    }
    
    $sql = $query.$queryValue;
    // $sql = "INSERT INTO item (id,item_name,item_price) VALUES(1,'as',5)";
    // echo $itemValues;
    // $result = mysqli_query($conn, $sql);
    //     if($result){
    //      echo "sucess";
    //     }

    echo $itemValues;
    if($itemValues!=0) {
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "sucess";
        }
      if(!empty($result)) $message = "Added Successfully.";
    }else{
      echo "failed";
    }
    }else{
      echo ("ERROR ".mysqli_error($conn));
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <SCRIPT src="http://code.jquery.com/jquery-2.1.1.js"></SCRIPT>

</head>
<body>
<form method = "post" action="testing.php">
       <div class="breadcrumb">
        <label>Enter Show Date</label>
         <input class="form-control" type = "date" name = "showd" placeholder="Enter Show Date">
     </div>
     <div class="breadcrumb">
         <label>Enter Show Number</label>
         <input class="form-control" type = "number" name = "shown" placeholder="Enter Show Number">
        </div>
        <div  class="custom-control custom-radio">
         <label>Enter Seat Type</label>
         <br>
              <input type="radio"  name="seat_type" value = "balcony">
              <label >BALCONY</label>
              <input  type="radio"  name="seat_type" value = "ordinary">
              <label >ORDINARY</label>
       </div>

       <DIV id="outer">
<DIV id="header" class = "breadcrumb">
<DIV class="float-left">&nbsp;</DIV>
<DIV class="float-left col-heading">Enter Name</DIV>
  <DIV class="float-left col-heading">Enter Seat Number</DIV>
<DIV id="product">
<?php require_once("input.php") ?>
</DIV>
</DIV>
<DIV class="btn-action float-clear">
<input type="button"  name="add_item" value="Add More" onClick="addMore();" />
<input type="button" name="del_item" value="Delete" onClick="deleteRow();" />
<span class="success"><?php if(isset($message)) { echo $message; }?></span>
</DIV>
<!-- <DIV class="footer">
<input type="submit" name="save" value="Save" />
</DIV> -->
</DIV>
       <div class="btn btn-primary btn-block">
            <button class="btn btn-primary btn-block" name ="check">
              SUBMIT
            </button>
          </div>
     </form>
     <script type="text/javascript">
      function addMore() {
  $("<DIV>").load("input.php", function() {
      $("#product").append($(this).html());
  }); 
}
function deleteRow() {
  $('DIV.product-item').each(function(index, item){
    jQuery(':checkbox', this).each(function () {
            if ($(this).is(':checked')) {
        $(item).remove();
            }
        });
  });
}

    </script>
</body>
</html>
