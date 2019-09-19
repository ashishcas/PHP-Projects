<?php include('idate.php') ?>
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
	
	<form method="post" action="dateinsert.php">

		<?php include('errors.php'); ?>

		
		<div class="dateb">
		<label>Date</label>
			<input type = "date" name = "dbdate" value = "<?php echo $dbdate ; ?>">   
		</div>

        <div class="datec">
		<label>Date</label>
			<input type = "date" name = "bdate" value = "<?php echo $bdate ; ?>">   
		</div>
		 
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		
	</form>
</body>
</html>