<?php
require_once('connection.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    
    $mail=mysqli_real_escape_string($conn,$_POST['mail']);
    $pswrd=mysqli_real_escape_string($conn,$_POST['password']);
    $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);

    $address=mysqli_real_escape_string($conn,$_POST['address']);
    
   //to check that email already exists or not
   $sql_check="SELECT * FROM userinfo WHERE email='$mail'";
   $result_check=$conn->query($sql_check);

   if($result_check->num_rows > 0){
    echo"<script> alert('email already exists')</script";

   }
   else{

    $sql="INSERT INTO userinfo(fname,email,pswd,pno,address) VALUES ('$name','$mail','$pswrd','$mobile','$address')";
    if($conn->query($sql)==TRUE){
        echo "<script>alert('Registered successfully'); window.location='login.php';</script>";
        exit;  
    }else {
        echo "<script>alert('Registration failed'); window.location='register.php';</script>";
            exit; // Stop further execution
    }
    
     
   }


  
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style>
    html{
        height:100vh;
    }
    body{
    display: grid;
    align-items: center;
    background-image: linear-gradient(to right top,#051937,#004d7a,#008793,#00bf72,#a8eb12 );
   justify-content: center;
   height: 100%;
   background-repeat: no-repeat;
   margin: 0;
   font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: normal;
}
.main{
    height: 650px;
    width: 400px;
    
    background-color: white;
    margin-top: 0px;
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
form #gen{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    font-family: roboto;
    
}
button[type="submit"],button[type="button"],#log{
    height: 40px;
     border-radius: 8px;
     display:flex;
     align-items:center;
     justify-content:center;
     font-weight: bold;
     color: #f1f3f5;
    font-size: 20px;
background-color:#051937 ;
text-decoration:none;


}
form input{
    height: 20px;
    border-radius: 5px;
}
textarea{
    border-radius: 7px;
}
#logo{
      font-weight: bold;
    font-size: 24px;
           font-family: "Roboto", sans-serif;
           margin-left: 100px;
}
</style>
</head>
<body>
    <div class="main">
        <h2>Sign Up</h2>
    
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label id="logo">bookShelf.in</label><br>
          <label for="name"> Name</label>
          <input type="text" name="name" id="name" required><br>
          
          <label for="mail">Email</label>
          <input type="text" name="mail" id="email" required><br>
          <label for="password">Password</label>
          <input type="password" name="password" id="password"  required><br>
           
           <label for="mobile">Phone Number</label>
           <input type="text" name="mobile" id="mobile" maxlength="10" required><br>
        
           <label for="adsress">Address</label>
           <textarea name="address" id="" cols="30" rows="6">Address...</textarea>
           <br>
           <button type="submit">Sign Up</button>
           <br>
         <a id="log" href="login.php">Login<a>
        </form>

    </div>
</body>
</html>