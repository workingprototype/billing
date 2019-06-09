
<?php
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
	echo '<script language="javascript">';
	echo 'alert("Old Password entered is wrong!")';
	echo '</script>';
}
}

$content='
	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
							</div>
							<script type="text/javascript">
						function valid()
						{
						if(document.chngpwd.password.value=="")
						{
						alert("Current Password Filed is Empty !!");
						document.chngpwd.password.focus();
						return false;
						}
						else if(document.chngpwd.newpassword.value=="")
						{
						alert("New Password Filed is Empty !!");
						document.chngpwd.newpassword.focus();
						return false;
						}
						else if(document.chngpwd.confirmpassword.value=="")
						{
						alert("Confirm Password Filed is Empty !!");
						document.chngpwd.confirmpassword.focus();
						return false;
						}
						else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
						{
						alert("Password and Confirm Password Field do not match  !!");
						document.chngpwd.confirmpassword.focus();
						return false;
						}
						return true;
						}
						</script>
							<div class="module-body">';

 if(isset($_POST['submit']))
{ 	$content.='
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="warning">×</button>
										'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
										</div>';
 } 	$content.='
									<br />

			<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">

<div class="control-group">
<label class="control-label" for="basicinput">Current Password</label>
<div class="controls">
<input type="password" style="width:1000px;" placeholder="Enter your current Password"  name="password" class="form-control" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">New Password</label>
<div class="controls">
<input type="password" style="width:1000px;" placeholder="Enter your new Password"  name="newpassword" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Repeat New Password</label>
<div class="controls">
<input type="password" style="width:1000px;" placeholder="Enter your new Password again"  name="confirmpassword" class="form-control" required>
</div>
</div>
</br>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>



					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



	<script src="./shopping/admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
';
 }
 require_once "./classes/page-class.php";
 require_once "./classes/sidebar-class.php";
 require_once "./classes/top-navigation-class.php";
 require_once "./classes/footer-class.php";
 $page = new Page;
 $sidebar = new Sidebar;
 $footer = new Footer;
 $navbar = new TopNav;
 $page->var['navbar']=$navbar->echo();
 $page->var['sidebar']=$sidebar->echo();
 $page->var['footer']=$footer->echo();
 $page->var['content']=$content;
 $page->var['title']="Change Admin Password";
 $page->render();
 ?>
