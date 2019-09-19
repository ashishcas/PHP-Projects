<?php


?> 
<html>

<head>
<title>data</title>
</head>
<body>
<table width="600" border="1" cellpadding="1">
<tr>
<th>username</th>
<th>email</th>

</tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr>";
        
		echo "<td>" . $row["username"]. " </td>";
		echo "<td>".$row["email"]. "</td>";
		echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
 
</body>
</html>
