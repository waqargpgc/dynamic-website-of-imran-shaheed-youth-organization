<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="login_style.css" rel="stylesheet">
<title></title>
</head>

<body>
<?php 
include("index.php");
include ("includes/connection.php");
$edit_id=@ $_GET['edit'];
$query="select*from posts where post_id='$edit_id'";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)) {
	$edit_id1=$row['post_id'];
	$title=$row['post_title'];
	$author=$row['post_author'];
	$image=$row['post_image'];
     $news=$row['post_news'];
	


?>
 
<form  method="post" action="edit.php?ed_form=<?php echo $edit_id1; ?>" enctype="multipart/form-data" >
<table align="center" border="4">
<td colspan="5"><h2>Update post here</h2></td>
</tr>
<tr>
<td>post title:</td>
<td><input type="text" name="title" size="40" value="<?php echo $title; ?>" required></td>
</tr>
<tr>
<td>post author:</td>
<td><input type="text" name="author" size="40" value="<?php echo $author; ?>" required></td>
</tr>
<tr>
<td>post image:</td>
<td><input type="file" name="image" size="40" required>
<img src="images/<?php echo $image; ?>" width="60" height="60">
</td>
</tr>
<tr>
<td>post news:</td>
<td><input type="text" name="news" size="40" value="<?php echo $news; ?>"></td>
</tr>    
<tr>
<td align="center" colspan="5"><input type="submit" name="update" value="Update now"></td>
</tr>
<?php } ?>
</table>
</form>

</body>
</html>
<?php 
  if (isset($_POST['update'])){
$update_id=$_GET['ed_form'];
$title=$_POST['title'];
$date=date("Y/m/d");
$author=$_POST['author'];
$body=$_POST['body'];
$news=$_POST['news'];      
$image_name=$_FILES['image']['name'];
$image_type=$_FILES['image']['type'];
$image_size=$_FILES['image']['size'];
$image_tmp=$_FILES['image']['tmp_name'];
move_uploaded_file($image_tmp, "images/$image_name");
$update_query="update posts set post_title='$title', post_date='$date', post_author='$author',
 post_image='$image_name',post_news='$news'
 where post_id='$update_id'";
 
if (mysql_query($update_query)){
	echo "<script>window.open('index.php?upd=a post has been updated!.....','_self')</script>";

}
}
?>