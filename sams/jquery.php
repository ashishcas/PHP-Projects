<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jquery.js">
	</script>
	<script type="text/javascript">


		window.onload = function(){
           //alert('Window Loaded')
		};

	   $(document).ready(function(){
               function loaddata()
     {
 var name=document.getElementById( "username" );
	
 if(name)
 {
  $.ajax({
  type: 'post',
  url: 'loaddata.php',
  data: {
   user_name:name,
  },
  success: function (response) {
   // We get the element having id of display_info and put the response inside it
   $( '#display_info' ).html(response);
  }
  });
 }
	
 else
 {
  $( '#display_info' ).html("Please Enter Some Words");
 }
}

		});
	  
	</script>
</head>
<body>
<div id = "mycontent">
	Jquery is enabled
</div>

<div id="display_info" >
	<input type="text" name="username" id="username" onkeyup="loaddata();">
	
</div>

</body>
</html>