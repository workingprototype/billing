<?php
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
require_once "./classes/page-class.php";
require_once "./classes/sidebar-class.php";
require_once "./classes/top-navigation-class.php";
require_once "./classes/footer-class.php";
$page = new Page;

$sidebar = new Sidebar;
$footer = new Footer;
$navbar = new TopNav;
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();

$result1 = mysqli_query($con, "SELECT COUNT(id) AS `count` FROM `products`");
$row1 = mysqli_fetch_array($result1);
$count1 = $row1['count'];

$result2 = mysqli_query($con, "SELECT COUNT(DISTINCT `orderDate`) as total FROM `orders`");
$row2 = mysqli_fetch_array($result2);
$count2 = $row2['total'];

$result3 = mysqli_query($con, "SELECT count(invoice) as total FROM `sales`");
$row3 = mysqli_fetch_array($result3);
$count3 = $row3['total'];

// $count 4 : need to total Marketing people

$result5 = mysqli_query($con, "SELECT count(id) as total FROM `supplier`");
$row5 = mysqli_fetch_array($result5);
$count5 = $row5['total'];

$result6 = mysqli_query($con, "SELECT SUM(finalrate) as total FROM `sales`");
$row6 = mysqli_fetch_array($result6);
$count6 = $row6['total'];

$page->var['content']='    <div class="row tile_count">
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Retailers</span>
          <div class="count">'.$count1.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-shopping-cart"></i> Total Orders: Ecommerce</span>
          <div class="count">'.$count2.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-arrow-up"></i> Total Sales</span>
          <div class="count green">'.$count3.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-briefcase"></i> Total Marketing Executives</span>
          <div class="count">'.$count1.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Suppliers</span>
          <div class="count">'.$count5.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-inr"></i> Total Profit</span>
          <div class="count green">'.$count6.'</div>
        </div>
      </div>

    </div>';
$page->var['title']="Dashboard";
$page->render();
}
?>
