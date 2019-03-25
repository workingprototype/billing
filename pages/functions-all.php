<?php
include_once "./classes/database-class.php";
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
    0,
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
  foreach ($data as $k => $v) {

    $val=[$v[1],$v[0],$v[3],$v[4],$v[6],$v[5],$v[8],$v[9],$v[10],$v[11],$v[12],$v[13],$v[14],$invoice,$v[2],$timestamp,$customer];
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
      'customer'];
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
      echo "TRUE";
    } else {
      echo "Error: " . $sql . "<br>" . $db->error;
      echo $data;
    }
  }
  logify("New Sales Added");
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
      echo "<div onclick='clicked(\"".$row['productName']."\",\"".$row['productPrice']."\",\"".$row['hsnno']."\",\"".$batchcode."\",\"<option>355</option>\",\"".$row['id']."\")' class='searchitem'> ".$row['productName']." </div>";
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
      echo "<option value=\"".$row['id']."\">".$row['salesinvoice']."</option>";
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
    <table class='table'><tr><th>Sales Invoice Number</th><th>Due Amount</th></tr>";
    while($row=$result->fetch_assoc()){
      echo "<tr><td>".$num++."</td><td>".$row['salesinvoice']."</td><td>".$row['dueamount']."</td></tr>";
      $tot += (float)$row['dueamount'];
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
    $dx.="$value::";
  }
  $sql="UPDATE rewardsettings SET settings='$dx' WHERE id=1";
  if($db->query($sql)== TRUE){
    echo "Reward Settings Updated";
    logify("Reward Settings Changed to : ".$dx);
  }

}
?>
