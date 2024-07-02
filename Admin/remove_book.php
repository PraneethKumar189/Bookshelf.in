<?php
require_once('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bid=mysqli_real_escape_string($conn,$_POST['book_id']);

 
  // Remove the book from the database
  $sql = "DELETE FROM books WHERE book_id = $bid";
  if ($conn->query($sql) == TRUE) {
    echo "<script>alert('book removed successfully')</script>";
  } else {
    echo "Error removing book: " . $conn->error;
  }


}
?>