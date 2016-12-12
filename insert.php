<?php
session_start();
if(!isset($_SESSION['user_name'])){
	header("location:login.php");
}
	else{
?> 
<!doctype html>
<html>
<head>
<link href="login_style.css" rel="stylesheet">
<meta charset="utf-8">
<title>youth organization</title>
</head>

<body>
 <div class="any">
<form  method="post" action="insert.php" enctype="multipart/form-data">
<table align="center" border="4">
<tr>
<td colspan="5" ><h2>Insert new post here</h2></td>
</tr>
<tr>
<td>post title:</td>
<td><input type="text" name="title" size="40" required></td>
</tr>
<tr>
<td>post author:</td>
<td><input type="text" name="author" size="40" required></td>
</tr>
<tr>
<td>post image:</td>
<td><input type="file" name="image" size="40" required></td>
</tr>
<tr>
<td>post news:</td>
<td><input type="text" name="news" size="40"></td>
</tr>     
<tr>
<td align="center" colspan="5"><input type="submit" name="submit" value="publish now"></td>
</tr>
</table>
</form>
<?php
include("includes/connection.php");
if (isset($_POST['submit'])){
$title=$_POST['title'];
$date=date("Y/m/d");
$author=$_POST['author'];
        
$image_name=$_FILES['image']['name'];
$image_type=$_FILES['image']['type'];
$image_size=$_FILES['image']['size'];
$image_tmp=$_FILES['image']['tmp_name'];
$news=$_POST['news'];
move_uploaded_file($image_tmp, "images/$image_name");

$query="insert into posts
(post_title,post_date,post_author,post_image,post_news)values('$title','$date','$author','$image_name','$news')";

if(mysql_query($query)){
echo "<script>window.open('index.php?publish=a post has been published!.......','_self')</script>";}
}
?>

</body>
</html>
<?php } ?>
