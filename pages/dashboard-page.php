<?php
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
$page->var['content']='    <div class="row tile_count">
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Retailers</span>
          <div class="count">2500</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-shopping-cart"></i> Total Orders: Ecommerce</span>
          <div class="count">1230</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-arrow-up"></i> Total Sales</span>
          <div class="count green">2,500</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-briefcase"></i> Total Marketing Executives</span>
          <div class="count">4,567</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Suppliers</span>
          <div class="count">2,315</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-inr"></i> Total Profit</span>
          <div class="count">7,325</div>
        </div>
      </div>

    </div>';
$page->var['title']="Dashboard";
$page->render();

?>
