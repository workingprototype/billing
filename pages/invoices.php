<?php
if($request[1]=='sales'){
    $invoice=$request[2];
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql = "SELECT * FROM sales WHERE invoice='$invoice'";
    $result = $db->query($sql);
    $rows=[];
    $stat=0;
    $sno=1;
    $ix=0;
    $firms=[];
    $fpointer=0;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $customer = $row['customer'];
        $productid=$row['product'];
        $sqz="SELECT * FROM products WHERE id='$productid'";
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
        $business=$row['business'];
        $beat=$row['beat'];
        $gsta=$row['gstamount'];
        $tot=$row['total'];
        $fr=$row['finalrate'];
        $invoice_date = date("d-M-Y", $row['timestamp']);
        $rows[$ix++]="
        $productid</td>
        $productname</td>
        $hsn</td>
        $utc</td>
        $qty</td>
        $mrp</td>
        $base</td>
        $am</td>
        $gst</td>
        $gsta</td>
        $tot</td>
        $fr";
        foreach ($firms as $key => $firm) {
          if($firm==$business){
            $stat=1;
          }
        }
        if($stat==1){
          $stat=0;
        }else{
          $firms[$fpointer++]=$business;
        }
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
      $firmd='';
      foreach ($firms as $key => $firm) {
        $sql = "SELECT * FROM business WHERE id='$firm'";
        $res = $db->query($sql);
        if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
            $firmn=$row['account_name'];
            $gstin=$row['gstin'];
          } 
        }
        $firmd.="<tr>
        <th>GST IN : $gstin  </th>
        <th>FIRM NAME ".($key + 1).": $firmn </th>
        </tr>";
        unset($gstin);
        unset($firmn);
      } 
      $table= "<table class='table table-bordered'>
      $firmd
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
      $iz=[[],0,[],0];   
      //store all the product id to an array iz[0]
      foreach ($rows as $key => $value) {
        $value=explode("</td>",$value);
        $iz[0][$iz[1]++]=$value[0];
      }
      $iz[1]=0;
      //add the info to an array row by row, if duplicate found after combine both if dublicate found before then mark as duplicate;
      foreach ($iz[0] as $k => $val) {
        $iz[2][$k]="N";              
        foreach ($iz[0] as $key => $value) {
          if($value==$val){
            if($k>$key){
              $iz[2][$k]="D";
            }elseif ($k<$key) {
              $iz[2][$k]="C";              
            }
          }
        }
      }
      function combined($k,$a){
        $pid=explode("</td>",$a[$k]);$pid=$pid[0];
        $acc=[0,0,0,0,0,0,0,0,0,0,0];
        foreach ($a as $key => $value) {
          $value=explode("</td>",$value);
          if($value[0]==$pid){
            $acc[0]=$value[0];
            $acc[1]=$value[1];
            $acc[2]=$value[2];
            $acc[3]=$value[3];
            $acc[4]+=$value[4];
            $acc[5]=$value[5];
            $acc[6]=$value[6];
            $acc[7]=$value[7];
            $acc[8]=$value[8];
            $acc[9]+=$value[9];
            $acc[10]+=$value[10];
            $acc[11]=$value[11];
          }
        }
        return implode("</td>",$acc);
      }
      $newrow=[];
      foreach ($iz[2] as $key => $value) {
        if($value=="N"){
          $newrow[$iz[3]++]=$rows[$key];
        }elseif ($value=="C") {
          $newrow[$iz[3]++]=combined($key,$rows);          
        }elseif ($value=="D") {
          # code...
        }
      }
      $rows='';
      foreach ($newrow as $key => $value) {
        $value=explode("</td>",$value);
        $val='';
        foreach ($value as $k => $v) {
          $val.="<td>".$v."</td>";
        }
        $rows.="<tr>".$val."</tr>";
      }
      //
      //
      //
      //
      //
      //
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
    $page->var['content']="<div class='print'>".$table."</div><Button class='btn btn-danger' onclick='window.print()'>Print</button><a href='../../addpayments' <Button class='btn btn-primary'>Print</button></a>";
    $page->var['title']="Invoice";
    $page->render();
}
?>