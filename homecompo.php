<?php


// Include the database connection file
include './connection.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}



// Fetch user information  from the database
$user_name = $_SESSION['user_name'];

$sql = "SELECT * FROM userinfo WHERE fname = '$user_name'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $uname = $row['fname']; // Get the name from the fetched row
} else {
    $uname = "No userfound found";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book shop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        *{

margin: 0px;
padding: 0px;
background-color: #24252a;
}
body{
height: 140vh;
width: 100vw;
font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: normal;
}
li,a{
font-family: monospace;
font-weight: 500;
font-size: 16px;
color: #edf0f1;
text-decoration: none;
}
header{
display: flex;
justify-content:center;
align-items: center;
padding: 20px 10%;
}
.logo{
    color: white;
    margin: none;
    font-family:monospace;
}
.nav_links{
list-style: none;
margin-left: 50px;
}
.nav_links li{
display: inline-block;
padding: 0px 20px;
}
.nav_links li a{
transition: all 0.3s ease 0s;
}
.nav_links li a:hover{
color: #0cfbfb;
}
#Home{

height: 90vh;
width: 100vw;
background:linear-gradient(rgba(0,0,0,0.342),rgba(0,0,0,0.342)), url(library-7720589_1280.webp) no-repeat center / cover;

position: absolute;
}
#her{
width: 90%;
height: 100%;
max-width: 1200;
margin:0 auto ;
display: flex;
align-items: start;
justify-content: left;
background: none;

}
.info{
background: none;
}
#her .info h1{
font-size: 5rem;
margin-bottom: 2rem;
background: none;
color: #ffffff;
font-family:monospace;
}
#her .info p{
font-size: 2rem;
max-width: 50%;
background: none;
color: rgb(255, 255, 255);

}
#her .info a{
text-decoration: none;
display: inline-block;
background-color: #ffffff;
border-radius: 4px;
font-size: 2rem;
padding: 0.7rem 3rem;
margin-top: 2rem;
color:rgb(0, 0, 0);
}
#her .info a:hover{
   background-color: #0cfbfb;
}
#Contact{
margin-top: 90vh;
height: 60vh;
width: 100vw;
background-color: #24252a;
padding-top: 40px;
}
#Ai1{
margin: 0  0 0 40px;
}
#Ai1 h1{
color: #0cfbfb;
}
#aa1 p,#aa2 p{
color: #ffffff;
}
.c3{
display: flex;

justify-content: left;
flex-direction: row;

}
.c3 #aa1{
margin: 0;
}
.c3 #aa2{
margin-left: 60%;
}
    </style>
</head>
<body>
<h2 style="color:white;">Welcome, <?php echo $uname; ?>!</h2>
    <header><h1  class="logo">bookShelf.in</h1>
        <nav>
            <ul class="nav_links">
               <li><a href="#Home">Home</a></li>
               <li><a href="bshop.php">Books</a></li>
               <li><a href="cart.php">Cart</a></li>
               <li><a href="logout.php">Logout</a></li>
               <li><a href="#Contact">Additional Info</a></li>
               
            </ul>
        </nav>
         </header>
   
    <section id="Home"><br><br><br>
        <div id="her">
            <div class="info">
                <h1>bookShelf.in</h1><br>
                <p>"Where every page opens a new door.Explore our vast collection of books."</p>
                <a href="bshop.php">Shop here</a>
            </div>
           
               
        </div>
       

    </section>
    <footer id="Contact">
        <div id="Ai1">
            <h1>bookShelf.in</h1>
            <br>
            <div class="c3">
                <div id="aa1">
                    <h3 style="color:#0cfbfb ;">CUSTOMER SERVICE</h3><br>
                    <p>Contact Us</p>
                    <p>Return Order</p>
                    <p>Cancel Order</p>
     
                 </div>
                 <div id="aa2">
                     <h3 style="color: #0cfbfb;">Company</h3><br>
                      <p>About Us</p>
                      <p>We're Hiring</p>
                      <p>Terms&Conditions</p>
                      <p>Privacy Policy</p>
                      <p>Blog</p>
                 </div>
            </div>
           
        </div>
    </footer>
</body>
</html>