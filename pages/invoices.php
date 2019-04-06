<?php
if($request[1]=='sales'){
    $invoice=$request[2];
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql = "SELECT * FROM sales WHERE invoice='$invoice'";
    $result = $db->query($sql);
    $rows='';
    $sno=1;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $customer = $row['customer'];
        $productname=$row['product'];
        $sqz="SELECT * FROM products WHERE id='$productname'";
        $res=$db->query($sqz);
        $product=$res->fetch_assoc();
        $productname=$product['productName'];
        $hsn=$product['hsnno'];
        $utc=$row['utc'];
        $qty=$row['qty'];
        $mrp=$row['mrp'];
        $base=$row['baserate'];
        $am=$row['amount'];
        $gst=$row['gst'];
        $beat=$row['beat'];
        $gsta=$row['gstamount'];
        $tot=$row['total'];
        $fr=$row['finalrate'];
        $invoice_date = date("d-M-Y", $row['timestamp']);
        $rows.="<tr>
        <td>".$sno++."</td>
        <td>$productname</td>
        <td>$hsn</td>
        <td>$utc</td>
        <td>$qty</td>
        <td>$mrp</td>
        <td>$base</td>
        <td>$am</td>
        <td>$gst</td>
        <td>$gsta</td>
        <td>$tot</td>
        <td>$fr</td>
        </tr>";
      }
      $sql = "SELECT * FROM users WHERE id='$customer'";
      $res = $db->query($sql);
      if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            $customer_name=$row['name'];
            $customer_contact=$row['contactno'];
            $customer_address=$row['billingAddress'];
            $state=$row['billingState'];
        } 
      } 
      $table= "<table class='table table-bordered'>
      <tr>
      <th>GST IN : </th>
      <th>FIRM NAME 1: </th>
      <th>TAX INVOICE: </th>
      </tr>
      <tr>
      <th>GST IN : </th>
      <th>FIRM NAME 2: </th>
      </tr>
      <tr>
      <th colspan='2'>STATE : </th>
      <th>CONTACT NO : </th>
      </tr>
      </table>";
      $table.="
      <table class='table table-bordered'>
      <tr>
      <td><strong>CUSTOMER NAME: </strong> $customer_name </td>
      <td><strong>INVOICE NO:</strong> $invoice </td>
      </tr>
      <tr>
      <td><strong>ADDRESS: </strong> $customer_address </td>
      <td><strong>INVOICE DATE:</strong> $invoice_date </td>
      </tr>
      <tr>
      <td><strong>CONTACT No: </strong> $customer_contact </td>
      <td><strong>BEAT:</strong> $beat </td>
      </tr>
      <tr>
      <td><strong>STATE: </strong> $state </td>
      <td><strong>BILL TYPE:</strong></td>
      </tr>
      </table>
      ";
      $table.="
      <table class='table table-bordered'>
      <tr>
      <th>S.No</th>
      <th>Product Name</th>
      <th>HSN CODE</th>
      <th>UTC</th>
      <th>Quantity</th>
      <th>MRP</th>
      <th>Base Rate</th>
      <th>Amount</th>
      <th>GST%</th>
      <th>GST Amount</th>
      <th>Total</th>
      <th>Final Rate</th>
      </tr>
      $rows
      </table>
      ";
    } else {
      echo "0 results"; // No supplier registered.
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
    $page->var['header']="
    <style type=\"text/css\" media=\"print\">
    body {  visibility: hidden; }
    .print { 
      visibility: visible;
      position: absolute;
      left:0;
      top:0;
     }
     .print  * { 
      visibility: visible;
     }
    </style>";
    $page->var['content']="<div class='print'>".$table."</div><Button class='btn btn-danger' onclick='PrintElem('print')'>Print</button>";
    $page->var['title']="Invoice";
    $page->render();
}
?>