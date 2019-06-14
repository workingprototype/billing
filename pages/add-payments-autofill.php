
<?php

$approot = APP_ROOT;
if(isset($request[1]))
  $invoice=$request[1];
else 
  die;

$db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
$sql = "SELECT paymentdue.id, salesinvoice, dueamount as paymentdue, users.name as user FROM paymentdue INNER JOIN users ON paymentdue.customer = users.id WHERE salesinvoice='$invoice' ";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$id=$row['id'];
$content= "<script>
function confirm(){
	document.getElementById('paymentbtn').outerHTML='';
	var amount = document.getElementById('payment').value;
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
        }
    };
    xhttp.open(\"POST\", \"".$approot."function/record_payment \", true);
    xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
    xhttp.send('invoice=$id&amountpaying='+amount);
}
</script>";
$content.= "<h4>Retailer Name : ".$row['user']."</h4>";
$content.= "<h4>Invoice Number : ".$row['salesinvoice']."</h4>";
$content.= "<h4>Amount to be Paid : ".$row['paymentdue']." Rs</h4>";
$content.= "<h4>Add Amount : <input id='payment' value='".$row['paymentdue']."'> Rs</h4>";
$content.= "<h4><button id='paymentbtn' onclick='confirm()' class='btn btn-primary'>Add Payment</button>";
$approot = APP_ROOT;
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
