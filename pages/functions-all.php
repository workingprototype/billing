<?php
include_once "./classes/database-class.php";
function addrewards($invoice){
  echo $invoice;
  //select the sales with the invoice number $invoice;
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $sql = "SELECT * FROM sales WHERE invoice='$invoice' ";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  //get the customer id from the sales
  $customer=$row['customer'];
  //get the rewardeligible amount from the sales
  $rewardeligible=$row['finalrate'];
  //get the timestamp of the sales
  $timestampsales= $row['timestamp'];
  //get the current timestamp and calculate the day gap between payment and sales
  $time= time();
  var_dump($row);
  echo "Time: $time";
  $time-=$timestampsales;
  echo "Timestampsales: $timestampsales Time: $time";
  $daygap= $time/86400;
  //select the reward settings and find the reward percentage for the days found out
  $sql = "SELECT * FROM rewardsettings WHERE id=1";
  $result = $db->query($sql);
  $row2 = $result->fetch_assoc();
  $row2=$row2['settings'];
  $row2=explode(':',$row2);
  //calculate the percentage of reward eligible amount to be added to rewards to the customer
  if($row2[1]>$daygap){
    $percent = $row2[2];
  }elseif($row[3]>$daygap){
    $percent = $row2[4];
  }elseif($row[5]>$daygap){
    $percent = $row2[6];
  }elseif($row[7]>$daygap){
    $percent = $row2[8];
  }elseif($row[9]>$daygap){
    $percent = $row2[0];
  }else{
    $percent=100;
  }
  echo $daygap."s".$timestampsales;
  $rewardamount=(float)$rewardeligible*(float)$percent/100;
  //select the reward cell of the customer
  $sql = "SELECT * FROM users WHERE id='$customer'";
  $result = $db->query($sql);
  $row3 = $result->fetch_assoc();
  $reward=$row3['rewards'];
  //add the reward amount into the existing reward amount
  $reward += $rewardamount;
  //update the reward amount of the customer
  $sql="UPDATE users SET rewards ='$reward' WHERE id='$customer'";

  if ($db->query($sql) === TRUE) {
    logify("Reward added for Invoice No : ".$invoice);
    return true;
  } else {
    echo "Error updating record: " . $db->error;
  }
}


