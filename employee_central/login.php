<?php
    session_start();
    if(isset($_SESSION['uid'])){
        header('location:user_info.php');
    }
?>
<html>
    <head>
        <title>
            Login
        </title>
        <style>
        body{
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
    text-decoration: none;
    font-size: 17px;
}
.topnav a.active {
     background-color: white;
     color: black;

}
.container{
                width: 50%;
                margin-left: 200px;
                margin-right: 200px;
                border: 10px 10px 10px 10px;
                border-color: black;
                border-style: none;
                background-color: white;

            }
            h3{
                text-align: center;
                margin-top: 20px;
                font-size: xx-large;
                text-decoration: underline;
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
            button{
                padding: 10px;
                margin-left: 50%;
                margin-left: 50%;
            }
        
        </style>
    </head>
    <body>
            <div class="topnav">
                    <a class="active" href="index.php">Home</a>
                </div>
                <div>
                    <h1>Welcome</h1>
                    </div>
                    <div class="container">
                        <h3>Login</h3><br>
                        <form action="login.php" method="POST">
                                <label for="email"><b>Email</b></label><br>
                                <input type="email" name="email" placeholder="Enter Email" required><br><br>
                                <label for="email"><b>Password</b></label><br>
                                <input type="password" name="psw" placeholder="Enter Password" required><br><br>
                                <button type="submit" name="login">Login</button>
                                
                        </form>
                    </div>
                </body>
</html>
<?php
    include('dbconfig.php');

    if (isset($_POST['login']))
     {
        $email = $_POST['email'];
        $pass=$_POST['psw'];

        $qry="SELECT * FROM user_info WHERE email ='$email' AND password ='$pass'";
        $run= mysqli_query($con,$qry);
        $row=mysqli_num_rows($run);
        if($row<1)
        {
            ?>
            <script>
            alert('Username or Password not valid!!!');
            window.open('login.php','_self');
            </script>
            <?php
        }
        else{
            $data=mysqli_fetch_assoc($run);
            $id=$data['id'];
            $_SESSION['uid']=$id;
           header('location:userinfo.php');
            
        }

    }
?>