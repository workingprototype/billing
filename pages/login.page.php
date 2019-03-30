<?php
require_once "./classes/page-class.php";
require_once "./classes/sidebar-class.php";
require_once "./classes/top-navigation-class.php";
require_once "./classes/footer-class.php";
$page = new Page;
$page->var['title']="Login";
session_start();
error_reporting(0);
include("config/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="login";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
$page->var['content']="
<div align='center' style='position:absolute; top:50%; left:50%; background:#ccc; padding: 30px; border-radius:5px; width: 350px; height:180px; margin-left:-175px; margin-top:-90px'>
	<form class='form-vertical' method='post'>
    <label>Username: </label>
    <input type='text' id='inputEmail' name='username' placeholder='Username'><br><br>
    <label>Password: </label>
    <input type='password' id='inputPassword' name='password' placeholder='Password'><br><br>
    <button type='submit' name='submit' class='btn btn-primary'>Login</button>
		</form>
</div>";
$page->render();

?>
