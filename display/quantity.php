<?php

    include('quanser.php');
   
	

?>
<!DOCTYPE html>
<head></head>
<body>


<form action = "quantity.php" method = "post">
<div class="input-field col s6" align = "center"> 
     
              <label >Answer</label>
			    	  <input type="number" name="quantity" min="1" max="5" value="<?php echo $quantity ?>">
            </div>
			 <button type = "submit" class="waves-effect waves-light btn " name="user">
               <i class="material-icons left">done</i> Done
              </div>
			  </button>
		
				
</form>
</body>
<html>
			
			<?php
			

			?>
			
			