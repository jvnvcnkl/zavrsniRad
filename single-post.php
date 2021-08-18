<?php
 include('DBconnection.php');
 $id=$_GET['postId'];

  $sql = "SELECT id,title,body,author,created_at FROM posts WHERE id=$id";
  $comments="SELECT DISTINCT author,text FROM comments WHERE post_id=$id";
$result = $conn->query($sql);
$result2= $conn->query($comments);

?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">


</head>

<body>

<header>
<?php include('header.php')
?>

</header>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main"> 
        <?php 
        $row = $result->fetch_assoc();
        echo  "<div class=\"blog-post\"> ";
        echo "<h2 class=\"blog-post-title\"> " ;
        echo  "<a href=single-post.php" ;
        echo  "\\?postId=" .$row["id"];
        echo ">";
        echo  $row["title"] ;
        echo  "</a> </h2> <p class=\"blog-post-meta\">"; 
        echo  $row["created_at"];
        echo  "<a href=\'#\'> ";
        echo $row["author"] ;
        echo " </a></p>" ."<br>" ;
        echo $row['body'];
 ?>
            

              
               
            </div><!-- /.blog-post -->
                <button id='btn' class="btn"> Hide Comments</button>
            <div class='comments' > <ul>
            <?php  if ($result2->num_rows > 0) {
  while($singleComment = $result2->fetch_assoc())
          {
                echo "<li>";
                echo "<h5 class='comment-author'>" ;
                echo $singleComment['author'];
                echo " </h5>";
                echo "<p class='comment-text'>";
                echo $singleComment['text'];
                echo "</p>";
                echo "<hr>";
                echo "</li>";
          }
        }
          ?>
            </ul>
            </div>



            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php include('sidebar.php') ?> <!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->

<script > 
const commentsButton = document.querySelector('.btn')
const commentDiv=document.querySelector('.comments')
console.log(commentsButton)
commentsButton.addEventListener('click', () =>{
    
    if (commentDiv.style.display === "none") 
    {
        commentDiv.style.display = "block"; 
        commentsButton.value = 'Show comments'
    } 
    else {
        commentDiv.style.display = "none";
        
    }
})
</script>

<footer class="blog-footer"> <?php include('footer.php')
?>
</footer>
</body>
</html>