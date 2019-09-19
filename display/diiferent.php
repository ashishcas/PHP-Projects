
<?php 

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'search');

			$sql = "SELECT * FROM transaction ";
              $query = mysqli_query($db, $sql);
			  
			  	

     if (!$query ) {
	     die ('SQL Error: ' . mysqli_error($db));
         }	
		 
	if(isset($_POST['update_price']))
	{
	      		$id = mysqli_real_escape_string($db, $_POST['userid']);
		$sla = mysqli_real_escape_string($db, $_POST['usla']);
		$price = mysqli_real_escape_string($db, $_POST['price']);

        	if (empty($id)) { array_push($errors, "Userid is required"); }
		if (empty($sla)) { array_push($errors, "sla is required"); }
		if (empty($price)) { array_push($errors, "Price is required"); }
		
		
			if (count($errors) == 0) {
			$upd = "UPDATE transaction SET sla='$sla' AND price = '$price' WHERE transid= '$id'";
			
			   $red = mysqli_query($db,$upd);
			   
		if($red)
		{
			echo "SUCCESS";
		}
		
	   }
		
	}

 ?>


<!DOCTYPE HTML>
<html>
<title> inserting data </title>
<head></head>
<style>

button{
			background-color: 	#FFE4C4; /* Green */
    border: none;
    color: white;
    padding: 2px 2px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 8px;
	}


</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<body>

 <!-- <div data-role="main" class="ui-content">
<form action = "diiferent.php" method = "post" >
     
	 <label for = "inp">INSERT text </label>
	  <input type = "range" name = "inp" min = "100" max = "500" data-show-value = "true"> 
       <button type = "submit" name = "sub" class = "btn" data-inline="true">
	     <p>insert</p>
		</button>-->

		
		<form  method ="post" action ="diiferent.php">
	
	
	
	<div align= "center">
	
	<label>SELECT TRANSACTIONID</label>
	<input type = "text" name = "userid" ></input>	
	    
		<h2>ALLOT SLA</h2>
	     <div >
	    <select name = 'usla'>
		<option value="basic">basic</option>
		<option value="standard">standard</option>
		<option value="premium">premium</option>
		
		</select>
	     </div>
	
	<h2>ALLOT PRICE</h2>
	<span align = "center"></span><input type="text" style="width:265px; height:30px;" name="price"><br>
	 <div class="space-top text-center">
			 <button type = "submit" class="waves-effect waves-light btn " name="update_price" style = "color:blue;">
               <i class="material-icons left">SUBMIT</i> 
              </div>
			  </button>
	
	</div>
	</form>	
		
		
</body>
</html>
		 

