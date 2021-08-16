<?php
 include('DBconnection.php');
  $sql = "SELECT title,body,author,created_at FROM posts ORDER BY created_at DESC;";
$result = $conn->query($sql);

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
            <?php  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo  "<div class=\"blog-post\"> ";
    echo "<h2 class=\"blog-post-title\"> " ;
    echo  "<a href=single-post.php> ";
    echo  $row["title"] ;
    echo  "</h2> <p class=\"blog-post-meta\">"; 
    echo  $row["created_at"];
    echo  "<a href=\'#\'> ";
    echo $row["author"] ;
    echo " </a></p>" ."<br>" ;
    echo $row['body'];
  } }?>
            

              
               
            </div><!-- /.blog-post -->





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
</body>
</html>