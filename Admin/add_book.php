<?php
require_once('../connection.php');


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $author=mysqli_real_escape_string($conn,$_POST['author']);
    $price=mysqli_real_escape_string($conn,$_POST['price']);
    $bid=mysqli_real_escape_string($conn,$_POST['bid']);
//file upload
    $target_dir="uploads/";
    $target_file=$target_dir . basename($_FILES["cover"]["name"]);
    $uploadOk=1;
    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    //to check image is actual or fake
    if(isset($_POST["submit"])){
        $check=getimagesize($_FILES["cover"]["tmp_name"]);
      if($check!=false){
        echo "<script>alert('file is an image')</script>";
        $uploadOk=1;

      } else
      {
        echo "<script>alert('file is not an image')</script>";
        $uploadOk=0;
      }
    }
//checking if file already exsists or not


     //check file size
     if($_FILES["cover"]["size"]>500000){
        echo  "<script>alert('file is too big')</script>";
        $uploadOk=0;

     }


     //allow cirtain file formats
     if($imageFileType !="jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
     {
        echo "<script>alert('Sorry only jpg,png,jpeg allowed')</script>";
        $uploadOk=0;
        
     }

     if ($uploadOk==0){
        echo "<script>alert('Sorry your file was not uploaded')</script>";
     }
     else
     {
        if(move_uploaded_file($_FILES["cover"]["tmp_name"],$target_file)){
            echo "The file".basename($_FILES["cover"]["name"])."has been uploaded";


            //sdd book to the database
            $cover=basename($_FILES["cover"]["name"]);
            $sql="INSERT INTO books (book_id,book_name,author,price,cover_image) VALUES ('$bid','$title','$author','$price','$cover')";
            if($conn->query($sql)=== TRUE){
                echo "<script>alert('Book added successfully')</script>";
            }
            else{
                echo "<script>alert('Error adding book')</script>";
            }
        }
     }
}
?>