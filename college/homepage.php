<?php

 session_start();

 $name = $_SESSION['username'];

 if($name)
 {
  header('location: index.php');
 }

   echo $name;

 echo $_SESSION['username'];

 ?>