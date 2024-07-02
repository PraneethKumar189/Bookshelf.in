<?php
require_once('../connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style>body,h1,h2,h3,p,ul,li{
    margin:0;
    padding:0;
}
body{
    font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: normal;
}

/*sidebar styles*/
.sidebar{
    height: 100%;
    width:200px;
    position: fixed;
    top:0;
    left: 0;
    background-color:#24252a ;
    padding-top: 20px;
    
}

.sidebar h2{
    color:#fff;
    text-align: center;
    margin-bottom: 20px;
}
.sidebar a{
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    transition: background-color 0.3s;
}

.sidebar a:hover{
    background-color: #555;
}

.content{
    margin-left: 200px;
    padding: 20px;
}
.content #add{
    display:block;
}
.tabcontent{
    display:none;
}

.tabcontent.active{
    display: block;
}

form{
    margin-bottom: 20px;
}

label{
    font-weight: bold;
}

input[type="text"],input[type="file"],input[type="submit"]{
    width:100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

input[type="submit"]{
    background-color: #333;
    color:#fff;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover{
    background-color: #555;
}</style>
</head>
<body>
<div class="sidebar">
  <h2 style=" color: #0cfbfb;">Admin Panel</h2>
  <a href="#" onclick="openTab('add')">Add Book</a>
  <a href="#" onclick="openTab('remove')">Remove Book</a>
  <a href="login.php">Logout</a>
</div>

<div class="content">
  <div id="add" class="tabcontent">
    <h3>Add Book</h3>
    <form action="add_book.php" method="post" enctype="multipart/form-data">
    <label for="bid">Book ID:</label>
      <input type="text" id="bid" name="bid" required><br><br>
    <label for="title">Title:</label>
      <input type="text" id="title" name="title" required><br><br>
      <label for="author">Author:</label>
      <input type="text" id="author" name="author" required><br><br>
      <label for="price">Price:</label>
      <input type="text" id="price" name="price" required><br><br>
      <label for="cover">Cover Image:</label>
      <input type="file" id="cover" name="cover" accept="image/*" required><br><br>
      <input type="submit" value="Add Book">
    </form>
  </div>

  <div id="remove" class="tabcontent">
    <h3>Remove Book</h3>
    <form action="remove_book.php" method="post">
      <label for="book_id">Book ID:</label>
      <input type="text" id="book_id" name="book_id" required><br><br>
      <input type="submit" value="Remove Book">
    </form>
  </div>
</div>

<script >
    function openTab(tabName){
        var i,tabcontent;
        tabcontent=document.getElementsByClassName("tabcontent");
        for(i=0;i<tabcontent.length;i++){
            tabcontent[i].style.display="none";
        }
        document.getElementById(tabName).style.display="block";

    }

    function logout(){
        window.location.href="login.php";
        alert("Logout successfull");
    }
</script>
</body>
</html>