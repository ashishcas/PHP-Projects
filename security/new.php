
<?php include('servercustomer.php'); ?>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'search'; // Database Name

$a = '';
$b = '';
$c = '';
$d = '';
$e = '';
$uname = $_SESSION['username'];


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = "SELECT  *
		FROM  users where username = '$uname'";


if($res = mysqli_prepare($conn,"SELECT * FROM users where username = ?"))
  {
    mysqli_stmt_bind_param($res,"s",$name);
    mysqli_stmt_execute($res);
    $res->bind_result($a,$b,$c,$d,$e);
    //$row =  mysqli_stmt_fetch($res);
  // mysqli_stmt_close($res);
  }



?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Profile page</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">

  
</head>
<style>

h1{
	color : 	#FFF8DC;
	font-style: italic;
}
</style>

<body>
  <form >
       <body ng-controller="RegisterCtrl" >
 <div class="container">
   <div id="signup">
      <div class="signup-screen">
         <div class="space-bot text-center">
            <h1>PROFILE PAGE</h1>
           <div class="divider"></div>
         </div>
           <form class="register" >
	            <div class="input-field col s6">
              
              <label >Name</label>
			    	  <?php
					  
			    echo '<h1>'.$a.'</h1>';
		          
					  ?>
            </div>

             <div class="input-field col s6">
              
              <label>Email</label>
			  <?php
				
			    echo '<h1>'.$b.'</h1>';
		         
					  ?>
             </div>           
			  <div class="input-field col s6">
              
              <label>PHONE</label>
			  <?php

			    echo '<h1>'.$c.'</h1>';
		          
					  ?>
             </div> 

		</div>
              </div>
             </form>
           </div>
        </div>
    </div>
	</form>
</body>
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
