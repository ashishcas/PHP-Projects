<html>
    <head>
        <title>
            Registration
        </title>
        <style>
        <body>
        <h1>TEST</h1>

        {
            background-image: url("https://wallpaperplay.com/walls/full/d/9/0/82810.jpg");
    }
                
.topnav{
    background-color:white;
        overflow: hidden;
}
.topnav a{
    float: left;
     color:black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: underline;
    font-size: 19px;
}
.topnav a.active {
     text-decoration: underline;
     color: black;

}
            .container{
                width: 50%;
                margin-left: 200px;
                margin-right: 200px;
                border: 10px 10px 10px 10px;
                border-color: black;
                border-style: none;
                background-color: none;

            }
            h3{
                text-align: center;
                margin-top: 40px;
                font-size: xx-large;
            }
            
           label{
               margin-left: 40px;
           }
            input{
                padding: 10px;
                display: inline-block;
                margin-left: 100px;
                margin-right: 20px;
                margin-top: 5px;
                margin-bottom: 5px;
                
            }
            textarea{
                margin-top: 5px;
                margin-bottom: 5px;
                margin-left: 100px;
            }
            button{
                padding: 10px;
                margin-left: 50%;
                margin-left: 50%;
            }
            p{
                margin-left: 350px;
            }
            h1{
                text-align: center;
                text-decoration: underline;
                color:black;
            }
        </style>
    </head>
    <body>
            <div class="topnav">
                    <a class="active" href="index.php">Register</a>
                    <a href="login.php">login</a>
                </div>
                <div>
                    <h1>Employee Central</h1>
                </div>
        <div class="container">
                <h3>Registration</h3>
                <form action="index.php" method="POST">
                    <label for="fname"><b>First Name</b></label><br>
                    <input type="text" name="fname" placeholder="Enter Firstname" required size="50"><br><br>
                    <label for="lname"><b>Last Name</b></label><br>
                    <input type="text" name="lname" placeholder="Enter Lastname" required size="50"><br><br>
                    <label for="gender"><b>Gender</b></label><br>
                    <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label><br><br>
                    <label for="address"><b>Enter Address</b></label><br>
                    <textarea rows="5" cols="50" name="address"></textarea><br><br>
                    <label for="Empid"><b>Employee id</b></label><br>
                    <input type="number" name="empid" placeholder="Enter Employyed id" required size="10"><br><br>
                    <label for="email"><b>Email</b></label><br>
                    <input type="email" name="email" placeholder="Enter Email" required size="30"><br><br>
                    <label for="mno"><b>Mobile</b></label><br>
                    <input type="number" name="mno" placeholder="Enter Mobile No" required size="10"><br><br>
                    <label for="psw"><b>Password</b></label><br>
                    <input type="password" name="psw" placeholder="Enter Password" required size="15"><br><br>
                   <button type="submit" name="register">Register</button><br>
                   <p>Already a Member <a href="login.php"><b>Login</b></a></p>
                    
                </form>
        </div>
        
        </body>
    </body>
</html>
<?php
    if (isset($_POST['register'])) {
        $firstname=$_POST['fname'];
        $lastname=$_POST['lname'];
        $gender=$_POST['gender'];
        $empid=$_POST['empid'];
        $email=$_POST['email'];
        $mobile=$_POST['mno'];
        $address=$_POST['address'];
        $password=$_POST['psw'];
		$con= mysqli_connect('localhost', 'root', '','synopsys');
        $qry ="INSERT INTO user_info(`First_Name`, `Last_Name`, `Gender`,`address`, `emp_id`, `email`, `mobile`,`password`) 
                VALUES 
                ('$firstname','$lastname', '$gender', '$address','$empid','$email', '$mobile','$password')";
       $run=mysqli_query($con,$qry);
        if($run == true)
        {
            ?>
                <script>
                    alert("You are registered successfully.");
                    window.open('registration_process.php','_self');
                    </script>
            <?php
        }
    else {
        echo "Error :".$qry."<br>".$con->error;
        ?>
        <script>
                alert("Error");
                </script>

                <?php
     }
   }
?>