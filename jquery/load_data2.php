 <?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "sams");  
 $output = '';  
 if(isset($_POST["display"]))  
 {    
           $sql = "SELECT * FROM show_details WHERE  start_at = '".$_POST["time"]."' AND showdate = '".$_POST["showdate"]."'";  
        
  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<p>no of balcony seats</p> <div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["no_ordinary_seats"].'</div></div>';  
      }  
      echo $output;  
 }  
 ?>  