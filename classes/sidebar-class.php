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
    public function menu($var,$icon='fa fa-home')
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
        return "<div id=\"sidebar-menu\" class=\"main_menu_side hidden-print main_menu\">
                <div class=\"menu_section\">
                    <h3>Shortcuts</h3>
                    <ul class=\"nav side-menu\">
                        $this->content
                    </ul>
                </div>
            </div>
            <!-- /menu footer buttons -->
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

       $this->submenu("Home","dashboard");  //submenu1.1
        // $this->submenu("Blank2","blank"); //submenu1.2
      $this->menu("<i class=\"fa fa-tachometer\"></i>Dashboard"); //Main Menu1

        //
        // $this->submenu("Users","users"); //submenu3.1
        // $this->submenu("Roles","roles"); //// TODO: Role management not done. Do it with checkboxes
        // $this->menu("<i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i>User Management");  //Main Menu3

       $this->submenu("Create Product Category","addcategory"); //submenu4.1
       // $this->submenu("Edit Product Category","editcategory"); //submenu4.1
       $this->submenu("Create Sub Category","addsubcategory"); //submenu4.1
       $this->submenu("Create Unit of Measurement","adduom"); //submenu4.1
       $this->submenu("Create Sub Unit & Qty","addsubuom"); //submenu4.1
        // $this->submenu("Edit Sub Category","editsubcategory"); //submenu4.1
        $this->submenu("Insert Products","insertproducts");
        $this->submenu("Manage, Edit & Display Products","manageproducts");
        // $this->submenu("Import Products","pimport");//submenu4.2
        $this->menu("<i class=\"fa fa-cubes\"></i> Products Management");  //Main Menu4

        $this->submenu("Record New Purchase","purchase"); //submenu4.1
        $this->submenu("List Purchase Invoices","listpurchase"); //submenu4.3
        $this->menu("<i class=\"fa fa-cubes\"></i> Purchases");  //Main Menu4

        $this->submenu("Record New Sale","sales");  //submenu2.1
        $this->submenu("List Sales Invoices","listsales");
        $this->submenu("View Payments","addpayments");
        $this->menu("<i class=\"fa fa-users\"></i>Sales"); //Main Menu2

         $this->submenu("Today's Orders","todaysorders"); //submenu4.1
         $this->submenu("Pending Orders","pendingorders"); //submenu4.2
        $this->submenu("Delivered Orders","deliveredorders"); //submenu4.3
        $this->menu("<i class=\"fa fa-line-chart\"> </i> Order Management");  //Main Menu4

        $this->submenu("Goto Store","shopping"); //submenu4.3
        // $this->submenu("Goto Store Admin","shopping/admin"); //submenu4.3
        $this->menu("<i class=\"fa fa-shopping-cart\"> </i> Shopping");  //Main Menu4

        $this->submenu("Sales Report","salesreport");
        $this->submenu("Purchase Report","purchasereport"); //submenu4.3
        $this->submenu("Stock Report","reports/stock"); //submenu4.3
        $this->submenu("Purchase Report 2","reports/purchase"); //submenu4.3
        $this->submenu("Sales Report 2","reports/sales"); //submenu4.3
        $this->submenu("Customer Report","reports/customer"); //submenu4.3
        $this->menu("<i class=\"fa fa-line-chart\"> </i> Reports");  //Main Menu4


        $this->submenu("Business Registration","breg");  //submenu2.1
        $this->submenu("Supplier Registration","supplierreg");  //submenu2.1
        $this->submenu("Retailer Registration","retailerreg");  //submenu2.1
        $this->submenu("Beat Entry","beat");  //submenu2.1
        $this->submenu("Tax Settings","addtax");  //submenu2.1
        $this->menu("<i class=\"fa fa-users\"></i>Business Settings"); //Main Menu2

        $this->submenu("Change Password","changepassword");
        $this->menu("<i class=\"fa fa-key\"></i>Account Settings");

    }
}

?>
