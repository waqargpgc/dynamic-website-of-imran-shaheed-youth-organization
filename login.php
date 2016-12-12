<?php session_start();
?> 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
<style>
table h2{font-size:1.4em;
text-align:center;
text-shadow:gray 3px 3px 1px;
    }
table{border:medium 1px #ffccff;
border-radius:10px;
text-shadow:gray 3px 3px 1px;
box-shadow:inset 0 0 90px #FFFF99;
}
h2,table,input{
font-family:"Gabriola";
}

td,input{
border-radius:10px;
font-weight: 600;    
}

input{    
font-size:1.2em;
text-align:center;
background-color:bisque;
    
}

input:hover{
box-shadow:inset 1px 3px 6px white,
1px 3px 5px pink,
1px 3px 7px yellow;}

</style>
</head>

<body>
<form action="login.php" method="post" class="form">
<table width="400" align="center" border="1">
<tr>
<td colspan="5" align="center"><h2>Plz Login Owner Of The Site</h2></td>
</tr>
<tr>
<td>User Name:</td>
<td><input type="text" name="user_name" placeholder="Plz Enter User_Name" required></td>
</tr>
<tr>
<td>User Password:</td>
<td><input type="password" name="user_password" placeholder="Plz Enter User_Password" required></td>
</tr>
<tr>
<td align="center" colspan="5"><input type="submit" name="login" value="login"></td>
</tr>
</table> 
</form>
</body>
</html>
<?php
include("includes/connection.php");
if(isset ($_POST['login'])){
$user_name=mysql_real_escape_string($_POST['user_name']); 
$user_password=mysql_real_escape_string($_POST['user_password']);
$Security=md5($user_password);
$login_query="select*from login where user_name='$user_name' AND user_password='$user_password'";
$run=mysql_query($login_query);
if(mysql_num_rows($run)>0){
$_SESSION['user_name']=$user_name;
	echo "<script> window.open('index.php','_self')</script>"; 
} 
else{
	echo "<script>alert('user_name OR user_password incorrect')</script>"; 

}}
?>