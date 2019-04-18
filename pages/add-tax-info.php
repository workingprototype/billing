
<?php
session_start();
include('./config/config.php');
{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$taxname=mysqli_real_escape_string($con,$_POST['taxname']);
$cgst=mysqli_real_escape_string($con,$_POST['cgst']);
$sgst=mysqli_real_escape_string($con,$_POST['sgst']);
$totalgst=mysqli_real_escape_string($con,$_POST['totalgst']);
$sql=mysqli_query($con,"insert into taxinfo(taxname,cgst,sgst,totalgst) values('$taxname','$cgst','$sgst','$totalgst')");
$_SESSION['msg']="Tax Group Added!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from taxinfo where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Tax deleted !!";
		  }

$content='


	<div class="wrapper">
		<div class="container">
			<div class="row">

			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tax Group</h3>
							</div>
							<div class="module-body">
';
if(isset($_POST['submit']))
{ 	$content.='
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>		'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
									</div>';
 }

if(isset($_GET['del']))
{
	$content.='										<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Oh snap!</strong> 	'.htmlentities($_SESSION['delmsg']).''.htmlentities($_SESSION['delmsg']="").'
									</div> ';
 }
$content.='
									<br />

			<form class="form-horizontal row-fluid" name="taxinfo" method="post" >

<div class="control-group"><div style="width:800px; margin:0 auto;">
<label class="control-label" for="basicinput">Add Tax Group</label>
<div class="controls">
<input type="text" placeholder=" e.g: 14 % Special Tax" style="width:150px;" name="taxname" class="span8 tip" required><br><br>
<div id="the-parent" class="input-prepend input-append">

	<label for="basicinput">Total GST</label> <br>	<input type="text" style="width:100px;"  id="total" onblur="findTotal()" placeholder="Total GST"  name="totalgst" class="span8 tip" required value="0"> <span class="add-on">%</span>
</br></br>

<label for="basicinput">CGST</label> <br><input type="text" style="width:100px;"  placeholder="CGST" id="cgst"  name="cgst" class="span8 tip" value="0"  required readonly><span class="add-on">%</span><br><br>

<label for="basicinput">SGST</label> <br><input type="text" style="width:100px;"  placeholder="SGST" id="sgst" name="sgst" class="span8 tip"  value="0"  required readonly> <span class="add-on">%</span>	<br><br>
</div></div>
</div>
</div>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn" style="border-radius: 3px;color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;">Add</button>
											</div>
										</div>
									</form>
							</div>
						</div>

						<script type="text/javascript">
					window.findTotal = function() {
						num1 = document.getElementById("total").value;
						value = num1 / 2;{
						document.getElementById("cgst").value = value;
						document.getElementById("sgst").value = value;
					}
						}
						    </script>
 <div class="module">
							<div class="module-head">
								<h3>Manage Tax Groups</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Tax Name</th>
											<th>CGST (%)</th>
											<th>SGST (%)</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';

 $query=mysqli_query($con,"select * from taxinfo");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
	$content.='
										<tr>
											<td>'.htmlentities($cnt).'</td>
											<td>'.htmlentities($row['taxname']).'</td>
											<td>'.htmlentities($row['cgst']).'</td>
											<td>'.htmlentities($row['sgst']).'</td>
											<td>
											<a href="./shopping/admin/edit-tax-info.php?id='.$row['id'].'" ><i class="icon-edit"></i></a>
											<a href="./shopping/admin/delete-tax.php?id='.$row['id'].'&del=delete" onClick="return confirm(\'Are you sure you want to delete?\')"><i class="icon-remove-sign"></i></a></td>
										</tr>';
										$cnt=$cnt+1; }
										$content.='
								</table>
							</div>
						</div>



					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->
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
 $page->var['title']="Add Tax Info";
 $page->render();
 ?>
