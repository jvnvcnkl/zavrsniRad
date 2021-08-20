<?php
include('DBconnection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $author=$_POST['author'];
   $message=$_POST['text'];
   $time=date("Y-m-d h:i:s");
   $title=$_POST['title'];
}

$sql="INSERT INTO posts (author,title, body,created_at) VALUES ( '$author','$title','$message','$time');";


if(!empty($author) && !empty($message) && !empty($title)){
    if ($conn->query($sql) === TRUE) {
       
        header("Location: /index.php");
    
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }else{
        header("Location: /create.php?error");
    }
    