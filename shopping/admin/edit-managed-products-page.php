
<?php

include('include/config.php');
{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$category=mysqli_real_escape_string($con,$_POST['category']);
	$subcat=mysqli_real_escape_string($con,$_POST['subcategory']);
	$productname=mysqli_real_escape_string($con,$_POST['productName']);
	$productcompany=mysqli_real_escape_string($con,$_POST['productCompany']);
	$productprice=mysqli_real_escape_string($con,$_POST['productprice']);
	$productpricebd=mysqli_real_escape_string($con,$_POST['productpricebd']);
	$productdescription=mysqli_real_escape_string($con,$_POST['productDescription']);
	$productscharge=mysqli_real_escape_string($con,$_POST['productShippingcharge']);
	$productavailability=mysqli_real_escape_string($con,$_POST['productAvailability']);
	$taxid=mysqli_real_escape_string($con,$_POST['taxid']);
	$uom=mysqli_real_escape_string($con,$_POST['uom']);
	$hsnno=mysqli_real_escape_string($con,$_POST['hsnno']);
	$rewardsapplicable=mysqli_real_escape_string($con,$_POST['rewardsapplicable']);

$sql=mysqli_query($con,"update  products set category='$category',subCategory='$subcat',productName='$productname',productCompany='$productcompany',productPrice='$productprice',productDescription='$productdescription',shippingCharge='$productscharge',productAvailability='$productavailability',productPriceBeforeDiscount='$productpricebd',uom='$uom', taxid='$taxid', hsnno='$hsnno', rewardsapplicable='$rewardsapplicable' where id='$pid' ");
$_SESSION['msg']="Product Updated Successfully !!";
echo "<meta http-equiv=\"refresh\" content=\"4;url=/billing/manageproducts\"/>";
}


$content='
   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:\'cat_id=\'+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>


</head>
<body>

	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Edit Products</h3>
							</div>
							<div class="module-body">
							';
							if(isset($_POST['submit']))
							{ 	$content.='
																<div class="alert alert-success">
																	<button type="button" class="close" data-dismiss="alert">×</button>
																<strong>Well done!</strong>	'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
																</div>

																<div id="redirect" style="visibility: hidden" class="alert alert-info">
																	<button type="button" class="close" data-dismiss="alert">×</button>
																<strong>Redirecting To Manage Products!</strong>
																</div>
																<script type="text/javascript">
																function showIt() {
																document.getElementById("redirect").style.visibility = "visible";
																}
																setTimeout("showIt()", 100); // after 2 sec
																</script>
															';
							}


							 if(isset($_GET['del']))
							{ 	$content.='
																<div class="alert alert-error">
																	<button type="button" class="close" data-dismiss="alert">×</button>
																<strong>Oh snap!</strong> '.htmlentities($_SESSION['delmsg']).''.htmlentities($_SESSION['delmsg']="").'
																</div>

																';
							 } 	$content.='

																<br />
<div style="width:1570px; margin:0 auto;">
			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
';

