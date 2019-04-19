
<?php
session_start();
include("./include/config.php");
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
  $taxname=mysqli_real_escape_string($con,$_POST['taxname']);
  $cgst=mysqli_real_escape_string($con,$_POST['cgst']);
  $sgst=mysqli_real_escape_string($con,$_POST['sgst']);
  $totalgst=mysqli_real_escape_string($con,$_POST['totalgst']);
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update taxinfo set taxname='$taxname',cgst='$cgst',
sgst='$sgst',totalgst='$totalgst' where id='$id'");
$_SESSION['msg']=" Tax Updated !!";
echo "<meta http-equiv=\"refresh\" content=\"1;url=/billing/addtax\"/>";
}



$content='
	<div class="wrapper">
		<div class="container">
			<div class="row">
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-body">
';
if(isset($_POST['submit']))
{ 	$content.='
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>'.htmlentities($_SESSION['msg']).''.htmlentities($_SESSION['msg']="").'
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
 } ';
}else{
$content.='

									<br />

			<form class="form-horizontal row-fluid" name="taxinfo" method="post" >
';
$id=intval($_GET['id']);
$query=mysqli_query($con,"select * from taxinfo where id='$id'");
while($row=mysqli_fetch_array($query))
{
  $content.='
<form class="form-horizontal row-fluid" name="taxinfo" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput">Add Tax Group</label>
<div class="controls">
<input type="text" placeholder=" e.g: 14 % Special Tax"  name="taxname" value="'.htmlentities($row['taxname']).'" class="span8 tip" required><br><br>
<div id="the-parent" class="input-prepend input-append">
  <label for="basicinput">Total GST</label>
<input type="text" id="total" onblur="findTotal()" placeholder="Total GST" name="totalgst" class="span8 tip" required value="'.htmlentities($row['totalgst']).'"> 
</br></br><label for="basicinput">CGST</label>
<input type="text" id="cgst" placeholder="CGST"  name="cgst" class="span8 tip" value="'.htmlentities($row['cgst']).'"  readonly required><br><br>
<label for="basicinput">SGST</label>
<input type="text" id="sgst" placeholder="SGST"  name="sgst" class="span8 tip"  value="'.htmlentities($row['sgst']).'"  readonly required> 	<br><br>
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
      num1 = document.getElementById("total").value;
      value = num1 / 2;
      {
        document.getElementById("cgst").value = value;
        document.getElementById("sgst").value = value;
      }
    }
          </script>
';

}
	$content.='


									</form>
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
 $page->var['title']="Edit Tax Info";
 $page->render();
 ?>
