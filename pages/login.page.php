<?php
require_once "./classes/page-class.php";
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
header("location:".APP_ROOT."$extra");
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="login";
header("location:".APP_ROOT."$extra");
}
}
$page->var['content']="
<div align='center' style='position:absolute; top:50%; left:50%; background:#ccc; padding: 30px; border-radius:5px; width: 350px; height:180px; margin-left:-175px; margin-top:-90px'>
	<form class='form-vertical' method='post'>
		<span style='color:red;' >".htmlentities($_SESSION['errmsg']).htmlentities($_SESSION['errmsg']="")." </span>
    <input type='text' id='inputEmail' name='username' placeholder='Username'><br><br>
    <input type='password' id='inputPassword' name='password' placeholder='Password'><br><br>
    <button type='submit' name='submit' class='btn btn-primary'>Login</button>
		</br></br></br></br>
		<p> Demo Credentials: </p>
		<p>Email: admin </p>
		<p>Password: Test@123 </p>

		</form>
</div>";
$page->render();

?>
