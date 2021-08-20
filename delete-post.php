<?php

include('DBconnection.php');
$postId=$_GET['postId'];


 
 $deleteComment="DELETE FROM posts WHERE id='$postId';";
 
 if ($conn->query($deleteComment) === TRUE) {
    
     header("Location: /index.php");
 
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   };