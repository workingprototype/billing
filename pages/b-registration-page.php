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
$breg->select("Group","b",['supplier','customer']);
$breg->input("Opening Balance","c",1);
$breg->select("Debit/Credit","d",['Debit','Credit']);
$breg->input("Address","e",1);
$breg->input("City","f",1);
$breg->input("State","g",1);
$breg->input("Postal Code","h",1);
$breg->input("State Code","i",1);
$breg->input("Phone","j");
$breg->input("Mobile","k");
$breg->email("Email","l");
$breg->input("VAT Number","m",1);
$breg->input("PAN Number","n",1);
$breg->input("GSTN","o",1);
$breg->input("Aadhar","p",1);
$breg->input("Bank Account Number","q",1);
$breg->input("IFSC Code of Bank","r",1);
$page->var['content']=$breg->echo();
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();
$page->var['title']="Business Registration";
$page->render();
}
?>
