
<?php

 // session_start();
date_default_timezone_set('Asia/Calcutta'); 

 
  $errors = array(); 
  // connect to database
  $results = array();
  $db = mysqli_connect('localhost', 'root', '', 'sams');
  $sql = "SELECT * FROM booking";
  
  $res = mysqli_query($db,$sql);
   $connect = mysqli_connect("localhost", "root", "", "sams"); 

//          if(isset($_POST['cancel']))
//       {

//            $dateofshow = mysqli_escape_string($db,$_POST['showd']);
//            $name = mysqli_escape_string($db,$_POST['name']);
//            $ticketid = mysqli_escape_string($db,$_POST['ticketid']);

     
//         $sqlprice = "SELECT * FROM  where name = $name AND ticketid = $ticketid and showdate = '". $_POST['showd']."'";
//           $today = date("Y-m-d");
//           echo $today;
//           // $sql = "SELECT * FROM users where username = '$uname' and class = '$class'";
//               $resprice = mysqli_query($db,$sqlprice);

//                             if(!$res)
//               {
//         //          echo "<script language=\"JavaScript\">\n";
//         // echo "alert('Show details not updated');\n";
//         // echo "window.location='cancel_ticket.php'";
//         // echo "</script>"; 
//       }
//       else
//       {
//         echo "<script language=\"JavaScript\">\n";
//         echo "alert($today);\n";
//         echo "window.location='cancel_ticket.php'";
//         echo "</script>"; 


//       }

//         }
//       else
//       {
//         echo "data input failed";
//       }
 

 $errors = array(); 
  // connect to database
  $results = array();
  $db = mysqli_connect('localhost', 'root', '', 'sams');
  $now = date('Y-m-d');
  $sql = "SELECT * FROM booking WHERE showdate >= '$now'";


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
                   // echo  " <br>".  $amount  . "<br>"; 
               }  
            else if (($days == '3' || $days == '2' || $days == '1' ) && $seat_type == 'balcony')  {
                $amount = $amount-15;
                   // echo  " <br>".  $amount  . "<br>"; 
               }else if($days == '0'){

                $amount = $amount*0.5;
               }else{
                $amount = $amount-5;
                 

               }     


               $_SESSION['refund'] = $amount;


                $delete_query = "DELETE FROM booking WHERE ticketid = '$ticket' AND name = '$name'
         AND 
         showdate ='". $_POST['showd']."'
        ";

        if(mysqli_query($db,$delete_query)){
          echo '<script type="text/javascript">alert("Ticket Cancelled Successfully:  \n Refunded money : '.$amount.'");</script>';
        }

        if(!$resprice)
              {
                 echo "<script language=\"JavaScript\">\n";
         echo "alert('Show details not updated');\n";
        echo "window.location='cancel_ticket.php'";
         echo "</script>"; 
      }
      else
      {
        echo "success";

      }

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
          <a class="nav-link" href="book_ticket">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Book Ticket</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="check_availability.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Check Availability</span>
          </a>
        </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link" href="cancel_ticket.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Cancel Ticket</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="Print_ticket.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Print Ticket</span>
          </a>
        </li>
                      </ul>
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
      <ol>
        
      </ol>
                    </a>
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
                       <form method = "post" action="cancel_ticket.php">
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
          <small></small>
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
  </div>
</body>

</html>
