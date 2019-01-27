<?php
/**
 *  Custom Mysql object to be used for easy mqsql access
 */
$conn = mysqli_connect(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
class Mysqlc
{
  /**
  *Custom for table objects
  */
  protected function insert($table, $col, $val)
  {
    global $conn;
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
    if (mysqli_query($conn, $sql)) {
      
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }


  protected function select($table)
  {
    global $conn;
    $sql="SELECT * FROM ".$table;
    $result = mysqli_query($conn, $sql);
    return $result;
    $result->free();
  }
}




 ?>
