<?php 

   $var = 'first<script>alert(1);</script>';
   
function escape($string)
{
	
	return  htmlspecialchars($string,ENT_QUOTES,'UTF-8');
}


?>


<!DOCTYPE html>
<html lang = "en">
     <head>
	      <meta charset = "UTF-8">
		  <title>WEBSITE ESCAPE </title>
	 </head>
	 <body>
	  
	    <p>heloo <?php  echo escape($var); ?></p>
	 </body>
</html>
	  
