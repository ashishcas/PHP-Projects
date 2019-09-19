<?php


  $dbdate = "";
  $bdate = "";
  
  $db = mysqli_connect('localhost', 'root', '', 'search');
  
  $errors = array(); 
	$_SESSION['success'] = "";
	
	
	if(isset($_POST['reg_user']))
	{
		
		$dbdate = mysqli_real_escape_string($db, $_POST['dbdate']);
		$bdate = mysqli_real_escape_string($db, $_POST['bdate']);
		
		
		$res = mysqli_query($db,"INSERT INTO test (fdate , sdate ) VALUES ('$dbdate','$bdate')");
		
		if(!$res)
		{
			echo "failed";
		}
		
	}
	
	?>