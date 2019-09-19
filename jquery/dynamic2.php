</p>
<?php
?>

<html>
<head>
<title></title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
var counter = 0;
$(function(){
 $('p#add_field').click(function(){
 counter += 1;
 $('#container').append(
 '<strong>Hobby No. ' + counter + '</strong><br />'
 + '<input id="field_' + counter + '" name="dynfields[]' + '" type="text" /><br />' );

 });
});
</script>

<body>

<?php
if (isset($_POST['submit_val'])) {
if ($_POST['dynfields']) {
foreach ( $_POST['dynfields'] as $key=>$value ) {
// $values = mysqli_escape_string($value);
// $query = mysql_query("INSERT INTO my_hobbies (hobbies) VALUES ('$values')", $connection );

}
}

echo "<i><h2><strong>" . count($_POST['dynfields']) . "</strong> Hobbies Added</h2></i>";

 mysqli_close();
}
?>
<?php if (!isset($_POST['submit_val'])) { ?>
 <h1>Add your Hobbies</h1>
 <form method="post" action="dynamic2.php">

 <div id="container">
 <p id="add_field"><a href="#"><span>Click To Add Hobbies</span></a></p>
 </div>

 <input type="submit" name="submit_val[]" value="submit" />
 </form>
<?php } ?>

</body>
</html>