<?php
function notify($message){
    $dx[0]=$message;
    $dx= str_replace("\"","\\\"", json_encode($dx));
    $tx = time();
    $typex=1;
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql="INSERT INTO notifications (timestamp, data, type) VALUES ('$tx','$dx','$typex')";
    if ($db->query($sql) === TRUE) {
       return true;
    } else {
      echo "Error updating record: " . $db->error;
    }
}
function logify($message){
    $dx[0]=$message;
    $dx[1]= $_SERVER['HTTP_USER_AGENT'] ;
    $dx[2]= $_SERVER['REMOTE_ADDR'] ;
    $dx= str_replace("\"","\\\"", json_encode($dx));
    $tx = time();
    $typex=2;
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql="INSERT INTO notifications (timestamp, data, type) VALUES ('$tx','$dx','$typex')";
    if ($db->query($sql) === TRUE) {
       return true;
    } else {
      echo "Error updating record: " . $db->error;
    }
}
?>