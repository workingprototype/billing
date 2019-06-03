<?php
include('config/config.php');
{
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
$page->var['title']="Create New Executive Account";

session_start();
error_reporting(0);
include('./config/config.php');
// Code Executive Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$contactno=$_POST['contactno'];
$altcontactno=$_POST['altcontactno'];
$Address=$_POST['Address'];
$district=$_POST['district'];
$state=$_POST['state'];
$pan=$_POST['pan'];
$aadharno=$_POST['aadharno'];
$birthdate=$_POST['birthdate'];
$email=$_POST['emailid'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into executive(name,contactno,altcontactno,Address,district,
billingState,pan,aadharno,birthdate,email,password) values('$name','$contactno','$altcontactno','$Address','$district','$state','$pan','$aadharno'
,'$birthdate','$email','$password')");
if($query)
{
	echo "<script>alert('Executive successfully registered');</script>";
}
else{
echo "<script>alert('Not registered. Something went wrong.');</script>";
}
}
$page->var['content']='

<script type="text/javascript">
function valid()
{
 if(document.register.password.value!= document.register.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.register.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "./shopping/exec_check_availability.php",
data:\'email=\'+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<!-- create a new account -->
<div  class="col-md-6 col-sm-6">
	<form  class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
    <span style="color:red;" >'.htmlentities($_SESSION['errmsg']).htmlentities($_SESSION['errmsg']="").'
	  </span>
		<hr class="my-auto flex-grow-1">
		<div class="px-4">Basic Details: </div>
				<hr class="my-auto flex-grow-1">
<div class="form-group">
	    	<label class="info-title" for="fullname">Full Name <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" required="required">
</div>


<div class="form-group">
	    	<label class="info-title" for="contactno">Contact No. <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" required >
</div>

<div class="form-group">
	    	<label class="info-title" for="altcontactno">Alt Contact No. </label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="altcontactno" name="altcontactno" maxlength="10">
</div>

<div class="form-group">
				    	<label class="info-title" for="shippingAddress">Address <span>*</span></label>
				    	<textarea class="form-control unicase-form-control text-input" id="Address" name="Address" maxlength="300" required >
							</textarea>
</div>
<div class="form-group">
	    	<label class="info-title" for="district">District <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="district" name="district" required="required">
</div>

<div class="form-group">
	    	<label class="info-title" for="state">State <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="state" name="state" required="required">
</div>

<div class="form-group">
	    	<label class="info-title" for="pan">PAN <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="pan" name="pan" required="required">
</div>
<div class="form-group">
	    	<label class="info-title" for="aadharno">Aadhar No: <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="aadharno" name="aadharno" required="required">
</div>
<div class="form-group">
	    	<label class="info-title" for="birthdate">Date of Birth </label>
	    	<input type="date" class="form-control unicase-form-control text-input" id="birthdate" name="birthdate">
</div>

<hr class="my-auto flex-grow-1">
<div class="px-4">Login Details for App: </div>
		<hr class="my-auto flex-grow-1">
<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
</div>


<div class="form-group">
	    	<label class="info-title" for="password">Password. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="password" name="password"  required >
</div>

<div class="form-group">
	    	<label class="info-title" for="confirmpassword">Confirm Password. <span>*</span></label>
	    	<input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" required >
</div>


	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Register Executive</button>
	</form>

</div>
';

$page->render();
}
?>
