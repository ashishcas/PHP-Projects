 <?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "sams");  
 $output = '';  
 if(isset($_POST["showdate"]))  
 {  
      if($_POST["showdate"] != '')  
      {  
           $sql = "SELECT * FROM show_details WHERE showdate = '".$_POST["showdate"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM show_details";  
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:5px; margin-bottom:5px;"><p>Show Number'.$row['sno'].'</p><p>no of ordinary seats</p>'.$row["no_ordinary_seats"].'<p>price'.$row['price_ordinary'].'<p>no of balcony seats : </p>'.$row["no_balcony_seats"].'<p>Price : '.$row['price_balcony'].'</p></div><br>';  
      }  
      echo $output;  
 }  
 ?>  