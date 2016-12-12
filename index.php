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
<meta charset="utf-8">
<title>Owner login</title>
<link href="login_style.css" rel="stylesheet">
</head>

<body>

<aside>
<h2>welcome to admin:&nbsp;&nbsp;((<?php echo $_SESSION['user_name']; ?>)) </h2>    
<h1>links to working pages</h1>
<a href="logout.php">Owner logout</a>
<a href="index.php?post=post">view posts</a>
<a href="index.php?insert=insert">insert new posts</a>
</aside>
<section>
<header>
<h1>welcome to the owner of the Imran Shaheed Youth Organization website</a></h1>
<h2>all content manage here!</h2>
</header>
<h1><?php echo @$_GET['deleted'];?></h1>
<h1><?php echo @$_GET['upd'];?></h1>
<h1><?php echo @$_GET['publish'];?></h1>
<?php 
if(isset ($_GET['insert'])){
include ("insert.php");
} ?>

<?php if(isset($_GET['post'])){ ?>
<table width="900" align="center" border="3">
<tr>
<td align="center" colspan="9"><h1>view all posts here!</h1></td>
</tr>
<tr>
<th>post n0</th>
<th>post title</th>
<th>post author</th>
<th>post date</th>
<th>post image</th>
<th>post news</th>    
<th>Edit</th>
<th>Delete</th>
</tr>
<?php 
$i=1;
include("includes/connection.php");
if(isset($_GET['post'])){
$query="select* from posts order by 1 DESC";
$run=mysql_query($query);
while($row=mysql_fetch_array($run)){
	$post_id=$row['post_id'];
	$title=$row['post_title'];
	$author=$row['post_author'];
	$date=$row['post_date'];
	$image=substr($row['post_image'],0,40);
    $news=substr($row['post_news'],0,20);


?>
<tr>
<td><?php echo $i++; ?></td>
<td><?php echo $title; ?></td>
<td><?php echo $author; ?></td>
<td><?php echo $date; ?></td>
<td align="center"><img src="images/<?php echo $image; ?>" height="50" width="70" style="border-radius:7px;" text_align:center;></td>
<td><?php echo $news; ?></td>    
<td><a href="edit.php?edit=<?php echo $post_id; ?>">Edit</a></td>
<td><a href="delete.php?delet=<?php echo $post_id; ?>">Delete</a></td>
<?php }} }?>
</table>
</section>
</body>
</html>
<?php } ?>