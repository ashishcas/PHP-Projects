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

    //generating
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SALESPERSON HOMEPAGE</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="salespersonhomepage.php">SALESPERSON HOMEPAGE</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="bookticket.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">BOOK TICKET</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="check_availability.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Check Availability</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="Print_ticket.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Print Ticket</span>
          </a>
        </li>
                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link" href="cancel_ticket.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Cancel Ticket</span>
          </a>
        </li>
         
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
         
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
       <form method = "post" action="book_ticket.php">
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
              </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="card mb-3">
      
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <!-- Card Columns Example Social Feed-->
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted"></div>
            </div>
            <!-- Example Social Card-->

            <!-- Example Social Card-->
            
            <!-- Example Social Card-->
          
          <!-- /Card Columns-->
        
             
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Ashish Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
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
  </div>
</body>

</html>
