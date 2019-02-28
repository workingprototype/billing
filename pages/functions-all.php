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
  $remarks=$_POST['remarks'];
  foreach ($data as $k => $v) {
    $batch=$v[5];
    $productid=$v[0];
    $productcost=$v[1];
    $quantity=$v[3];
    $producttax=$v[2];
    $totalcost=$v[4];
    $val= [$invoice, $business, $remarks, $batch,$timestamp, $productid, $productcost, $producttax, $quantity, $totalcost];
    $table="purchase";
    $col= ['invoice','business'	,'remarks', 	'batch', 	'timestamp', 	'productid', 	'productcost', 	'producttax', 	'quantity', 	'totalcost'];
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
      echo "TRUE";
    } else {
      echo "Error: " . $sql . "<br>" . $db->error;
      echo $data;
    }
  }
}
elseif($request[1]=="sales")
{
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $data = json_decode($_POST['data']);
  $timestamp=time();
  $business = $_POST['business'];
  $customer = $_POST['customer'];
  $remarks=$_POST['remarks'];
  foreach ($data as $k => $v) {
    $batch=$v[6];
    $discount=$v[5];
    $productid=$v[0];
    $productcost=$v[1];
    $quantity=$v[3];
    $producttax=$v[2];
    $totalcost=$v[4];
    $val=[$productid,$timestamp,$batch,$productcost,$producttax,$discount,$quantity,$business,$customer,$remarks];
    $table="sales";
    $col= ['productid', 	'timestamp', 	'batch', 	'price', 	'tax', 	'discount' ,	'quantity' ,	'business' ,	'customer' ,	'remarks' ];
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
      echo "TRUE";
    } else {
      echo "Error: " . $sql . "<br>" . $db->error;
      echo $data;
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
}

?>
