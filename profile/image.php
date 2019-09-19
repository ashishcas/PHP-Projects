<?php
$db = mysqli_connect("localhost","root","","registration");
//mmysql_connect("localhost","root","");
if(isset($_POST["submit"])){
$filename = addslashes($_FILES['img']['name']);
$tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$filetype = addslashes($_FILES['img']['type']);
$filesize = addslashes($_FILES['img']['size']);
$array = array('jpg','jpeg');
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!empty($filename)){
if(in_array($ext, $array)){
 mysqli_query($db,"Insert into upload(name,image) values('$filename','$tmpname')");
}
else{
echo "failed";
}
}
}

//display
$res = mysqli_query($db,"SELECT * FROM upload");
while($row = mysqli_fetch_array($res)){
$displ = $row['image'];

// please place the&#160;


echo '<img src="data:image/jpeg;base64,&#39;.base64_encode($displ).&#39;" />';
echo "<br />";
}

?>






<html>
<title> INSERT IMAGE </title>
<head></head>
<body>
<form action="#" enctype="multipart/form-data" method="post">
<input name="img" type="file" />
<input name="submit" type="submit" />
</form>
</body>
<html>