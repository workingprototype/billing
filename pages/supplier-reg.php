<?php
error_reporting(0);
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
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
$page->var['title']="Create New Supplier Account";

session_start();
error_reporting(0);
include('./config/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
$productcompany=$_POST['productcompany'];
$firmname=$_POST['firmname'];
$email=$_POST['emailid'];
$name=$_POST['fullname'];
$contactno=$_POST['contactno'];
$altcontactno=$_POST['altcontactno'];
$shippingAddress=$_POST['shippingAddress'];
$billingAddress=$_POST['billingAddress'];
$district=$_POST['district'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$gstin=$_POST['gstin'];
$fssai=$_POST['fssai'];
$pan=$_POST['pan'];
$aadharno=$_POST['aadharno'];
$execname=$_POST['execname'];
$execmobile=$_POST['execmobile'];
$bankname=$_POST['bankname'];
$bankcity=$_POST['bankcity'];
$accountname=$_POST['accountname'];
$accountnumber=$_POST['accountnumber'];
$ifsccode=$_POST['ifsccode'];
$query=mysqli_query($con,"insert into supplier(productcompany,firmname,email,name,contactno,altcontactno,shippingAddress,billingAddress,
district,billingState,billingPincode,gstin,fssai,pan,aadharno,execname,execmobile,bankname,bankcity,accountname,accountnumber,ifsccode)
 values('$productcompany','$firmname','$email','$name','$contactno','$altcontactno','$shippingAddress','$billingAddress'
 ,'$district','$state','$pincode','$gstin','$fssai','$pan','$aadharno'
 ,'$execname','$execmobile','$bankname','$bankcity','$accountname','$accountnumber','$ifsccode')");
if($query)
{
	echo "<script>alert('Supplier successfully registered');</script>";
}
else{
echo "<script>alert('Not registered. Something went wrong.');</script>";
}
}
$page->var['content']='

<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "./shopping/check_availability.php",
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
<hr class="my-auto flex-grow-1">
<div class="px-4">Basic Details: </div>
		<hr class="my-auto flex-grow-1">
	<form  class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();">
    <span style="color:red;" >'.htmlentities($_SESSION['errmsg']).htmlentities($_SESSION['errmsg']="").'
	  </span>

		<div class="form-group">
			    	<label class="info-title" for="productcompany">Product Company <span>*</span></label>
			    	<input type="text" class="form-control unicase-form-control text-input" id="productcompany" name="productcompany" required="required">
		</div>
		<div class="form-group">
			    	<label class="info-title" for="firmname">Firm Name <span>*</span></label>
			    	<input type="text" class="form-control unicase-form-control text-input" id="firmname" name="firmname" required="required">
		</div>

<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="email" onBlur="userAvailability()" name="emailid" required >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
</div>

<div class="form-group">
	    	<label class="info-title" for="fullname">Contact Name [Full Name]<span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" required="required">
</div>

<div class="form-group">
	    	<label class="info-title" for="contactno">Contact No. <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" maxlength="10" required >
</div>
<div class="form-group">
      	    	<label class="info-title" for="altcontactno">Alternative Contact No. <span>*</span></label>
      	    	<input type="text" class="form-control unicase-form-control text-input" id="altcontactno" name="altcontactno" maxlength="10">
</div>
<div class="form-group">
				    	<label class="info-title" for="shippingAddress">Shipping Address <span>*</span></label>
				    	<textarea class="form-control unicase-form-control text-input" id="shippingAddress" name="shippingAddress" maxlength="300" required >
							</textarea>
</div>
<div class="form-group">
				    	<label class="info-title" for="billingAddress">Contact / Billing Address <span>*</span></label>
				    	<textarea class="form-control unicase-form-control text-input" id="billingAddress" name="billingAddress" maxlength="300" required >
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
	    	<label class="info-title" for="pincode">Pin Code: <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="pincode" name="pincode" required="required">
</div>

<div class="form-group">
	    	<label class="info-title" for="gstin">GSTIN: <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="gstin" name="gstin" required="required">
</div>

<div class="form-group">
	    	<label class="info-title" for="fssai">FSSAI </label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="fssai" name="fssai">
</div>

<div class="form-group">
	    	<label class="info-title" for="pan">PAN <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="pan" name="pan" required="required">
</div>

<div class="form-group">
	    	<label class="info-title" for="aadharno">Aadhar No: <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="aadharno" name="aadharno" required="required">
</div>
<!-- Executive Details -->
    <hr class="my-auto flex-grow-1">
    <div class="px-4">Partner Details: </div>
		    <hr class="my-auto flex-grow-1">
				<div class="form-group">
	    	<label class="info-title" for="execname">Executive Name: <span>*</span></label>
	    	<input type="text" class="form-control unicase-form-control text-input" id="execname" name="execname" required="required">
</div>
<div class="form-group">
<label class="info-title" for="execmobile">Executive Mobile: <span>*</span></label>
<input type="text" class="form-control unicase-form-control text-input" id="execmobile" name="execmobile" required="required">
</div>
<hr class="my-auto flex-grow-1">
<!-- Supplier Banking Info -->

<hr class="my-auto flex-grow-1">
<div class="px-4">Banking Information: </div>
		<hr class="my-auto flex-grow-1">
		<div class="form-group">
		<label class="info-title" for="bankname">Bank Name: <span>*</span></label>
		<input type="text" class="form-control unicase-form-control text-input" id="bankname" name="bankname" required="required">
</div>
<div class="form-group">
<label class="info-title" for="bankcity">Bank City: <span>*</span></label>
<input type="text" class="form-control unicase-form-control text-input" id="bankcity" name="bankcity" required="required">
</div>
<div class="form-group">
<label class="info-title" for="accountname">Account Name: <span>*</span></label>
<input type="text" class="form-control unicase-form-control text-input" id="accountname" name="accountname" required="required">
</div>
<div class="form-group">
<label class="info-title" for="accountnumber">Account Number: <span>*</span></label>
<input type="text" class="form-control unicase-form-control text-input" id="accountnumber" name="accountnumber" required="required">
</div>
<div class="form-group">
<label class="info-title" for="ifsccode">IFSC Code: <span>*</span></label>
<input type="text" class="form-control unicase-form-control text-input" id="ifsccode" name="ifsccode" required="required">
</div>
<hr class="my-auto flex-grow-1">


	<button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button" id="submit">Register Supplier</button>
	</form>

</div>
';

$page->render();
}
?>
