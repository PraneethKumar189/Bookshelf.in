<?php
include 'connection.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $userName=$_POST['user_name'];
    $bookId=$_POST['book_id'];
    $userMail=$_POST['user_mail'];
//Retrive book details from the database using the book name
$query="SELECT * FROM books WHERE book_id= $bookId";
$result=mysqli_query($conn,$query);
$books=mysqli_fetch_assoc($result);

//insert order into the database
$query="INSERT INTO book_order (uname,bname,price,umail1) VALUES ('$userName','{$books['book_name']}','{$books['price']}','$userMail')";

if (mysqli_query($conn,$query)){
    echo "<script>alert('Order placed successfully')</script>";
}
else {
    echo "Error:". $query ."<br>". mysqli_error($conn);
}
mysqli_close($conn);


}
?>