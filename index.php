<?php
require './config/app.config.php';
require './config/mysql.config.php';
$end=0;
function route($link,$location)
{
  global $end,$request;
  if($request[0]==$link){
    include($location);
    $end=1;
  }
}
if(isset($_GET['dir'])){
  $request=explode("/",$_GET['dir']);
  if($request[0]!=null){
    route("setup","./config/setup.php");
    route("sql","./config/sql.php");
    // route("users","./pages/users.page.php");
    route("shopping","./shopping");
    route("shopping/admin","./shopping/admin/index.php");

//below not done yet
    // route("todaysorders","./pages/todays-orders.php");
   route("addcategory","./pages/add-category.php");
    route("addsubcategory","./pages/add-sub-category.php");
   route("adduom","./pages/add-unit.php");
    route("addsubuom","./pages/add-sub-unit.php");
     // route("editcategory","./pages/edit-category.php");
    route("insertproducts","./pages/insert-products.php");
    // route("manageproducts","./pages/manage-products.php");
    // route("pendingorders","./pages/pending-orders.php");
    // route("deliveredorders","./pages/delivered-orders.php");
//above not done yet
    route("function","./pages/functions-all.php");
    route("breg","./pages/b-registration-page.php");
    route("sales","./pages/sales-register-page.php");
    route("purchase","./pages/purchase-register-page.php");
    route("products","./pages/products.page.php");
    route("products-list","./pages/productsl.page.php");
    route("retailerreg","./pages/retailer-reg.php");
    route("supplierreg","./pages/supplier-reg.php");
    route("login","./pages/login.page.php");
    if($end==0){
      include("./pages/404-page.php");
    }
  }
}
else{
  include("./pages/blank-page.php");
}
?>
