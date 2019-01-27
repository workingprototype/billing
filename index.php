<?php
require './config/app.config.php';
require './config/mysql.config.php';
$request=explode("/",$_GET['dir']);
if($request[0]!=null){
  if($request[0]=="login"){
    include("./login.html");
  }else{
    include("./pages/blank-page.php");
  }
}else{
  include("./pages/blank-page.php");
}
?>
