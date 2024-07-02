<?php 

require_once('connection.php');
function getBooks($conn){

$sql="SELECT * FROM books";
$result=$conn->query($sql);
if ($result->num_rows>0){
    return $result->fetch_all(MYSQLI_ASSOC);
}
else{
    return[];
}

}
$books=getBooks($conn);


session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit;
}



// Fetch user information 
$user_name = $_SESSION['user_name'];

$sql2 = "SELECT * FROM userinfo WHERE fname = '$user_name'";
$result = mysqli_query($conn, $sql2);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $uname = $row['fname'];
    $umail=$row['email']; 
} else {
    $uname = "No userfound found";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKLIST</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style>
    body{
        background-color:#24252a;
        font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: normal;
  width:100%;
  
    }

   h1{
    color: #0cfbfb;
 
     }
    .card{
            border:1px solid #ccc;
            border-radius:5px;
            padding:10px;
            margin:10px;
            width:200px;
            display:inline-block;
            vertical-align:top;
            text-align:center;
            background-color:white;
           
        }
        .card img{
            max-width:100%;
            height:200px;
            margin-bottom:10px;

        }
    button{
        background-color:#24252a;
        color:white;
        width:140px;
        height:30px;
        border-radius:5px;
        border:1px solid white;
        display: flex;
        align-items:center;
        justify-content:center;
        margin-left:30px;
        padding:0;
    }
    button:hover{
        border-color:#0cfbfb;
    }
   .foot{
    
        background-color:#24252a;
        display:flex;
        justify-content:flex-end;
        align-items:center;
    } 
    #ba{
        display: flex;
        background-color:#24252a;
        color: #0cfbfb;
        width:120px;
        height:20px;
        border-radius:5px;
        align-items:center;
        justify-content:center;
        text-decoration:none;
        
    }
</style>
</head>
<body>
    
    <h1>Booklist</h1>
    <?php foreach($books as $book): ?>
        <div class="card">
            <img src="./uploads/<?php echo $book['cover_image'];?>" alt="<?php echo $book['book_name'];?>cover">
            <h2><?php echo $book['book_name'];?></h2>
            <p><strong>Author:</strong><?php echo $book['author'];?></p>
            <p><?php echo $book['price'];?></p>
            
            <button onclick="buybook('<?php echo $book['book_id'];?>')">BUY</button>
        </div>
        <?php endforeach;?>
        <div class="foot"><button><a id="ba" href="homecompo.php">Back</a></button></div>
        <script>
           function buybook(bookid){
            let username= '<?php echo $uname ?>';
            let useremail= '<?php echo $umail ?>';
            console.log(useremail);
            let url='order.php';
            let params=`user_name=${username}&book_id=${bookid}&user_mail=${useremail}`;

            let xhr= new XMLHttpRequest();
            xhr.open('POST',url,true);
            xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');

            xhr.onload=function(){
                if(xhr.status===200){
                    alert('order placed successfully');
                    console.log(params);
                }
                else{
                    alert('Error placing order',xhr.responseText);
                }
            };
            xhr.send(params);

           }
        </script>
</body>
</html>