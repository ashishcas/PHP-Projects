
<?php include('servercustomerfinal.php') ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Registration form for </title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <form method="post" action="registerconsumer.php">
  	<?php include('errors.php'); ?>
       <body ng-controller="RegisterCtrl" >
 <div class="container">
   <div id="signup">
      <div class="signup-screen">
         <div class="space-bot text-center">
            <h1>Sign up</h1>
           <div class="divider"></div>
         </div>
           <form class="register" method="post" action="registerconsumer.php" >
	            <div class="input-field col s6">
              
              <label >User Name</label>
			    	  <input type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="input-field col s6">
              <label > Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
			  
             </div>
             <div class="input-field col s6">
              
              <label>Email</label>
			    <input type="email" name="email" value="<?php echo $email; ?>">
             </div>
			 <div class="input-field col s6">
              
              <label>Phone</label>
			    <input type="tel" name="phone" value="<?php echo $phone; ?>">
             </div>
             <div class="input-field col s6">
               <label>Password</label>
			   <input type="password" name="password_1">
              </div>
			  <div class="input-field col s6">
               <label>Re-enter Password</label>
			   <input type="password" name="password_2">
              </div>
     
              <div class="space-top text-center">
			 <button type = "submit" class="waves-effect waves-light btn " name="reg_user">
               Done
               </button>
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
