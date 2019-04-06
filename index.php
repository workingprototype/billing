<?php
require './config/app.config.php';
require './config/mysql.config.php';
require './classes/notifications.php';
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
    route("dashboard","./pages/dashboard-page.php"); // // TODO: Restore this later to dashboard page
    route("changepassword","./pages/change-password.php");
    // route("users","./pages/users.page.php");
    route("shopping","./shopping");
    route("shopping/admin","./shopping/admin/index.php");

//below not done yet
   route("todaysorders","./pages/todays-orders.php");
   route("csv","./pages/csv.php");
   route("rewardsettings","./pages/reward-settings.php");
   route("invoice","./pages/invoices.php");
   route("reports","./pages/report.php");
   route("addcategory","./pages/add-category.php");
    route("addsubcategory","./pages/add-sub-category.php");
   route("adduom","./pages/add-unit.php");
    route("addsubuom","./pages/add-sub-unit.php");
    route("addtax","./pages/add-tax-info.php");
    route("addpayments","./pages/add-payments.php");
     // route("editcategory","./pages/edit-category.php");
    route("insertproducts","./pages/insert-products.php");
    route("manageproducts","./pages/manage-products.php");
   route("pendingorders","./pages/pending-orders.php");
   route("deliveredorders","./pages/delivered-orders.php");

    route("function","./pages/functions-all.php");
    route("breg","./pages/b-registration-page.php");
    route("sales","./pages/sales-register-page.php");
    route("beat","./pages/add-beat.php");
    route("payments","./pages/payments.php");
    route("listsales","./pages/list-sales-page.php");
    route("listpurchase","./pages/list-purchase-page.php");
    route("purchase","./pages/purchase-register-page.php");
    route("products","./pages/products.page.php");
    route("salesreport","./pages/sales_report.php");
    route("purchasereport","./pages/purchase_report.php");
    route("products-list","./pages/productsl.page.php");
    route("retailerreg","./pages/retailer-reg.php");
    route("supplierreg","./pages/supplier-reg.php");
    route("login","./pages/login.page.php");
    route("logout","./pages/logout.page.php");
    if($end==0){
      include("./pages/404-page.php");
    }
  }
}
else{
  include("./pages/dashboard-page.php");
}
?>
