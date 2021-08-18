<?php
include('DBconnection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $author=$_POST['author'];
   $message=$_POST['message'];
   $id=$_POST['post_id'];
}

$sql="INSERT INTO comments (author,text,post_id) VALUES ( '$author', '$message','$id');";


if(!empty($author) && !empty($message)){
if ($conn->query($sql) === TRUE) {
   
    header("Location: /single-post.php/?postId=$id");

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else{
    header("Location: /single-post.php/?postId=$id&error");
}


