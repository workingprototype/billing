<?php
require_once "./classes/page-class.php";
require_once "./classes/sidebar-class.php";
require_once "./classes/top-navigation-class.php";
require_once "./classes/footer-class.php";
$page = new Page;
$page->var['title']="Login";
$page->var['content']="
<div align='center' style='position:absolute; top:50%; left:50%; background:#ccc; padding: 30px; border-radius:5px; width: 350px; height:180px; margin-left:-175px; margin-top:-90px'>
    <label>Username: </label>
    <input placeholder='Username'><br><br>
    <label>Password: </label>
    <input type='password' placeholder='Password'><br><br>
    <button onclick='' class='btn btn-primary'>Login</button>
</div>";
$page->render();

?>