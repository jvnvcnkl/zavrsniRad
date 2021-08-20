<?php
include('DBconnection.php'); 
$sql="SELECT id,title FROM posts ORDER BY created_at DESC LIMIT 5 ;";
$result=$conn->query($sql);

echo "<aside class=\"col-sm-3 ml-sm-auto blog-sidebar\">";
echo "<div class=\"sidebar-module sidebar-module-inset\">";
echo  "<h4>Latest Posts</h4>";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           
   echo "<a href=\"/single-post.php?postId="; 
   echo $row['id'];
   echo " \" >";
   echo $row['title'];
   echo "</a>";
   echo "<br>";
    
}}
echo "</div>
</aside>";



?>