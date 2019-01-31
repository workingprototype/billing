<?php
/**
 * Sidebar
 */
class Sidebar    //create a class: Sidebar, and print the HTML elements that you want to display at the sidebar of every page.
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
    public function echo()  //
    {
        echo "<div id=\"sidebar-menu\" class=\"main_menu_side hidden-print main_menu\">
                <div class=\"menu_section\">
                    <h3>Shortcuts</h3>
                    <ul class=\"nav side-menu\">
                        $this->content
                    </ul>
                </div>
            </div>";    //This will display at the left bottom corner
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
    public function __construct() {       // this constructor can accept submenus which are passed when the object is created
        $this->submenu("Business Registration","breg");  //submenu1.1
        $this->submenu("Blank2","blank"); //submenu1.2
        $this->menu("Menu1"); //Main Menu1
        $this->submenu("Users","users"); //submenu2.1
        $this->submenu("Roles","roles");//submenu2.2
        $this->menu("User Management");  //Main Menu2
        $this->submenu("Sales Register","sales");//submenu3.1
        $this->menu("Sales");  //Main Menu3
        $this->submenu("Purchase Register","purchase");//submenu3.1
        $this->menu("Purchase");  //Main Menu3
    }
}

?>
