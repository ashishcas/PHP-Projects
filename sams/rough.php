
<?php

 session_start();
 
  $errors = array(); 
  // connect to database
  $results = array();
  $db = mysqli_connect('localhost', 'root', '', 'sams');
  $sql = "SELECT showdate FROM show_details";
  
  $res = mysqli_query($db,$sql);
  if($res){
     while($obj = mysqli_fetch_array($res)){
          $results[] = $obj['showdate'];
         echo $obj['showdate'];
     }
   }else{
    echo "error";
   }
  
?>