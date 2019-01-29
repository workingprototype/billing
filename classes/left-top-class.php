<?php
/**
 * NavTitle Class
 */
class NavTitle   //create a class: NavTitle, and print the HTML elements that you want to display as the Navigation Title of every page.
{
    public function echo()
    {
        echo "<!-- Navbar Title -->
        <div class='navbar nav_title' style='border: 0;'>
          <a href='./index.php' class='site_title'><span> FMCG Billing </span></a>
        </div>
        <!-- Navbar Title -->
        ";
    }
    public function __construct() {  // this constructor can accept parameters, which are passed when the object is created
        $this->echo();
    }
}
?>
<!--
<div class="navbar nav_title" style="border: 0;">
  <a href="./index.php" class="site_title"><i class="fa fa-dashboard"></i> <span><?php //echo APP_TITLE ?></span></a>
</div>
-->
