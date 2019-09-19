<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'search'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT  question
		FROM  questiontb';
		
$qry = mysqli_query($conn, $sql);

if (!$qry) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>

<?php include('answerserver.php')  ?>

<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	   <h1>QUESTIONS FOR CONSUMERS</h1>
<form method = "post" action = "showquestions.php">
<?php include('errors.php');?>

 <form action="showquestions.php" method = "post">	
  	
	   <?php
	     $total 	= 0;
		$lim = mysqli_num_rows($qry);	
		if($row = mysqli_fetch_array($qry,MYSQLI_NUM))
		{
			echo '<h1>'.$row[0].'</h1>';
		}
		?>
		<div  align = "center"> 
     
              <label >Answer</label>
			    	  <input type="text" name="anso" value="<?php echo $anso; ?>">
            </div>
			
		
	 <?php
	     $total 	= 0;
		$lim = mysqli_num_rows($qry);	
		if($row = mysqli_fetch_array($qry,MYSQLI_NUM))
		{
			echo '<h1>'.$row[0].'</h1>';
		}?>
		
		<div class="input-field col s6" align = "center"> 
     
              <label >Answer</label>
			    	  <input type="text" name="anst" value="<?php echo $anst; ?>">
            </div>
			
				 <?php
	     $total 	= 0;
		$lim = mysqli_num_rows($qry);	
		if($row = mysqli_fetch_array($qry,MYSQLI_NUM))
		{
			echo '<h1>'.$row[0].'</h1>';
		}?>
		
		<div class="input-field col s6" align = "center"> 
     
 
			    	  <input type="radio" name="yes" value="<?php echo $yes; ?>">YES
			        <input type="radio" name="no" value="<?php echo $no; ?>">NO
            </div>
		 <?php
	     $total 	= 0;
		$lim = mysqli_num_rows($qry);	
		if($row = mysqli_fetch_array($qry,MYSQLI_NUM))
		{
			echo '<h1>'.$row[0].'</h1>';
		}?>
		
		<div class="input-field col s6" align = "center"> 
     
              <label >Answer</label>
			    	 <input type = "text" name = "area" value="<?php echo $area; ?>" >  
            </div>
			
			
	 <?php
	     $total 	= 0;
		$lim = mysqli_num_rows($qry);	
		if($row = mysqli_fetch_array($qry,MYSQLI_NUM))
		{
			echo '<h1>'.$row[0].'</h1>';
		}?>
		
		<div class="fromd" align = "center"> 
     
              <label >FROMDATE</label>
  <input type="date" name="from_date"    value="<?php echo $from_date; ?>"><br>
                  <label> ToDATE </label>
  <input type="date" name="to_date"  value="<?php echo $to_date; ?>"><br>
            </div>
			
  		<?php
	     $total 	= 0;
		$lim = mysqli_num_rows($qry);	
		if($row = mysqli_fetch_array($qry,MYSQLI_NUM))
		{
			echo '<h1>'.$row[0].'</h1>';
		}?>
		
		<div class="input-field col s6" align = "center"> 
     
              <label >Answer</label>
			    	  <input type="number" name="quantity" value="<?php echo $quantity; ?>">
            </div>
			
	 <?php
	     $total 	= 0;
		$lim = mysqli_num_rows($qry);	
		if($row = mysqli_fetch_array($qry,MYSQLI_NUM))
		{
			echo '<h1>'.$row[0].'</h1>';
		}?>
		
		<div class="input-field col s6" align = "center"> 
     
              <label >Answer</label>
			    	  <input type="text" name="points" value="<?php echo $points; ?>">
            </div>
			              <div class="space-top text-center">
			 <button type = "submit" class=" btn " name="ans">
               <i class="material-icons left">SUBMIT</i>
              </div>
			  </button>
    </form>
	</form>
</body>

</html>