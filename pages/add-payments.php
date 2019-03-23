
<?php
session_start();
include('./config/config.php');
{
// if(isset($_POST['submit']))
// {
// 	$category=$_POST['category'];
// 	$subcat=$_POST['subcategory'];
// $sql=mysqli_query($con,"insert into subcategory(categoryid,subcategory) values('$category','$subcat')");
// $_SESSION['msg']="SubCategory Created !!";
//
// }
//
// if(isset($_GET['del']))
// 		  {
// 		          mysqli_query($con,"delete from subcategory where id = '".$_GET['id']."'");
//                   $_SESSION['delmsg']="SubCategory deleted !!";
// 		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Payments</title>
	<link type="text/css" href="./shopping/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/css/theme.css" rel="stylesheet">
	<link type="text/css" href="./shopping/admin/images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script>
function duelist(a){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
			document.getElementById("due").innerHTML=this.responseText;
        }
    };
    xhttp.open("POST", "function/duelist ", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+a);
	duelist2(a);
}
function duelist2(a){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
			document.getElementById("dueshow").innerHTML=this.responseText;
        }
    };
    xhttp.open("POST", "function/duelist2", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+a);
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
								<h3>Add Payments</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />


			<form class="form-horizontal row-fluid" action="./function/record_payment" name="subcategory" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput">Payments</label>
<div class="controls">
<select  onchange="return duelist(this.value)" name="category" class="span8 tip" required>
<option value="">Select Debtor</option>
<?php $query=mysqli_query($con,"SELECT * FROM users ");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
<?php } ?>
</select>
</div>
</div>


<div class="control-group">
<div class="controls">

<div id='dueshow'>
</div>
</div>

</div><div class="control-group">
<label class="control-label" for="basicinput">Invoice Number: </label>
<div class="controls">

<select name='invoice' id='due'>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Payment Amount</label>
<div class="controls">
<input type="text" placeholder="Enter Payment Amount"  name="amountpaying" class="span8 tip" required>
</div>
</div>



	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn"style="border-radius: 3px;color: #fff;
		background-color: #5cb85c;
		border-color: #4cae4c;">Record Payment</button>
													<button onclick="location.href = './purchase';"> Return to Billing </button>
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
	<script src="./shopping/admin/scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>
