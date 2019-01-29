<?php
class NavTitle
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
    public function __construct() {
        $this->echo();
    }
}
?>
<!--
<div class="navbar nav_title" style="border: 0;">
  <a href="./index.php" class="site_title"><i class="fa fa-dashboard"></i> <span><?php //echo APP_TITLE ?></span></a>
</div>
-->
