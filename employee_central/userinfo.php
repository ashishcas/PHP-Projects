<?php
     session_start();
     if(isset($_SESSION['uid']))
     {
        //  echo $_SESSION['uid']; don't
     }
     else
     {
     header('location: login.php');
     }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <style>
    .topnav{
    background-color:dimgray;
    overflow: hidden;
}
.topnav a{
    float: right;
     color:white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}
.topnav a.active {
     background-color: #4CAF50;
     color: white;

}
        button{
            padding:20px;
            margin-left:500px;
            margin-right:500px;
        }
        h1{
            margin-left:500px;
            margin-right:500px;
        }
    .myTable{
        margin:auto;
        border:1px solid darkgrey;
    }
    .myTable th,.myTable td{
        border:1px solid darkgrey;
    }
    th{
        font-weight:bold;
    }
        </style>
</head>
<body>
<div class="topnav">
                    <a class="active" href="logout.php">Logout</a>
                </div>
    <h1>Welcome to Employee Portal</h1>
    <table class="myTable">
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Employee Id</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Password</th>
    </tr>
    <?php
    include_once('dbconfig.php');
    $run=mysqli_query($con,"SELECT * FROM user_info where id={$_SESSION['uid']}");
    if(mysqli_num_rows($run)!==1){
        //invalid login
        session_destroy();
        header('location: login.php');
    }else{
        $row=mysqli_fetch_assoc($run);
        ?>
        <tr><td><?=$row['First_Name'] ?></td>
        <td><?=$row['Last_Name'] ?></td>
        <td><?=$row['Gender'] ?></td>
        <td><?=$row['Employee_ID'] ?></td>
        <td><?=$row['Email'] ?></td>
        <td><?=$row['Mobile'] ?></td></tr>
        <td><?=$row['Address'] ?></td>
        <td><?=$row['Password'] ?></td>
        <?php
    }
    ?>
    </table>
</body>
</html>
