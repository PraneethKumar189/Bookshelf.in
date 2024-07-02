<?php
session_start();
 



if(isset($_POST['submit'])) {
    require_once('connection.php');    

    $email = mysqli_real_escape_string($conn, $_POST['email1']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM userinfo WHERE email = '$email' AND pswd = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
     
    if($email=="admin@gmail.com" && $mypassword=="admin@123")
    {
        header("location: admin.php");
    }
    
    else if($count == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_name'] = $row['fname']; // Set the  name in the session
        header("location: homecompo.php");
        exit;
    } else {
        $error = "Your Login Email or Password is invalid";
        echo '<script>
        window.location.href="login.php";
        alert("Your Login Email or Password is invalid")
        </script>';
    }
}


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body{
    display: grid;
    align-items: center;
    background-image: linear-gradient(to right top,#051937,#004d7a,#008793,#00bf72,#a8eb12 );
   justify-content: center;
   height: 100vh;
   background-repeat: no-repeat;
   font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: normal;
}
.main{
    height: 430px;
    width: 350px;
    background-color: white;
    margin-top: 60px;
    padding-top: 0px;
    border-radius: 15px;
    box-shadow: 0 10px 14px 0 rgba(0,0,0,0.2),0 12px 26px 0 rgba(0,0,0,0.19);
}
h2{
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #051937;
    color: #a8eb12;
    font-weight: bold;
    font-size: 28px;
    margin: 0px;
    height: 70px;
     border-top-right-radius: 15px;
     border-top-left-radius: 15px;
}
form{
    display: flex;
    padding-top: 10px;
    padding-left: 30px;
    padding-bottom: 20px;
    padding-right: 30px;
    flex-direction: column;
    font-size: 16px;
   
}
input[type="submit"],button,#reg{
    height: 30px;
    display:flex;
     align-items:center;
     justify-content:center;
     border-radius: 6px;
     font-weight: bold;
     color: #f1f3f5;
    font-size: 16px;
background-color:#051937 ;
text-decoration:none;
}
form input{
    height: 20px;
    border-radius: 5px;
}
#logo{
      font-weight: bold;
    font-size: 24px;
           font-family: "Roboto", sans-serif;
           margin-left: 77px;
}
    </style>
</head>
<body>
    <div class="main">
        <h2>LOGIN</h2>
        <form action="login.php" method="POST">
            <label id="logo">bookShelf.in</label><br>
            <label for="mail">Email Address</label>
            <input type="email" name="email1" id="email1" required>
            <br>
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" required><br><br>
            <input type="submit" name="submit" value="Login"><br><br>
            <label for="reg">New user? Sign up here</label><a id="reg" href="register.php">Sign Up!</a>
        </form>
    </div>
</body>
</html>