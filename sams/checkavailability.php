
<?php

 // session_start();
 
  $errors = array(); 
  // connect to database
  $results = array();
  $db = mysqli_connect('localhost', 'root', '', 'sams');
  $sql = "SELECT * FROM show_details";
  
  $res = mysqli_query($db,$sql);
  // if($res){
  //    while($obj = mysqli_fetch_array($res)){
  //           $results[] = $obj['showdate'];
  //        echo $obj['showdate'];
  //        echo $obj['start_at'];
  //        echo $obj['end_at'];

  //    }
  //  }else{
  //   echo "error";
  //  }
   $connect = mysqli_connect("localhost", "root", "", "sams");  
 $sdate = '';
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM show_details";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["showdate"].'">'.$row["showdate"].'</option>';  
           $sdate = $row["showdate"];
      }  
      return $output;  
 }  
 function fill_product($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM show_details";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           // $output .= '<div class="col-md-3">';  
           // $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["start_at"].'';  
           // $output .=     '</div>';  
           // $output .=     '</div>';  
         $output .= '<option value="'.$row["start_at"].'">'.$row["start_at"].'</option>';
      }  
      return $output;  
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
  <title>SHOWMANAGER HOMEPAGE</title>
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
    <a class="navbar-brand" href="homepage.php">SHOWMANAGER HOMEPAGE</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="addsalesperson.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">ADD SALESPERSON</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="update_show.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Update Show</span>
          </a>
        </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Navbar</a>
            </li>
                      </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
          </ul>
        </li>
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="payment_status.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Payment status</span>
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
      <ol>
        
      </ol>
                    </a>
                    <div class = "table-responsive">
                    <table class = "table">
                      <thead><tr>
                        <th>Show Date</th>
                        <th>Show Number</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                      </tr></thead>
                      <tbody>
                        <?php 
                        while($row = mysqli_fetch_array($res)){
                          echo '<tr>
          <td>'.$row['showdate'].'</td>
          <td>'.$row['sno'].'</td>
          <td>'.$row['start_at'].'</td>
          <td>'.$row['end_at'].'</td>       
           </tr>';
                        }?>
                      </tbody>
                    </table>
                  </div>
          </div>
           <div class="container">  
                  
                   <select name="brand" id="brand">  
                          <option value="">Select Show Date</option>  
                          <?php echo fill_brand($connect); ?>  
                     </select>   
                     <br /><br />  
                       <form method = "post" action="update_show.php">
       <div class="breadcrumb">
        <label>Enter Show Date</label>
         <input class="form-control" type = "date" name = "showd" placeholder="Enter Show Date">
         <label>Enter Show Number</label>
         <input class="form-control" type = "number" name = "shown" placeholder="Enter Show Number">
         <label>Enter Seat Type</label>
         <input class="form-control" type = "number" name = "text" placeholder="Enter Show Number">
       </div>
     </form>

                     <div class="row" id="show_product">  
                      <select name=showtime id="brand">  
                          
                     </div>  


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
              <div class="card-footer small text-muted">Posted 32 mins ago</div>
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
       $(document).ready(function(){  
      $('#brand').change(function(){  
           var showdate = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{showdate:showdate},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
    </script>
  </div>
</body>

</html>
