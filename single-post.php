<?php
 include('DBconnection.php');
 $id=$_GET['postId'];
 $sql = "SELECT p.title, p.body, p.author,p.id, p.created_at,u.first_name,u.last_name FROM posts as p
  LEFT JOIN users as u ON p.author=u.id;";
  $comments="SELECT DISTINCT author,text,id FROM comments WHERE post_id=$id";
$result = $conn->query($sql);
$result2= $conn->query($comments);

$hasError = isset($_GET['error'])
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
        echo  "<a href=\single-post.php" ;
        echo  "\?postId=" .$row["id"];
        echo ">";
        echo  $row["title"] ;
        echo  "</a> </h2> <p class=\"blog-post-meta\">"; 
        echo  $row["created_at"];
        echo  "<a href=\'#\'> ";
        echo $row["first_name"] ;
        echo " ";
        echo $row["last_name"] ;
        echo " </a></p>" ."<br>" ;
        echo $row['body'];
 ?>
            <hr>
      <div> <button id='deletePostBtn'> Delete this post </button></div>
              
               
            </div><!-- /.blog-post -->
<hr>  
             <!-- add comment --> 
           <div> <form action="..\create-comment.php" method="POST">
            <input type="hidden" value="<?php echo $id; ?>" name="post_id" />
    <label for='name'>Author</label> 
    <input type="text" name='author' id='name' placeholder="Your name">
    <?php if($hasError){  echo ' <el class=\'alert-danger\'>*Required field. </el>' ; } ?><br>
    <label for='message'>Write your message</label> 
    <textarea  name="message" placeholder="Your message"></textarea>
    <?php  if($hasError) { echo ' <el class=\'alert-danger\'>*Required field. </el>' ; }?> <br>
    <button id='sbmtBtn'>Submit</button>
  </form> </div><hr>
                <button id='btn' class="btn"> Hide Comments</button>
            <div class='comments' > <ul>
            <?php  if ($result2->num_rows > 0) {
  while($singleComment = $result2->fetch_assoc())
        {       echo "<div>";
                echo "<form method='POST' action='../delete-comment.php'";
                echo "<li>";
                echo " <input type='hidden' name='comment-id' value=' ";
                echo $singleComment['id'];
                echo " ' />";
                echo "<input type='hidden' name='post_id' value='";
                echo $id;
                echo "' />";

                echo "<h5 class='comment-author'>" ;
                echo $singleComment['author'];
                echo " </h5>";
                echo "<p class='comment-text'>";
                echo $singleComment['text'];
                echo "<button class='.btn-default' id='deleteCom";
                echo $singleComment['id'];
                echo "'>Izbrisi komentar</button>";

                echo "</p>";
                echo "<hr>";
                echo "</li>";
                echo "</form>";
                echo "<div>";
          }
        }
          ?>
            </ul>
            </div><!-- /.blog comments -->



            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php include('sidebar.php') ?> <!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->




<footer class="blog-footer"> <?php include('footer.php')
?>
</footer>

<script> 
const commentsButton = document.querySelector('#btn')
const deletePost=document.querySelector('#deletePostBtn')
const commentDiv=document.querySelector('.comments')
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
deletePost.addEventListener('click', () => {
    let confirmacija=confirm("Do you really want to delete this post?")
    if(confirmacija){
    window.location.href = "/delete-post.php?postId=<?php echo $id;?>";
}


})



</script>
</body>
</html>