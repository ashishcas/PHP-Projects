<?php
$dir = "image/";
if(isset($_FILES['image'])){
    move_uploaded_file($_FILES["image"]["tmp_name"], $dir. $_FILES["image"]["name"]);
}
	

?>

<html>
<head>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>  
    <script type="text/javascript">
    	function uploadFile(){
  var input = document.getElementById("file");
  file = input.files[0];
  if(file != undefined){
    formData= new FormData();
    if(!!file.type.match(/image.*/)){
      formData.append("image", file);
      $.ajax({
        url: "upload.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            alert('success');
        }
      });
    }else{
      alert('Not a valid image!');
    }
  }else{
    alert('Input something!');
  }
}
    </script>  
</head>
<body>
    <input type="file" id="file" />
    <button onclick="uploadFile();">Upload</button>
</body>
</html>