$query=mysqli_query($con,"select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid, uom.id as uomid, uom.uom as uomname, taxinfo.id as taxinfoid, taxinfo.taxname as taxinfoname from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory join uom on uom.id = products.uom join taxinfo on taxinfo.id = products.taxid where products.id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{

$content.='


<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" style="width:1000px;" class="form-control" onChange="getSubcat(this.value);"  required>
<option value="'.htmlentities($row['cid']).'">'.htmlentities($row['catname']).'</option>';
$query=mysqli_query($con,"select * from category");
while($rw=mysqli_fetch_array($query))
{
	if($row['catname']==$rw['categoryName'])
	{
		continue;
	}
	else{
$content.='<option value="'. $rw['id'].'">'.$rw['categoryName'].'</option>';
 }}
$content.='</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Sub Category</label>
<div class="controls">

<select  style="width:1000px;" name="subcategory"  id="subcategory" class="form-control" required>
<option value="'.htmlentities($row['subcatid']).'">'.htmlentities($row['subcatname']).'</option>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Unit of Measurement : <label>'.htmlentities($row['uomname']).'</label></br></label>
<div class="controls">
<select  style="width:1000px;" name="uom"  id="uom" class="form-control" required>';
 $query=mysqli_query($con,"select * from uom");
while($rw=mysqli_fetch_array($query))
{
$content.='<option value="'.$rw['id'].'">'.$rw['uom'].'</option>';
}
$content.='
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">GST Group  : <label>'.htmlentities($row['taxinfoname']).'</label></br></label>
<div class="controls">

<select style="width:1000px;"  name="taxid"  id="taxid" class="form-control" required> ';
$query=mysqli_query($con,"select * from taxinfo");
while($rw=mysqli_fetch_array($query))
{
	if($row['id']==$rw['taxname'])
	{
		continue;
	}
	else{

$content.='
<option value="'.$rw['id'].'">'.$rw['taxname'].'</option> ';
}}
$content.='
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"  style="width:1000px;" name="productName"  placeholder="Enter Product Name" value="'.htmlentities($row['productName']).'" class="form-control" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Company</label>
<div class="controls">
<input type="text" style="width:1000px;"   name="productCompany"  placeholder="Enter Product Company Name" value="'.htmlentities($row['productCompany']).'" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">hsnno</label>
<div class="controls">
<input type="text"  style="width:1000px;"  name="hsnno"  placeholder="Enter HSN No." value="'.htmlentities($row['hsnno']).'" class="form-control" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Product Price Before Discount</label>
<div class="controls">
<input type="text"    style="width:200px;"   name="productpricebd"  placeholder="Enter Product Price" value="'.htmlentities($row['productPriceBeforeDiscount']).'"  class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price</label>
<div class="controls">
<input type="text"    style="width:200px;"   name="productprice"  placeholder="Enter Product Price" value="'.htmlentities($row['productPrice']).'" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Description</label>
<div class="controls">
<textarea  name="productDescription" style="" placeholder="Enter Product Description" rows="6" class="form-control">
'.htmlentities($row['productDescription']).'
</textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Shipping Charge</label>
<div class="controls">
<input type="text"    style="width:200px;"   name="productShippingcharge"  placeholder="Enter Product Shipping Charge" value="'.htmlentities($row['shippingCharge']).'" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select  style="width:400px;"  name="productAvailability"  id="productAvailability" class="form-control">
<option value="'.htmlentities($row['productAvailability']).'">'.htmlentities($row['productAvailability']).'</option>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
</select>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Rewards Applicable?</label>
<div class="controls">
<input type="radio" name="rewardsapplicable" value="0" checked> No<br>
<input type="radio" name="rewardsapplicable" value="1"> Yes<br>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Image 1</label>
<div class="controls">
<img src="productimages/'.htmlentities($pid).'/'.htmlentities($row['productImage1']).'" width="100" height="100"> <a href="update-image2.php?id='.$row['id'].'"><strong>Change Image</strong></a>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Image 2</label>
<div class="controls">
<img src="productimages/'.htmlentities($pid).'/'.htmlentities($row['productImage2']).'" width="100" height="100"> <a href="update-image2.php?id='.$row['id'].'">Change Image</a>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image 3</label>
<div class="controls">
<img src="productimages/'.htmlentities($pid).'/'.htmlentities($row['productImage3']).'" width="100" height="100"> <a href="update-image2.php?id='.$row['id'].'">Change Image</a>
</div>
</div>';
}
$content.='
	<div class="control-group">
											<div class="controls"> </br>
												<button type="submit" name="submit"  style="width:100px; background-color: black;color: white;" class="btn">Update</button>
											</div>

									</form>
							</div>
						</div>





						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div>

			<link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
		<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="scripts/datatables/jquery.dataTables.js"></script>
		<script>
			$(document).ready(function() {
				$(\'.datatable-1\').dataTable();
				$(\'.dataTables_paginate\').addClass("btn-group datatable-pagination");
				$(\'.dataTables_paginate > a\').wrapInner(\'<span />\');
				$(\'.dataTables_paginate > a:first-child\').append(\'<i class="icon-chevron-left shaded"></i>\');
				$(\'.dataTables_paginate > a:last-child\').append(\'<i class="icon-chevron-right shaded"></i>\');
			} );
		</script>
		';
		}
		require_once "../../classes/notifications.php";
		require_once "../../classes/page-class.php";
	  require_once "../../classes/sidebar-class.php";
	  require_once "../../classes/top-navigation-class.php";
	  require_once "../../classes/footer-class.php";
		$page = new Page;
		$sidebar = new Sidebar;
		$footer = new Footer;
		$navbar = new TopNav;
		$page->var['navbar']=$navbar->echo();
		$page->var['sidebar']=$sidebar->echo();
		$page->var['footer']=$footer->echo();
		$page->var['content']=$content;
		$page->var['title']="Manage Products";
		$page->render();
		?>
