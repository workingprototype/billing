<?php
session_start();
error_reporting(0);
include('config.php');

// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="my-cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host/billing/shopping/my-cart.php");
exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host/billing/shopping/login.php");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>FMCG Shopping Portal | Sign In </title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="/billing/shopping/assets/css/bootstrap.min.css">

	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="/billing/shopping/assets/css/main.css">
	    <link rel="stylesheet" href="/billing/shopping/assets/css/green.css">
	    <link rel="stylesheet" href="/billing/shopping/assets/css/owl.carousel.css">
		<link rel="stylesheet" href="/billing/shopping/assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="/billing/shopping/assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="/billing/shopping/assets/css/animate.min.css">
		<link rel="stylesheet" href="/billing/shopping/assets/css/rateit.css">
		<link rel="stylesheet" href="/billing/shopping/assets/css/bootstrap-select.min.css">

		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="/billing/shopping/assets/css/font-awesome.min.css">

        <!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

		<!-- Favicon -->
		<link rel="shortcut icon" href="/billing/shopping/assets/images/favicon.ico">

<script>
function getUser(val) {
$.ajax({
type: "POST",
url: "get_user.php",
data:'user_id='+val,
success: function(data){
 $("#email").html(data);
}
});
}

</script>


	</head>
    <body class="cnt-home">



		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('/billing/shopping/includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('/billing/shopping/includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('/billing/shopping/includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Authentication</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="sign-in-page inner-bottom-sm">
			<div class="row">
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">sign in</h4>
	<p class="">Login as a Retailer and place orders</p>
	<form class="register-form outer-top-xs" method="post">
	<span style="color:red;" >
<?php
echo htmlentities($_SESSION['errmsg']);
?>
<?php
echo htmlentities($_SESSION['errmsg']="");
?>
	</span>
  <div class="control-group">
  <label class="control-label" for="basicinput">Retailer</label>
  <div class="controls">
  <select name="users" class="span8 tip" onChange="getUser(this.value);"  required>
  <option value="">Select Retailer</option>
  <?php $query=mysqli_query($con,"select * from users");
  while($row=mysqli_fetch_array($query))
  {?>

  <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
  <?php } ?>
  </select>
  </div>
  </div>
</br>


  <div class="control-group" hidden>
  <label class="control-label" for="basicinput">Email</label>
  <div class="controls">
  <select   name="email"  id="email" class="span8 tip" required>
  </select>
  </div>
  </div></br>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button" name="login">Login</button>
	</form>
</div>

<!-- Sign-in -->
			</div><!-- /.row -->
		</div>
<?php include('/billing/shopping/includes/brands-slider.php');?>
</div>
</div>
<?php include('/billing/shopping/includes/footer.php');?>
	<script src="/billing/shopping/assets/js/jquery-1.11.1.min.js"></script>

	<script src="/billing/shopping/assets/js/bootstrap.min.js"></script>

	<script src="/billing/shopping/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="/billing/shopping/assets/js/owl.carousel.min.js"></script>

	<script src="/billing/shopping/assets/js/echo.min.js"></script>
	<script src="/billing/shopping/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="/billing/shopping/assets/js/bootstrap-slider.min.js"></script>
    <script src="/billing/shopping/assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="/billing/shopping/assets/js/lightbox.min.js"></script>
    <script src="/billing/shopping/assets/js/bootstrap-select.min.js"></script>
    <script src="/billing/shopping/assets/js/wow.min.js"></script>
	<script src="/billing/shopping/assets/js/scripts.js"></script>



</body>
</html>