function updaterewards($customer,$usedreward){
  //select the reward for the customer
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $sql = "SELECT * FROM users WHERE id='$customer' ";
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
  $reward=$row['rewards'];
  //subtract the used rewards from the rewards
  $reward=$reward-$usedreward; 
  //update the remaining rewards into the usertable for the customer 
  $sql="UPDATE customer SET rewards ='$reward' WHERE id='$customer'";

  if ($db->query($sql) === TRUE) {
    logify("Reward updated for Invoice No : ".$inv);
    return true;
  } else {
    echo "Error updating record: " . $db->error;
  }
}
if($request[1]=="breg")
{
    include_once "./classes/business-class.php";
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $business = new BusinessClass;
     /**
      *push to the table the values in an array
     */
    if($business->push($_POST,$db))
    {
        echo 1; //success
    }else
    {
        echo 0;
    }
}
elseif($request[1]=="purchase")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $data = json_decode($_POST['data']);
  $timestamp=time();
  $invoice = $_POST['invoice'];
  $business = $_POST['business'];
  $vehicle=$_POST['vehicleno'];
  $supplier=$_POST['supplier'];
  $invoicedate=$_POST['invoicedate'];
  $receivedate=$_POST['receivedate'];
  $transport=$_POST['transport'];
  $delcontact=$_POST['delcontact'];
  foreach ($data as $k => $v) {
    $v[0]=explode("_",$v[0])[1];
    $val= [$business, $supplier, $invoicedate, $invoice,$vehicle, $delcontact,$transport, $receivedate,
    $v[2],
    $v[0],
    $v[1],
    $v[3],
    $v[4],
    $v[5],
    $v[6],
    $v[8],
    $v[9],
    $v[10],
    $v[11],
    $v[12],
    $v[13],
    $v[14],
    $v[15],
    $v[16],
    $v[7],
    $v[17],
    $v[18],
    $v[19],
    $v[20],
    0,
    0,
    $timestamp];
    $table="purchase";
    $col= ['business', 	'supplier', 	'invoicedate', 	'invoicenumber', 'vehiclenumber', 	'deliveredcontact',	'transport', 	'receiveddate',
    'batch',
    'product',
    'mrp', 	
    'qtycase', 	
    'qtyuom', 	
    'baseratecase', 	
    'baserateuom', 	
    'disc', 	
    'disca', 	
    'neta', 	
    'cgst' ,	
    'sgst', 	
    'cgsta', 	
    'sgsta', 	
    'cess' ,	
    'totalamount', 	
    'margin',	
    'uomsp', 	
    'dispp', 	
    'dispd', 	
    'totalwhole', 	
    'creditnote', 
    'logistic',
    'timestamp' ];
    $sql="INSERT INTO ".$table." (";
    foreach ($col as $key => $value) {
      $sql .=$value;
      if($key!=(count($col)-1)){
        $sql .=",";
      }
    }
    $sql .=") VALUES (";
    foreach ($val as $key => $value) {
     $sql .="'".$value."'";
      if($key!=(count($col)-1)){
        $sql .=",";
      }
    }
    $sql .=")";
    if ($db->query($sql) === TRUE) {
      
      $id=$v[0];
      $sql = "SELECT * FROM products
        WHERE id='$id'";
      $result = $db->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quant = $row['quantityleft'];
        $quant += $v[3];
        $sql = "UPDATE products SET quantityleft='$quant' WHERE id=$id";
        $db->query($sql);
      } else {
        echo "0 results";
      }
      echo "TRUE";
    } else {
      echo "Error: " . $sql . "<br>" . $db->error;
      echo $data;
    }
  }
  logify("New Purchase Added");
}
elseif($request[1]=="sales")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $data = json_decode($_POST['data']);
  $timestamp=time();
  $customer = $_POST['customer'];
  $invoice = (time()*100)+34;
  $due=0;
  $discount=$_POST['discount'];
  foreach ($data as $k => $v) {
    $v[0]=explode("_",$v[0])[1];
    $due+=$v[14];
  $val=[$v[1],$v[0],$v[3],$v[4],$v[6],$v[5],$v[8],$v[9],$v[10],$v[11],$v[12],$v[13],$v[14],$invoice,$v[2],$timestamp,$customer,$v[14]];
    $table="sales";
    $col= [
      'batch',
      'product',
      'hsn',
      'utc',
      'qty', 	
      'mrp',
      'baserate', 	
      'amount',
      'dis',
      'gst',
      'gstamount',
      'total',
      'finalrate',
      'invoice' 	,
      'business' 	,
      'timestamp' 	,
      'customer',
      'paymentdue'];
    $sql="INSERT INTO ".$table." (";
    foreach ($col as $key => $value) {
      $sql .=$value;
      if($key!=(count($col)-1)){
        $sql .=",";
      }
    }
    $sql .=") VALUES (";
    foreach ($val as $key => $value) {
     $sql .="'".$value."'";
      if($key!=(count($col)-1)){
        $sql .=",";
      }
    }
    $sql .=")";
    if ($db->query($sql) === TRUE) {
      $id=$v[0];
      $sql = "SELECT * FROM products
        WHERE id='$id'";
      $result = $db->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quant = $row['quantityleft'];
        $quant -= $v[6];
        $sql = "UPDATE products SET quantityleft='$quant' WHERE id=$id";
        $db->query($sql);
      } else {
        echo "0 results";
      }
      $datax[1]=$invoice;
    } else {
      echo "Error: " . $sql . "<br>" . $db->error;
      echo $data;
    }
  }
  logify("New Sales Added");
  $sq="INSERT INTO paymentdue (customer, salesinvoice,dueamount,timestamp)
   VALUES('$customer','$invoice','$due','$timestamp')";
   if($db->query($sq)){
     $datax[0]="Payment Due Added";
     $sel="SELECT * FROM users WHERE id='$customer'";
     $resel=$db->query($sel);
     $row=$resel->fetch_assoc();
     $reward=$row['rewards']-$discount;
     $upsql="UPDATE users SET rewards='$reward'WHERE id='$customer'";
     if($db->query($upsql)){
     echo json_encode($datax);

     }else{
       echo "ERROR";
     }
   }
}
elseif($request[1]=="search")
{
  $term=$_POST['data'];
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $sql = "SELECT * FROM products
      WHERE productName LIKE '%$term%'
      OR productCompany LIKE '%$term%'
      OR id LIKE '%$term%' LIMIT 10";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $total = $row['productPrice']+($row['productPrice']*5/100);
      echo "<div onclick='clicked(\"".$row['productName']."\",\"".$row['productPrice']."\",\"5\",\"1\",\"".$total."\",\"".$row['id']."\")' class='searchitem'> ".$row['productName']." </div>";
    }
} else {
    echo "0 results";
}
}
elseif($request[1]=="searchi")
{
  $term=$_POST['data'];
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $sql = "SELECT * FROM products
      WHERE productName LIKE '%$term%'
      OR productCompany LIKE '%$term%'
      OR id LIKE '%$term%' LIMIT 10";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $batchcode='';
      $proid=$row['id'];
      $sql = "SELECT * FROM purchase WHERE product=$proid";
      $res = $db->query($sql);
      $bat='';
      while($ro = $res->fetch_assoc()){
        if($ro['batch']!=$bat){
        $batchcode .="<option>".$ro['batch']."</option>";
        $bat =$ro['batch'];
        }
      }
      $gst=0;
      echo "<div onclick='clicked(\"".$row['productName']."\",\"".$row['productPrice']."\",\"".$row['hsnno']."\",\"".$batchcode."\",\"".$gst."\",\"".$row['id']."\")' class='searchitem'> ".$row['productName']." </div>";
    }
} else {
    echo "0 results";
}
}
elseif($request[1]=="add_product")
{
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $data= json_decode($_POST['data']);
    $table="products";
    $col= ['pname', 'brand', 'units', 'category', 'subcategory', 'cost', 'price', 'profitm', 'cgst', 'sgst', 'igst', 'vat'];
    $sql="INSERT INTO ".$table." (";
    foreach ($col as $key => $value) {
      $sql .=$value;
      if($key!=(count($col)-1)){
        $sql .=",";
      }
    }
    $sql .=") VALUES (";
    foreach ($data as $key => $value) {
      $sql .="'".$value."'";
      if($key!=(count($col)-1)){
        $sql .=",";
      }
    }
    $sql .=")";
    if ($db->query($sql) === TRUE) {
      echo "TRUE";
  } else {
      echo "Error: " . $sql . "<br>" . $db->error;
      echo $data;
  }
}
elseif($request[1]=="list_product")
{
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $table="products";
    $sql="SELECT * FROM ".$table." LIMIT 50;";
    $result = $db->query($sql);
    $x=json_encode($result->fetch_all());
    echo $x;
}//TODO : CHECK WHERE ALL THE ABOVE FUNCTION LIST PRODUCT IS USED AND  AND FIX THE LIMIT ISSUE
elseif($request[1]=="purchase_report")
{
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $table="purchase";
    $gap= $_POST['gap'];
    $page= $_POST['page']-1;
    $lowerlim=($page*$gap);
    $upperlim = $lowerlim + $gap;
    $sql="SELECT * FROM ".$table." LIMIT $lowerlim,$upperlim;";
    $result = $db->query($sql);
    #$x=json_encode($result->fetch_all());
    $x=$result->fetch_all();
    foreach ($result as $key => $value){
      $product=$value['product'];
      $sq="SELECT * FROM products WHERE id=$product;";
      $rs = $db->query($sq);
      $rs=$rs->fetch_assoc();
      $sup=$value['supplier'];
      $sq="SELECT * FROM supplier WHERE id=$sup;";
      $res = $db->query($sq);
      $res=$res->fetch_assoc();
      echo "<tr><td>".$rs['productName']."</td><td>".$res['name']."</td><td>".$value['invoicenumber']."</td><td>".$value['invoicedate']."</td><td>".$value['qtycase']."</td><td>".$value['cgst']."</td><td>".$value['sgst']."</td><td>".$value['totalamount']."</td></tr>";
    }
    
}
elseif($request[1]=="batchbox")
{
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $table="purchase";
    $id=$_POST['id'];
    $sql="SELECT * FROM ".$table." WHERE product=$id;";
    $result = $db->query($sql);
    $x="<option value=\"new\">New Batch</option>";
    $ki=0;
    $batches[0]="zzzz";
    $ax=0;
    while($row=$result->fetch_assoc()){
      foreach($batches as $key=>$value){
        if($value==$row['batch']){
          $ax=1;
        }
      }
      if($ax==0){
        $batches[$ki]=$row['batch'];
        $ki++;
        $array = [$row['batch'],$row['baseratecase']];
        $array = json_encode($array);
        $x.="<option value=".$array.">".$row['batch']."</option>";
      }else{
        $ax=0;
      }
    }
    echo $x;
}
elseif($request[1]=="duelist")
{
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $id=$_POST['id'];
    $sql="SELECT * FROM paymentdue where customer=$id";
    $result = $db->query($sql);
    while($row=$result->fetch_assoc()){
      if ($row['dueamount']>0){
      echo "<option value=\"".$row['id']."\">".$row['salesinvoice']."</option>";
      }
    }
}
elseif($request[1]=="duelist2")
{
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $id=$_POST['id'];
    $sql="SELECT * FROM paymentdue where customer=$id";
    $result = $db->query($sql);
    $tot=0;
    $num=1;
    echo "<h4>Due History</h4>
    <table class='table'><tr><th>Sl No.</th><th>Sales Invoice Number</th><th>Due Amount</th></tr>";
    while($row=$result->fetch_assoc()){
      if($row['dueamount']>0){
        echo "<tr><td>".$num++."</td><td>".$row['salesinvoice']."</td><td>".$row['dueamount']."</td></tr>";
        $tot += (float)$row['dueamount'];
      }
    }
    echo "<table>";
    echo "<br><p>Total Due : $tot</p><br>";
}
elseif($request[1]=="record_payment")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $id=$_POST['invoice'];
  $sql="SELECT * FROM paymentdue where id=$id";
  $result = $db->query($sql)->fetch_assoc();
  $dueremaining=(float)$result['dueamount'] - (float)$_POST['amountpaying'];
  $inv=$result['salesinvoice']; 
  if($dueremaining>= 0){
    if($dueremaining==0){
      addrewards($inv);
    }
    $sql="UPDATE paymentdue SET dueamount ='$dueremaining' WHERE id='$id'";

    if ($db->query($sql) === TRUE) {
      echo "Payment Updated Successfully";
      logify("Payment added for Invoice No : ".$inv);
    } else {
      echo "Error updating record: " . $db->error;
    }
  }else{
    echo "Amount Entered is Greater than the Existig Due for the Sales Record with Invoice Number $inv";
  }
}
elseif($request[1]=="rewardsettings")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $data=json_decode($_POST['data']);
  $dx='';
  foreach ($data as $key => $value) {
    $dx.="$value:";
  }
  $sql="UPDATE rewardsettings SET settings='$dx' WHERE id=1";
  if($db->query($sql)== TRUE){
    echo "Reward Settings Updated";
    logify("Reward Settings Changed to : ".$dx);
  }

}elseif($request[1]=="customer")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $id=$_POST['data'];
  $sql="SELECT * FROM users  WHERE id='$id'";
  $customer = $db->query($sql)->fetch_assoc();
  echo $customer['rewards'];

}elseif($request[1]=="batchch")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $id=$_POST['id'];
  $sql="SELECT * FROM purchase  WHERE product='$id'";
  $result = $db->query($sql);
  $output[0]=0;
  $output[1]=0;
  while($row=$result->fetch_assoc()){
    if($row['batch']==$_POST['batch']){
      $output[0]=$row['baserateuom'];
      $output[1]=$row['qtycase'];
    }
  }
  echo json_encode($output);
}
elseif($request[1]=="salesreportget")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $to= strtotime($_POST['to']);
  $from=strtotime($_POST['from']);
  $keys=trim($_POST['keywords']);
  $sql="SELECT * FROM sales 
  WHERE (timestamp BETWEEN '$from'  AND '$to') AND (invoice LIKE '%$keys%') 
  GROUP BY invoice  LIMIT 50";
  $result = $db->query($sql);
  $i=1;
  while($row=$result->fetch_assoc()){
    $date = date("d-m-Y",$row['timestamp']);
    $id=$row['customer'];
    $sq="SELECT * FROM users WHERE id='$id'";
    $res=$db->query($sq)->fetch_assoc();
    $customer = $res['name'];
    $customerno = $res['contactno'];
    echo "<tr><td style='width:10px;'>".$i++."</td><td style='width:40px;'>$date</td><td >".$row['invoice']."</td><td style='width:10px;'>".$customer."</td><td style='width:10px;'>".$customerno."</td><td style='width:10px;'>".$row['total']."</td><td style='width:10px;'>".$row['gst']."</td><td style='width:10px;' ><a href='../invoice/sales/".$row['invoice']."'>View</a></td></tr>";
  }
}
elseif($request[1]=="purchasereportget")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $to= strtotime($_POST['to']);
  $from=strtotime($_POST['from']);
  $keys=trim($_POST['keywords']);
  $sql="SELECT * FROM purchase 
  WHERE (timestamp BETWEEN '$from'  AND '$to') AND (invoicenumber LIKE '%$keys%')
  GROUP BY timestamp  LIMIT 50";
  $result = $db->query($sql);
  $i=1;
  while($row=$result->fetch_assoc()){
    $date = date("d-m-Y",$row['timestamp']);
    $id=$row['supplier'];
    $sq="SELECT * FROM supplier WHERE id='$id'";
    $res=$db->query($sq)->fetch_assoc();
    $supplier = $res['name'];
    $suppliercon = $res['contactno'];
    echo "<tr><td style='width:10px;'>".$i++."</td><td style='width:40px;'>$date</td><td >".$row['invoicenumber']."</td><td style='width:10px;'>".$supplier."</td><td style='width:10px;'>".$suppliercon."</td><td style='width:10px;'>".$row['totalwhole']."</td><td style='width:10px;'>".$row['sgst']."</td><td style='width:10px;'>".$row['cgst']."</td><td style='width:10px;' ><a href='../invoice/sales/".$row['id']."'>View</a></td></tr>";
  }
}
elseif($request[1]=="stocks")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $to= strtotime($_POST['to']);
  $from=strtotime($_POST['from']);
  $keys=$_POST['keywords'];
  $sql="SELECT * FROM products";
  $result = $db->query($sql);
  $i=1;
  while($row=$result->fetch_assoc()){
    $id=$row['id'];
    $sq="SELECT * FROM purchase WHERE product='$id'";
    $sr="SELECT * FROM sales WHERE product='$id'";
    $resultp=$db->query($sq);
    $stock=0;
    while ($rowp=$resultp->fetch_assoc()){
      $stock += $rowp['qtycase']*$rowp['qtyuom'];
    }
    $resultp=$db->query($sr);
    while ($rowp=$resultp->fetch_assoc()){
      $stock -= $rowp['qty'];
    }
    echo "<tr><td style='width:10px;'>".$i++."</td><td>".$row['productName']."</td><td style='width:10px;'>".$stock."</td><td style='width:10px;'><a  href='../invoice/sales/".$row['id']."'>View</a></td></tr>";
  }
}
elseif($request[1]=="printcustomerrep")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $to= strtotime($_POST['to']);
  $from=strtotime($_POST['from']);
  $keys=$_POST['keywords'];
  $sql="SELECT * FROM users";
  $result = $db->query($sql);
  $i=1;
  while($row=$result->fetch_assoc()){
    $id=$row['id'];
    $sq="SELECT * FROM sales WHERE customer='$id' GROUP BY invoice";
    $resultc=$db->query($sq);
    $purchases=0;
    while ($rowc=$resultc->fetch_assoc()){
      $purchases++;
    }

    $sq="SELECT * FROM paymentdue WHERE customer='$id'";
    $resultc=$db->query($sq);
    $paymentdue=0;
    while ($rowc=$resultc->fetch_assoc()){
      $paymentdue+=$rowc['dueamount'];
    }
    echo "<tr><td style='width:10px;'>".$i++."</td><td>".$row['name']."</td><td style='width:10px;'>".$row['contactno']."</td><td style='width:10px;'>".$purchases."</td><td style='width:100px;'>Have to Add This</td><td style='width:10px;'>".$row['rewards']."</td><td style='width:10px;'>".$paymentdue."</td><td style='width:10px;'><a  href='../invoice/sales/".$row['id']."'>View</a></td></tr>";
  }
}
?>
