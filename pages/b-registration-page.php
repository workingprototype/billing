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
include "./classes/form-class.php";
$breg= new Form;
$page = new Page;
$sidebar = new Sidebar;
$footer = new Footer;
$navbar = new TopNav;
$breg->action("function/breg");
$breg->input("Account Name","a",1);
$breg->select("Group","b");
$breg->input("Opening Balance","c");
$breg->select("Debit/Credit","d");
$breg->input("Address","e");
$breg->input("City","f");
$breg->input("State","g");
$breg->input("Postal Code","h");
$breg->input("State Code","i");
$breg->input("Phone","j");
$breg->input("Mobile","k");
$breg->email("Email","l");
$breg->input("VAT Number","m");
$breg->input("PAN Number","n");
$breg->input("GSTN","o");
$breg->input("Aadhar","p");
$breg->input("Bank Account Number","q");
$breg->input("IFSC Code of Bank","r");
$page->var['content']=$breg->echo();
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();
$page->var['title']="Business Registration";
$page->render();
}
?>
