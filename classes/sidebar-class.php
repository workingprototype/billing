<?php
/**
 * Sidebar
 */
class Sidebar
{
    public $content="";
    public $submenu="";
    public function submenu($var,$link)
    {
        $this->submenu.="<li><a href=\"".APP_ROOT . $link ."\">$var</a>
        </li>";
    }
    public function menu($var)
    {
        $this->content.= "<li><a><i class=\"fa fa-home\"></i> $var <span class=\"fa fa-chevron-down\"></span></a>
            <ul class=\"nav child_menu\" style=\"display: none\">
            $this->submenu
            </ul>
        </li>";
        $this->submenu="";
    }
    public function echo()
    {
        echo "<div id=\"sidebar-menu\" class=\"main_menu_side hidden-print main_menu\">
                <div class=\"menu_section\">
                    <h3>Shortcuts</h3>
                    <ul class=\"nav side-menu\">
                        $this->content
                    </ul>
                </div>
            </div>";
        echo "<!-- /menu footer buttons -->
        <div class=\"sidebar-footer hidden-small\">
          <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Settings\">
            <span class=\"glyphicon glyphicon-cog\" aria-hidden=\"true\"></span>
          </a>
          <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"FullScreen\">
          </a>
          <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Lock\">
            
          </a>
          <a data-toggle=\"tooltip\" data-placement=\"top\" title=\"Logout\">
            <span class=\"glyphicon glyphicon-off\" aria-hidden=\"true\"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->";
    }
    public function __construct() {
        $this->submenu("Blank","blank");
        $this->submenu("Blank2","blank");
        $this->menu("Menu1");
    }
}

?>