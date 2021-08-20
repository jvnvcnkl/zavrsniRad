<?php 
include('DBconnection.php');
$hasError = isset($_GET['error']);

$users="SELECT id,first_name,last_name from users";

$result=$conn->query($users);
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
    
</head>

<body>

<header>
<?php include('header.php')
?>

<main>
<div class='new-post'><h3>Create your own post. </h3>
<form method='POST' action="create-post.php">
<label for='author'>Author</label>
<select name="author" id="author">
<?php  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      echo " <option value= ";
      echo $row['id'];
      echo ">";
      echo $row['first_name'];
      echo " ";
      echo $row['last_name'];
      echo "</option>";
  }
}
   ?> </select> 
   <?php if($hasError){  echo ' <el class=\'alert-danger\'>*Required field. </el>' ; } ?><br>

<label for='text'> Title </label>
<input name='title' placeholder='Title'> <br>     <?php if($hasError){  echo ' <el class=\'alert-danger\'>*Required field. </el>' ; } ?><br>

<textarea name='text' placeholder='Type here'></textarea>     <?php if($hasError){  echo ' <el class=\'alert-danger\'>*Required field. </el>' ; } ?><br>


<button>Submit your post</button>

</form>
</div>



</main>


</header>



        <?php include('sidebar.php') ?> <!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer"> <?php include('footer.php')
?>
</footer>
</body>
</html>



