<?php   
 //load_data_select.php  
 $connect = mysqli_connect("localhost", "root", "", "sams");  
 $sdate = '';
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM show_details";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["showdate"].'">'.$row["showdate"].'</option>';  
           $sdate = $row["showdate"];
      }  
      return $output;  
 }  
 function fill_product($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM show_details";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           // $output .= '<div class="col-md-3">';  
           // $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["start_at"].'';  
           // $output .=     '</div>';  
           // $output .=     '</div>';  
         $output .= '<option value="'.$row["start_at"].'">'.$row["start_at"].'</option>';
      }  
      return $output;  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Multiple Image Upload</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3>  
                     <select name="brand" id="brand">  
                          <option value="">Show All Product</option>  
                          <?php echo fill_brand($connect); ?>  
                     </select>  
                     <br /><br />   
                     <option value="">Show Start Timings</option>   
                     <select name="time" id="time">
                          <?php echo fill_product($connect);?>  
                     </select>   
                     <li><input type="submit" id = "check_availability" name="submit" value = "check"></li>
                     
                </h3>  
           </div>  

           <div id = "display_area">
             
           </div>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
         
         $("#check_availability").click(function(){
             var showdate = $("#brand").val();
             var time = $("#time").val();
             $.ajax({  

                url:"load_data2.php",  
                type:"POST",  
                data:{
                  done : 1,
                  showdate:showdate,
                       time:time},  
                success:function(data){  
                  display();
                     $('#show_product').html(data);  
                } 
         });
      });
 });  

  function display(){
    $.ajax({
        url:"load_data2.php",  
                type:"POST", 
                async :false, 
                data:{
                  display : 1,
                  showdate:showdate,
                       time:time},  
                success:function(data){  
                     $('#display_area').html(data);  
                } 
    });
  }
 </script>  