
<?php
session_start();
include('config/config.php');

if(isset($_POST['submit']))
{
	$category=mysqli_real_escape_string($con,$_POST['category']);
	$subcat=mysqli_real_escape_string($con,$_POST['subcategory']);
	$uom=mysqli_real_escape_string($con,$_POST['uom']);
	$taxid=mysqli_real_escape_string($con,$_POST['taxid']);
	$productname=mysqli_real_escape_string($con,$_POST['productName']);
	$productcompany=mysqli_real_escape_string($con,$_POST['productCompany']);
	$productprice=mysqli_real_escape_string($con,$_POST['productprice']);
	$hsnno=mysqli_real_escape_string($con,$_POST['hsnno']);
	$productpricebd=mysqli_real_escape_string($con,$_POST['productpricebd']);
	$productdescription=mysqli_real_escape_string($con,$_POST['productDescription']);
	$productscharge=mysqli_real_escape_string($con,$_POST['productShippingcharge']);
	$productavailability=mysqli_real_escape_string($con,$_POST['productAvailability']);
	$rewardsapplicable=mysqli_real_escape_string($con,$_POST['rewardsapplicable']);
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
//for getting product id
$query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="./shopping/admin/productimages/$productid";
	mkdir($dir);// directory creation for product images
	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"./shopping/admin/productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"./shopping/admin/productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"./shopping/admin/productimages/$productid/".$_FILES["productimage3"]["name"]);
$sql=mysqli_query($con,"insert into products(category,subCategory,uom,taxid,productName,productCompany,productPrice,hsnno,productDescription,shippingCharge,productAvailability,rewardsapplicable,
productImage1,productImage2,productImage3,productPriceBeforeDiscount) values('$category','$subcat','$uom','$taxid','$productname','$productcompany','$productprice','$hsnno','$productdescription','$productscharge','$productavailability','$rewardsapplicable
','$productimage1','$productimage2','$productimage3','$productpricebd')");
$_SESSION['msg']="Product Inserted Successfully !!";
logify("New Product Added");


}

$content='



   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "./shopping/admin/get_subcat.php",
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



	<div class="wrapper">
		<div class="container">
			<div class="row">

			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">

							</div>
							<div class="module-body">
';
if(isset($_POST['submit']))
{ 	$content.='
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
									</div> ';
}


 if(isset($_GET['del']))
{ 	$content.='
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> '.htmlentities($_SESSION['delmsg']).''.htmlentities($_SESSION['delmsg']="").'
									</div>';
 } 	$content.='

									<br />
<div style="width:1570px; margin:0 auto;">
			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Category</option> ';
 $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{
	$content.='
<option value="'.$row['id'].'">'.$row['categoryName'].'</option>';
} 	$content.='
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Sub Category</label>
<div class="controls">
<select   name="subcategory"  id="subcategory" class="span8 tip" required>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"> Unit of Measurement</label>
<div class="controls">
<select name="uom" class="span8 tip" required>
<option value="">Select Unit of Measurement</option>
'; $query=mysqli_query($con,"select * from uom");
while($row=mysqli_fetch_array($query))
{

$content.='

<option value="'.$row['id'].'">'.$row['uom'].'</option>
 }
 </select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"> Tax Group Name</label>
<div class="controls">
<select name="taxid" class="span8 tip" required>
<option value="">Select Tax Group</option>
'; $query=mysqli_query($con,"select * from taxinfo");
while($row=mysqli_fetch_array($query))
{
	$content.='<option value="'.$row['id'].'">'.$row['taxname'].'</option>';
}
	$content.='
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Name</label>
<div class="controls">
<input type="text"   style="width:200px;" name="productName"  placeholder="Enter Product Name" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Company</label>
<div class="controls">
<input type="text"  style="width:200px;"  name="productCompany"  placeholder="Enter Product Company Name" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">HSN Number:</label>
<div class="controls">
<input type="text"  style="width:200px;"  name="hsnno"  placeholder="Enter HSN Number" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price Before Discount</label>
<div class="controls">
<input type="text"  style="width:200px;"  name="productpricebd"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price After Discount(Selling Price)</label>
<div class="controls">
<input type="text"  style="width:200px;"  name="productprice"  placeholder="Enter Product Price" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Description</label>
<div class="controls">
<textarea  name="productDescription" style="width:1000px;" placeholder="Enter Product Description" rows="6" class="span8 tip">
</textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Shipping Charge</label>
<div class="controls">
<input type="text" style="width:200px;"   name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select   name="productAvailability"  id="productAvailability" class="span8 tip">
<option value="">Select</option>
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
<label class="control-label" for="basicinput">Product Image1</label>
<div class="controls">
<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Product Image2</label>
<div class="controls">
<input type="file" name="productimage2"  class="span8 tip" required>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Product Image3</label>
<div class="controls">
<input type="file" name="productimage3"  class="span8 tip">
</div>
</div>
</br>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn" style="border-radius: 3px;color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;">Insert</button>
											</div>
										</div>
                    </form>
            	</div>
						</div>

</div>



					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
	<link type="text/css" href="./shopping/admin/images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

	<link type="text/css" href="./shopping/admin/images/icons/css/font-awesome.css" rel="stylesheet">
	<script src="./shopping/admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="./shopping/admin/scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$(\'.datatable-1\').dataTable();
			$(\'.dataTables_paginate\').addClass("btn-group datatable-pagination");
			$(\'.dataTables_paginate > a\').wrapInner(\'<span />\');
			$(\'.dataTables_paginate > a:first-child\').append(\'<i class="icon-chevron-left shaded"></i>\');
			$(\'.dataTables_paginate > a:last-child\').append(\'<i class="icon-chevron-right shaded"></i>\');
		} );
	</script>';
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
 $page->var['title']="Insert Products";
 $page->render();
 ?>
