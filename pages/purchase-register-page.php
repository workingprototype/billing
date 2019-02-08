<?php
require_once "./classes/page-class.php";
require_once "./classes/sidebar-class.php";
require_once "./classes/top-navigation-class.php";
require_once "./classes/footer-class.php";
require_once "./classes/purchase-class.php";
$page = new Page;
$purchase = new Purchase;
$sidebar = new Sidebar;
$footer = new Footer;
$navbar = new TopNav;
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();
$page->var['content']=$purchase->echo();
$page->var['header']=$purchase->header();
$page->var['title']="Purchase Entry";
$page->render();

?>