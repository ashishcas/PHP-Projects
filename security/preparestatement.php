<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


	$name = 'ashish';

 	if($res = mysqli_prepare($db,"SELECT email FROM users where username = ?"))
	{
		mysqli_stmt_bind_param($res,"s",$name);
		mysqli_stmt_execute($res);
		mysqli_stmt_bind_result($res, $district);
		mysqli_stmt_fetch($res);
		$some = $district;

		echo $some;

    /* close statement */
    mysqli_stmt_close($res);
	}

	mysqli_close($db);
?>