<?php
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
$page->var['content']='<table id="example" class="display nowrap" style="width:100%">
<script>
function report(term){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(\'tble\').innerHTML=this.responseText;
        document.getElementById("tblh").innerHTML="<tr><th>Product</th><th>Supplier</th><th>Invoice No:</th><th>Date</th><th>Quantity</th><th>CGST</th></tr><th>SGST</th></tr><th>Total Amount</th></tr>";
    }
    };
    xhttp.open("POST", "function/purchase_report", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(\'gap=10&page=1\');
}
report();
</script>
<table class="table">
<tr  id="tblh">
</tr>
<tbody id="tble">
</tbody>
</table>';
$page->var['title']="Purchase Report";
$page->render();

?>