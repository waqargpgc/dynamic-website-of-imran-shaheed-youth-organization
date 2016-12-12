<?php 
include("includes/connection.php");
$delet_id=$_GET['delet'];
$delet_query="delete from posts where post_id=$delet_id";
if(mysql_query($delet_query)){
echo "<script>window.open('index.php?deleted=a post has been deleted!.....','_self')</script>";
}
?>