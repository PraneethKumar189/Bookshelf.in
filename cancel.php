<?php
include 'connection.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
    $cancelId=$_POST['cancel_id'];
  


//deleting order from the database
$query="DELETE FROM book_order WHERE order_id= $cancelId";

if (mysqli_query($conn,$query)){
    echo "<script>alert('Order canceled successfully')</script>";
}
else {
    echo "Error:". $query ."<br>". mysqli_error($conn);
}
mysqli_close($conn);


}
?>