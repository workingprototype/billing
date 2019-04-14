
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

function autocompleted(id,value,supervalue){
	document.getElementById(id).value= value;
	document.getElementById('hidden_'+id).value= supervalue;
	document.getElementById('drop_'+id).innerHTML='';
	duelist(supervalue);
  }
  function autocompletex(value,a){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	  if (this.readyState == 4 && this.status == 200) {
		document.getElementById('drop_'+a).innerHTML=this.responseText;
	  }
	};
	xhttp.open(\"POST\", \"function/auto\"+a, true);
	xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
	xhttp.send('data='+value);
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
<label class=\"control-label\" for=\"basicinput\">Debtor</label>
<div class=\"controls\">";
$content.="
<input style='visibility:hidden;position:absolute' placeholder='Start typing the name of the debtor' id='hidden_customer' class='form-control'>
    <input id='customer' onkeyup='autocompletex(this.value,\"customer\")' class='form-control' autocomplete='chromeisnotnice'>
    <div id='drop_customer' style='width:347px;background:#999;position:absolute;z-index:2'>
    </div>
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
</br> </br>


	<div class=\"control-group\">
											<div class=\"controls\">
												<button type=\"submit\" name=\"submit\" class=\"btn\"style=\"border-radius: 3px;color: #fff;
		background-color: #5cb85c;
		border-color: #4cae4c;\">Record Payment</button>
													<button onclick=\"location.href = '/billing/pages/exec/index.php';\" class=\"btn\"style=\"border-radius: 0.5px;color: white;
			background-color: black;
			border-color: white;\"> Return Home </button>
											</div>
										</div>
									</form>
							</div>
						</div>






					</div><!--/.content-->
				</div><!--/.span9-->
			</div>";
require_once "./classes/page-class.php";
$page = new Page;
$page->var['content']=$content;
$page->var['title']="Add Payments";
$page->render();
?>
