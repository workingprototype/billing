
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
  $taxname=$_POST['taxname'];
  $cgst=$_POST['cgst'];
  $sgst=$_POST['sgst'];
  $igst=$_POST['igst'];
  $cess=$_POST['cess'];
  $totalgst=$_POST['totalgst'];
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update taxinfo set taxname='$taxname',cgst='$cgst',
sgst='$sgst',igst='$igst',cess='$cess',
totalgst='$totalgst' where id='$id'");
$_SESSION['msg']=" Tax Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/addtax\"/>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Category</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tax info</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                	</div>
                  <div id="redirect" style="visibility: hidden" class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Redirecting To Add Tax!</strong>
                	</div>
                  <script type="text/javascript">
function showIt() {
  document.getElementById("redirect").style.visibility = "visible";
}
setTimeout("showIt()", 400); // after 1 sec
</script>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="taxinfo" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from taxinfo where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<form class="form-horizontal row-fluid" name="taxinfo" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput">Add Tax Group</label>
<div class="controls">
<input type="text" placeholder=" e.g: 14 % Special Tax"  name="taxname" value="<?php echo  htmlentities($row['taxname']);?>" class="span8 tip" required><br><br>
<div id="the-parent" class="input-prepend input-append">
<input type="text" onblur="findTotal()" placeholder="CGST"  name="cgst" class="span8 tip" value="<?php echo  htmlentities($row['cgst']);?>"  required><span class="add-on">%</span><br><br>
<input type="text" onblur="findTotal()" placeholder="SGST"  name="sgst" class="span8 tip"  value="<?php echo  htmlentities($row['sgst']);?>"  required> <span class="add-on">%</span>	<br><br>
<input type="text" onblur="findTotal()" placeholder="IGST"  name="igst" class="span8 tip"  value="<?php echo  htmlentities($row['igst']);?>"  required> <span class="add-on">%</span>	<br><br>
<input type="text" onblur="findTotal()" placeholder="CESS"  name="cess" class="span8 tip"  value="<?php echo  htmlentities($row['cess']);?>"  required> <span class="add-on">%</span>	<br><br>
<input type="text" id="total" placeholder="Total GST" name="totalgst" class="span8 tip" required value="<?php echo  htmlentities($row['totalgst']);?>" readonly> <span class="add-on">%</span>
</div>
</div>
</div>
<div class="control-group">
                <div class="controls">
                  <button type="submit" name="submit" class="btn" style="border-radius: 3px;color: #fff;
background-color: #5cb85c;
border-color: #4cae4c;">Update</button>

                </div>
              </div>

        </div>
      </div>

      <script type="text/javascript">
    window.findTotal = function() {
          var inputs = document.querySelectorAll('[name="cgst"], [name="sgst"], [name="igst"], [name="cess"]'),
              result = document.getElementById('total'),
              sum = 0;

          for(var i=0; i<inputs.length; i++) {
              var ip = inputs[i];

              if (ip.name && ip.name.indexOf("total") < 0) {
                  sum += parseInt(ip.value) || 0;
              }

          }

          result.value = sum;
      }
          </script>

									<?php } ?>


									</form>
							</div>
						</div>






					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->


	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
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
