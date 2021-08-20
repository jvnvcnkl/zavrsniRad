<?php

include('DBconnection.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $commId=$_POST['comment-id'];
   $id=$_POST['post_id'];
}


$deleteComment="DELETE FROM comments WHERE id=$commId;";

if ($conn->query($deleteComment) === TRUE) {
   
    header("Location: /single-post.php/?postId=$id");

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  };