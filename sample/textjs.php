<!DOCTYPE HTML>
<html>
<title>SHARIEF FIRST PAGE</title>
<head>First PAge</head>
<script src = "js/jquery.js"></script>
<script src = "js/FileSaver.js"></script>


<style>
  h1{
  	color : yellow;
  	background-color: red;
  }


</style>


 <body>

 <button id = "save-btn">text File</button>
 <script type="text/javascript">
 	$("#save-btn").click(function() { 
   var blob = new Blob(["This is my first text."], {type: "text/plain;charset=utf-8"});
   saveAs(blob, "testfile1.txt");
});
 </script>

 </body>
 </html>