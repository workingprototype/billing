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
require_once "./classes/purchase-edit-class.php";
$page = new Page;
$purchase = new Purchase;
$sidebar = new Sidebar;
$footer = new Footer;
$navbar = new TopNav;
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();
if(isset($request[1])){
    $page->var['content']=$purchase->id($request[1]);
    $page->var['content']=$purchase->echo();
}else{
    $page->var['content']="<h4>Purchase ID not Available.</h4>";
}
$page->var['title']=" Edit/Delete Purchase";
$page->render();
}
?>
