
<?php 
  
	session_start();
    
	$expireAfter = 30;
	
	// variable declaration
	$yes= "";
	$no    = "";
	$anso  = "";
	$anst   = "";
	$area   = "";
	$from_date   = "";
	$to_date = "";
	$quantity = "";
	$points = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'search');
	//$conn = mysqli_connect('localhost', 'root', '', 'expertsdb');
	
	if($db)
	{
		echo "error";
	}
   
$query = "INSERT INTO answer (anso, anst, area,from , to , quantity, points) VALUES
               ('asd', 'asd', 'asdfd','2018-10-10','2019-05-09',20,30)";
	
			$results = mysqli_query($db, $query);
			
			
			if($results)
			{
				echo "failed";
			}
		

	if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;
    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
		
		 echo "SESSION EXPIRED";
		// header('location: indexsearch.php');
        session_unset();
        session_destroy();
    }
    
}
 
//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();

	// ... 

	// LOGIN USER
/*	if (isset($_POST['ans'])) {
		$anso = mysqli_real_escape_string($db, $_POST['anso']);
		$anst = mysqli_real_escape_string($db, $_POST['anst']);
		$area = mysqli_real_escape_string($db, $_POST['area']);
		$quantity = mysqli_real_escape_string($db, $_POST['quantity']);
		$points = mysqli_real_escape_string($db, $_POST['points']);
		$from_date = mysqli_real_escape_string($db, $_POST['from_date']);
		$to_date = mysqli_real_escape_string($db, $_POST['to_date']);

		if (empty($anso)) {
			array_push($errors, "first answer");
		}
		if (empty($anst)) {
			array_push($errors, "second answer");
		}
		
		if (empty($area)) {
			array_push($errors, "text area answer");
		}
		if (empty($quantity)) {
			array_push($errors, "Quantity is to answered");
		}
		if (empty($points)) {
			array_push($errors, "points required");
		}
*/

		  /*$ch = "";
		 if(empty($yes)
		 {
			$ch = $yes; 
		 }
		 else
		 {
			 $ch = $no;
		 }*/

	
				//$query = "INSERT INTO answer (anso, anst, area,from , to , quantity, points)  VALUES('asd', 'asd', 'asdfd','2014-10-10','2014-10-10','20','30')";
				// VALUES('$anso', '$anst', '$area','$from_date','$to_date','$quantity','$points');
			//$results = mysqli_query($db, $query);
		

	

?>