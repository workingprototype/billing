
<?php
session_start();
include('include/config.php');
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
  $uom=mysqli_real_escape_string($con,$_POST['uom']);
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update uom set uom='$uom',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']=" UOM Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/adduom\"/>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Edit- UOM</title>
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
								<h3>Unit of Measurement</h3>
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
									<strong>Redirecting To Add UOM!</strong>
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
$query=mysqli_query($con,"select * from uom where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>
<form class="form-horizontal row-fluid" name="uom" method="post" >

  <div class="control-group">
  <label class="control-label" for="basicinput">Edit Unit of Measurement</label>
  <div class="controls">
  <input type="text" placeholder="Add Unit of Measurement"  name="uom" class="span8 tip" required value="<?php echo  htmlentities($row['uom']);?>">
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
