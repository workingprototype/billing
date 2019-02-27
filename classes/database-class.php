<?php
/**
 *  Custom Mysql object to be used for easy mqsql access
 */

class Mysqlc
{
  /**
  *Custom for table objects
  */
  public function insert($table, $col, $val,$conn)
  {
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
    if ($conn->query($sql)) {
      return True;
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }


  public function select($table,$conn)
  {
    $sql="SELECT * FROM ".$table;
    $result = $conn->query($sql);
    return $result;
    $result->free();
  }
}




 ?>
