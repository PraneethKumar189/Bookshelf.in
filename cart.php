<?php
require_once('connection.php');

session_start();
// Fetch user information  from the database
$user_name = $_SESSION['user_name'];

$sql2 = "SELECT * FROM userinfo WHERE fname = '$user_name'";
$result = mysqli_query($conn, $sql2);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $umail1 = $row['email']; // Get the email from the fetched row
    
} else {
    $umail1 = "No userfound found";
}

function getcart($conn,$umail1){
     
    $sql="SELECT * FROM book_order WHERE umail1 = '$umail1' ";
    $result=$conn->query($sql);
    if ($result->num_rows>0){
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        return[];
    }
    
    }
    $orders=getcart($conn,$umail1);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body,table{
            margin:0;
            padding:0;
            width: 100vw;
            background-color: #24252a;
            font-family: "Roboto", sans-serif;
  font-weight: 300;
  font-style: normal;
        }

        th{
            background-color:#f2f2f2;
            text-align:left;
            padding:8px;

        }
        td{
            border-bottom:1px solid #ddd;
            padding:8px;
            color:white;
        }
        td:hover{
            color: #0cfbfb;
        }
        footer{
        width:100%;
        height:40px;
        position:fixed;
        background-color:#24252a;
        display:flex;
        justify-content:flex-end;
        align-items:center;
    }
    button{
        margin:0;
        padding:0;
        border:1px solid white;
    }
    button:hover{
        border-color:#0cfbfb;
    }
   #ba{
        display: flex;
        background-color:#24252a;
        color: #0cfbfb;
        width:140px;
        height:30px;
        border-radius:5px;
        align-items:center;
        justify-content:center;
        text-decoration:none;
    }
    </style>
</head>
<body>
<h1 style=" color:white;">Order List</h1>

<table>
                <tr><th>Order id</th><th>Book name</th><th>Price</th><th>Order date&time</th><th>Options</th></tr>
                <?php foreach($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['order_id'];?></td>
                        <td><?php echo $order['bname'];?></td>
                        <td><?php echo $order['price'];?></td>
                        <td><?php echo $order['order_date'];?></td>
                         <td><button id="ba" onclick="cancelorder('<?php echo $order['order_id'];?>')">Cancel </button> </td>
                    </tr>
                    <?php endforeach;?>
</table>
   
<footer><button><a id="ba" href="homecompo.php">Back</a></button></footer>
<script>
    function cancelorder(cancelid){
          

            let url='cancel.php';
            let params=`cancel_id=${cancelid}`;

            let xhr= new XMLHttpRequest();
            xhr.open('POST',url,true);
            xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');

            xhr.onload=function(){
                if(xhr.status===200){
                  
                    console.log(params);
                }
                else{
                    alert('Error canceling order',xhr.responseText);
                }
            };
            xhr.send(params);
           location.reload();
           }
</script>
</body>
</html>