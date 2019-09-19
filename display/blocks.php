<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

			$sql = "SELECT username FROM partner ";
			$sqlt = "SELECT username FROM provider ";
             $query = mysqli_query($db, $sql);
			  $queryt = mysqli_query($db, $sqlt);

     if (!$query ) {
	     die ('SQL Error: ' . mysqli_error($conn));
         }	

?>

<html>
<head>
	<title>Displaying Users</title>
	<style type="text/css">
	.button {
    position: relative;
    background-color: #4CAF50;
    border: none;
    font-size: 28px;
    color: #FFFFFF;
    padding: 20px;
    width: 300px;
	height : 300px;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.button:after {
    content: "";
    background: #90EE90;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
}

	    body{
			text-align:center;
			
		}
		
		table{
			margin:auto;
			width : 200px;
			height : 200px;
			background : white;
			font-size : 30px;
		}
		th, td , tr{
    padding: 25px;
}



	</style>
</head>
<body>
            <table>
		<?php
		$no 	= 1;
		//while ($row = mysqli_fetch_array($query,MYSQLI_NUM))
		
        $lim = mysqli_num_rows($query);	
		
		for($i = 1 ;$i<=$lim ;$i++)
		{
			$row = mysqli_fetch_array($query);
			$next = mysqli_fetch_array($queryt);
			
			// $pass = AES DECRYPT($row['password']);				
			echo '<tr>
		
 					<button class = "button" onclick= window.open("showquestions.php");>'.$row['username'].'</button>
					<h>    </h>
	
				</tr>';
			
				if( $i%3 == 0)
				{
					echo '<br> </br>';
				}

		}
			
		?>
			
			</table>
	
</body>
</html>