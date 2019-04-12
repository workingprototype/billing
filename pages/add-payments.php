
<?php

$content="
<script>
function duelist(a){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
			document.getElementById(\"due\").innerHTML=this.responseText;
        }
    };
    xhttp.open(\"POST\", \"function/duelist \", true);
    xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
    xhttp.send(\"id=\"+a);
	duelist2(a);
}
function duelist2(a){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
			document.getElementById(\"dueshow\").innerHTML=this.responseText;
        }
    };
    xhttp.open(\"POST\", \"function/duelist2\", true);
    xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
    xhttp.send(\"id=\"+a);
}
</script>

			<div style='margin:20px;' class=\"row\">

			<div class=\"span9\">
					<div class=\"content\">

						<div class=\"module\">
							<div class=\"module-body\">";

if(isset($_POST['submit']))
{
 $content.="<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
									<strong>Well done!</strong>";
$content.=htmlentities($_SESSION['msg']);
$content.=htmlentities($_SESSION['msg']="");

$content.="</div>";
}
if(isset($_GET['del']))
{
	$content.= "<div class=\"alert alert-error\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
	<strong>Oh snap!</strong> ".$_SESSION['delmsg'];
	$_SESSION['delmsg']="";
	$content.=	"</div>";
}
$content.="<br />


			<form class=\"form-horizontal row-fluid\" action=\"./function/record_payment\" name=\"subcategory\" method=\"post\" >

<div  class=\"control-group\">
<label class=\"control-label\" for=\"basicinput\">Payments</label>
<div class=\"controls\">
<select  onchange=\"return duelist(this.value)\" name=\"category\" class=\"span8 tip\" required>
<option value=\"\">Select Debtor</option>";
$db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
$query=$db->query("SELECT * FROM users");
while($row=$query->fetch_assoc())
{
	$content.="<option value=\"".$row['id']."\"> ".$row['name']."</option>";
}
$content.="</select>
</div>
</div>


<div class=\"control-group\">
<div class=\"controls\">

<div id='dueshow'>
</div>
</div>

</div><div class=\"control-group\">
<label class=\"control-label\" for=\"basicinput\">Invoice Number: </label>
<div class=\"controls\">

<select style='width:400px' name='invoice' id='due'>
</select>
</div>
</div>


<div class=\"control-group\">
<label class=\"control-label\" for=\"basicinput\">Payment Amount</label>
<div class=\"controls\">
<input type=\"text\" placeholder=\"Enter Payment Amount\"  name=\"amountpaying\" class=\"span8 tip\" required>
</div>
</div>



	<div class=\"control-group\">
											<div class=\"controls\">
												<button type=\"submit\" name=\"submit\" class=\"btn\"style=\"border-radius: 3px;color: #fff;
		background-color: #5cb85c;
		border-color: #4cae4c;\">Record Payment</button>
													<button onclick=\"location.href = './purchase';\"> Return to Billing </button>
											</div>
										</div>
									</form>
							</div>
						</div>






					</div><!--/.content-->
				</div><!--/.span9-->
			</div>


<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass(\"btn-group datatable-pagination\");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class=\"icon-chevron-left shaded\"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class=\"icon-chevron-right shaded\"></i>');
		} );
	</script>";
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
$page->var['title']="Add Payments";
$page->render();
?>
