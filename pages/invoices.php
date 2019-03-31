<?php
if($request[1]=='sales'){
    $invoice=$request[2];
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql = "SELECT * FROM sales WHERE invoice='$invoice'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $customer = $row['customer'];
      }
      $sql = "SELECT * FROM users WHERE id='$customer'";
      $res = $db->query($sql);
      if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            $customer_name=$row['name'];
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
      <td><strong>BILL TYPE:</strong> $billtype </td>
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
    $page->var['content']=$table;
    $page->var['title']="Invoice";
    $page->render();
}
?>