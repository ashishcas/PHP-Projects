<?php
$json_value = <some json source>;
$array = json_decode($json_value,true);
require_once 'db.php';
foreach($array as $item) {
$insert_value = "INSERT INTO users (name, phone, city,email)VALUES
('".$item['name']."', '".$item['phone']."', '".$item['city']."', '".$item['email']."')");
if ($con->query($insert_value ) === TRUE) {
echo "Record added Successfully<br>";
}
else
{
echo "Error: " . $insert_value . "<br>" . $con->error;
}
}
?>