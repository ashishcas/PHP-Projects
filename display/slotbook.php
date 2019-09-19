<?php include('slotdb.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Parking slot booking</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>BOOK SLOT</h2>
	</div>
	
	<form method="post" action="slotdb.php">

		<?php include('errors.php'); ?>

		<div class="uname">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="email">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="dateb">
		<label>Date</label>
			<input type = "date" name = "dbdate" value = "<?php echo $dbdate ; ?>">
			
			   
		</div>
		<div class="time">
		<label>Time</label>
		<input id = "time" type = "time" name = "dbtime" value = "<?php echo $dbtime ; ?>">	   
		</div>
		
		 
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>