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
$page->var['content']="
<div>Payment Within <input id='aday' value='' > Days : <input id='aper' value='' > % </div><br>
<div>Payment Within <input id='bday' value='' > Days : <input id='bper' value='' > % </div><br>
<div>Payment Within <input id='cday' value=''> Days : <input id='cper' value='' > % </div><br>
<div>Payment Within <input id='dday' value=''> Days : <input id='dper' value='' > % </div><br>
<div>Payment Within <input id='eday' value=''> Days : <input id='eper' value=''> % </div><br>
<button class='btn btn-primary'>Update</button>
";
$page->var['title']="Reward Settings";
$page->render();

?>