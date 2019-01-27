<?php
require './config/app.config.php';
require './config/mysql.config.php';


if(isset($_GET['dir'])){
  $request=explode("/",$_GET['dir']);

  if($request[0]!=null){

    if($request[0]=="setup"){
      include("./config/setup.php");
    }


    if($request[0]=="login"){
      include("./login.html");
    }

    elseif($request[0]=="forms"){
      include("./pages/forms-page.php");
    }


    elseif($request[0]=="breg"){
      include("./pages/b-registration-page.php");
    }

    else{
      include("./pages/404-page.php");
    }

  }
}
else{
  include("./pages/blank-page.php");
}
?>
