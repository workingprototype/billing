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
        $this->content.= "<li><a>$var <span class=\"fa fa-chevron-down\"></span></a>
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

        $this->submenu("Home","home");  //submenu1.1
        $this->submenu("Blank2","blank"); //submenu1.2
        $this->menu("<i class=\"fa fa-tachometer\"></i>Dashboard"); //Main Menu1

        $this->submenu("Business Registration","breg");  //submenu2.1
        $this->submenu("Blank2","blank"); //submenu2.2
        $this->menu("<i class=\"fa fa-users\"></i>Register New Business"); //Main Menu2

        $this->submenu("Users","users"); //submenu3.1
        $this->submenu("Roles","roles"); //// TODO: Role management not done. Do it with checkboxes
        $this->menu("<i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i>User Management");  //Main Menu3

        $this->submenu("Mangage & Display All Products","products"); //submenu4.1
        $this->submenu("Import Products","pimport");//submenu4.2
        $this->menu("<i class=\"fa fa-cubes\"></i> Products Management");  //Main Menu4
    }
}

?>
