<<?php include('servercustomerfinal.php') ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login for constumer</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <form method="post" action="loginconstumer.php">
  	<?php include('errors.php'); ?>
       <body ng-controller="RegisterCtrl" ng-app="myApp">
 <div class="container">
   <div id="signup">
      <div class="signup-screen">
         <div class="space-bot text-center">
            <h1>Login</h1>
           <div class="divider"></div>
         </div>
           <form class="form-register" method="post" name="register" novalidate>
	            <div class="input-field col s6">
              
              <label for="first-name">User name</label>
			    	  <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
			  <div class="input-field col s6">
               <label>Re-enter Password</label>
			   <input type="password" name="password">
              </div>
     
              <div class="space-top text-center">
			 <button type = "submit" class="waves-effect waves-light btn " name="reg_user">
               <i class="material-icons left">done</i> Done
              </div>
			  </button>
			  <p>
			      login using otp  <a href="mobile.php">click here</a>
			  </p>
			  </br>
			  <p>
			      Sign up ? <a href="registerconsumer.php">click here</a>
			  </p>
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
