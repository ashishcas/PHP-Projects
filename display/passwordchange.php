<?php 

 ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">
<style >
 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
</style>
  
</head>

<body>
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
       <body ng-controller="RegisterCtrl" ng-app="myApp">
 <div class="container">
   <div id="signup">
      <div class="signup-screen">
         <div class="space-bot text-center">
            <h1>CHANGE PASSWORD</h1>
           <div class="divider"></div>
         </div>
           <form class="form-register" method="post" name="register" action = "passwordchange.php">
	            <div class="input-field col s6"> 
     
              <label >OLD PASSWORD</label>
			    	  <input type="password" name="oldpassword" value="<?php echo $oldpassword; ?>">
            </div>
			  <div class="input-field col s6">
               <label>Enter Password</label>
			   <input type="password" name="password">
              </div>
     
              <div class="space-top text-center">
			 <button type = "submit" class="waves-effect waves-light btn " name="login_user">
               <i class="material-icons left">done</i> Done
              </div>
			  </button>
      			  </br>
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
