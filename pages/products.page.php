<?php
require_once "./classes/page-class.php";
require_once "./classes/sidebar-class.php";
require_once "./classes/top-navigation-class.php";
require_once "./classes/footer-class.php";
require_once "./inc/product-management.php";
$page = new Page;
$sidebar = new Sidebar;
$footer = new Footer;
$navbar = new TopNav;
$prodman = new ProductMan;
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();
$page->var['content']=$prodman->echo();
$page->var['header']="<script src=\"".APP_ROOT."assets/js/bootgrid/jquery.bootgrid.min.js\"></script>";
$page->render();
?>