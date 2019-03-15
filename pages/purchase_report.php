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
$page->var['header']="<link href=\"https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css\" rel=\"stylesheet\">";
$page->var['header'].="<link href=\"https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css\" rel=\"stylesheet\">";
$page->var['header'].='
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>';
$page->var['footer']=$footer->echo();
$page->var['content']='<table id="example" class="display nowrap" style="width:100%">
<script>
$(document).ready(function() {
    $(\'#example\').DataTable( {
        dom: \'Bfrtip\',
        buttons: [
            \'copy\', \'csv\', \'excel\', \'pdf\', \'print\'
        ]
    } );
} );

function report(term){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(\'tble\').innerHTML=this.responseText;
        document.getElementById("tblh").innerHTML="<tr><th>Product</th><th>Supplier</th><th>Invoice No:</th><th>Date</th><th>Quantity</th><th>CGST</th></tr><th>SGST</th></tr><th>Total Amount</th></tr>";
    }
    };
    xhttp.open("POST", "function/purchase_report ", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(\'gap=10&page=1\');
}

</script>
<thead id="tblh">
<tr>
    <th>Product</th>
    <th>Position</th>
    <th>Office</th>
    <th>Age</th>
    <th>Start date</th>
    <th>Salary</th>
</tr>
</thead>
<tbody id="tble">
    <tr>
        <td>Tiger Nixon</td>
        <td>System Architect</td>
        <td>Edinburgh</td>
        <td>61</td>
        <td>2011/04/25</td>
        <td>$320,800</td>
    </tr>
    <tr>
        <td>Garrett Winters</td>
        <td>Accountant</td>
        <td>Tokyo</td>
        <td>63</td>
        <td>2011/07/25</td>
        <td>$170,750</td>
    </tr>
</tbody>
</table>';
$page->var['title']="Purchase Report";
$page->render();

?>