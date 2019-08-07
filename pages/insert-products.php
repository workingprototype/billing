
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
//for getting product id
$query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="./shopping/admin/productimages/$productid";
	mkdir($dir);// directory creation for product images
	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"./shopping/admin/productimages/$productid/".$_FILES["productimage1"]["name"]);
$sql=mysqli_query($con,"insert into products(category,subCategory,uom,taxid,productName,productCompany,productPrice,hsnno,productDescription,shippingCharge,productAvailability,rewardsapplicable,
productImage1,productPriceBeforeDiscount) values('$category','$subcat','$uom','$taxid','$productname','$productcompany','$productprice','$hsnno','$productdescription','$productscharge','$productavailability','$rewardsapplicable
','$productimage1','$productpricebd')");
$_SESSION['msg']="Product Inserted Successfully !!";
logify("New Product: " . "$productname" . "  Added!" );


}
{
$content='
<script type="text/javascript" src="./shopping/admin/typeahead.js"></script>

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

<style>
.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background:white;color: black;}
.tt-menu { width:300px; }
ul.typeahead{margin:0px;padding:10px 0px;}
ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:black;}
ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
	text-decoration: none;
	background-color: #4c8bf5 ;
	outline: 0;
}
</style>

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
									<div class="alert alert-success" style="width:1000px;">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done! </strong>	'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
									</div> ';
}


 if(isset($_GET['del']))
{ 	$content.='
									<div class="alert alert-error" style="width:1000px;">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap! </strong> '.htmlentities($_SESSION['delmsg']).''.htmlentities($_SESSION['delmsg']="").'
									</div>';
 } 	$content.='

									<br />
<div style="width:1570px; margin:0 auto;">
			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<div class="control-group">
<label class="control-label" for="basicinput">Category</label>
<div class="controls">
<select name="category"  style="width:1000px;" class="form-control" onChange="getSubcat(this.value);"  required>
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
<select   name="subcategory"  style="width:1000px;"  id="subcategory" class="form-control" required>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"> Unit of Measurement</label>
<div class="controls">
<select name="uom"  style="width:1000px;" class="form-control" required>
<option value="">Select Unit of Measurement</option>
'; $query=mysqli_query($con,"select * from uom");
while($row=mysqli_fetch_array($query))
{

$content.='

<option value="'.$row['id'].'">'.$row['uom'].'</option> ';
 }
 	$content.=' }
 </select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput"> Tax Group Name</label>
<div class="controls">
<select name="taxid"  style="width:1000px;" class="form-control" required>
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
<input type="text"   style="width:1000px;" name="productName"  placeholder="Enter Product Name" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Company</label>
<div class="controls">
<input type="text" autocomplete="new-stuff-dontreadchrome" style="width:1000px;" id="productCompany" name="productCompany"  placeholder="Enter Product Company Name" class="form-control typeahead" required>
</div>
</div>
<script>
    $(document).ready(function () {
        $(\'#productCompany\').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "./shopping/admin/server.php",
					data: \'query=\' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
<div class="control-group">
<label class="control-label" for="basicinput">HSN Number:</label>
<div class="controls">
<input type="text" style="width:1000px;" name="hsnno"  placeholder="Enter HSN Number" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price Before Discount [MRP]</label>
<div class="controls">
<input type="text"  style="width:200px;"  name="productpricebd"  placeholder="Enter Product Price" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Price After Discount(Selling Price)</label>
<div class="controls">
<input type="text"  style="width:200px;"  name="productprice"  placeholder="Enter Product Price" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Description</label>
<div class="controls">
<textarea  name="productDescription" style="width:1000px;" placeholder="Enter Product Description" rows="6" class="form-control">
</textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Shipping Charge</label>
<div class="controls">
<input type="text" style="width:200px;"   name="productShippingcharge"  placeholder="Enter Shipping Charge" class="form-control" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Product Availability</label>
<div class="controls">
<select   name="productAvailability"  style="width:400px;" id="productAvailability" class="form-control">
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
<label class="control-label" for="basicinput">Product Image</label>
<div class="controls">
<input type="file"  style="width:1000px;" name="productimage1" id="productimage1" value="" class="form-control" required>
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
