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
        return "<style>
        .notificationbox {
            width: 350px;
            min-height:100px;
            position: fixed;
            background: #2A3F54;
            right:20px;
            padding-left:10px;
            bottom:20px;
            z-index:50;
        }
        .notificationbox h4,p,a {
            color:#dedede;
        }
        .badge-primary{
            background: #27ae60;
        }
        </style>
        <script>
        function setCookie(cname, cvalue) {
            var d = new Date();
            d.setTime(d.getTime() + (60*24*60*60*1000));
            var expires = \"expires=\"+ d.toUTCString();
            document.cookie = cname + \"=\" + cvalue + \";\" + expires + \";path=/\";
          }
        function getCookie(cname) {
            var name = cname + \"=\";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
              var c = ca[i];
              while (c.charAt(0) == ' ') {
                c = c.substring(1);
              }
              if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
              }
            }
            return \"\";
          }
        var audio = new Audio('".APP_ROOT."/assets/audio/to-the-point.mp3');
        var last = getCookie(\"last\");
        if (last != '') {
        }else{
            setCookie(\"last\", '".time()."');
        }
        setInterval(function(){ notifGet() }, 3000);
        function notifGet(){
            last = getCookie(\"last\");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                data=JSON.parse(this.responseText);
                console.log(data);
                if(data[0]!='0'){
                    document.getElementById('notifbadge').innerHTML=data[0];
                    document.getElementById('notifcon').innerHTML=data[1];
                    notifOpen();
                }
            }
            };
            xhttp.open(\"POST\", \"function/notifget \", true);
            xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
            xhttp.send('last='+last);
        }
        function notifClose(){
            document.getElementById('notif').style='visibility:hidden';
        }
        function notifOpen(){
            audio.play();
            document.getElementById('notif').style='visibility:block';
        }
        </script>
        <a id='notif' href=\"#\">
        <div class='notificationbox'><h4>Notification <span id='notifbadge' class=\"badge badge-pill badge-primary\">3</span></h4>
        <p id='notifcon'> New Order has been Placed</p> <button onclick='notifClose()' class='btn btn-danger'>Close</button>
        </div></a>
        <div id=\"sidebar-menu\" class=\"main_menu_side hidden-print main_menu\">
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
        <!-- /menu footer buttons -->
        <script>
        notifClose();
        </script>";
    }

    public function __construct() {       // this constructor can accept submenus which are passed when the object is created

       $this->submenu("Home","dashboard");  //submenu1.1
        // $this->submenu("Blank2","blank"); //submenu1.2
      $this->menu("<i class=\"fa fa-tachometer\"></i>Dashboard"); //Main Menu1

        //
        // $this->submenu("Users","users"); //submenu3.1
        // $this->menu("<i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i>User Management");  //Main Menu3

       $this->submenu("Create & Manage Product Category","addcategory"); //submenu4.1
       // $this->submenu("Edit Product Category","editcategory"); //submenu4.1
       $this->submenu("Create & Manage Sub Category","addsubcategory"); //submenu4.1
       $this->submenu("Create & Manage Unit of Measurement","adduom"); //submenu4.1
        // $this->submenu("Edit Sub Category","editsubcategory"); //submenu4.1
        $this->submenu("Insert Products","insertproducts");
        $this->submenu("Manage, Edit & Display Products","manageproducts");
        // $this->submenu("Import Products","pimport");//submenu4.2
        $this->menu("<i class=\"fa fa-cubes\"></i> Products Management");  //Main Menu4

        $this->submenu("Record New Purchase","purchase"); //submenu4.1
        // $this->submenu("Edit/Delete Purchase","editpurchase"); //submenu4.2
        // $this->submenu("List Purchase Invoices","listpurchase"); //submenu4.3
        $this->menu("<i class=\"fa fa-cubes\"></i> Purchases");  //Main Menu4

        $this->submenu("Record New Sale","sales");  //submenu2.1
        // $this->submenu("Edit/Delete Sale","editsales");  //submenu2.1
        // $this->submenu("List Sales Invoices","listsales");
        $this->submenu("Add & View Payments","addpayments");
        $this->menu("<i class=\"fa fa-users\"></i>Sales"); //Main Menu2

         $this->submenu("Today's Orders","todaysorders"); //submenu4.1
         $this->submenu("Pending Orders","pendingorders"); //submenu4.2
        $this->submenu("Delivered Orders","deliveredorders"); //submenu4.3
        $this->menu("<i class=\"fa fa-line-chart\"> </i> Order Management <span class=\"badge badge-pill badge-primary\">3</span>");  //Main Menu4

        $this->submenu("Goto Store","shopping"); //submenu4.3
        // $this->submenu("Goto Store Admin","shopping/admin"); //submenu4.3
        $this->menu("<i class=\"fa fa-shopping-cart\"> </i> Shopping");  //Main Menu4

        $this->submenu("Stock Report","reports/stock"); //submenu4.3
        $this->submenu("Purchase Report","reports/purchase"); //submenu4.3
        $this->submenu("Sales Report","reports/sales"); //submenu4.3
        $this->submenu("Customer Report","reports/customer"); //submenu4.3
        $this->menu("<i class=\"fa fa-line-chart\"> </i> Reports");  //Main Menu4


        $this->submenu("Business Registration","breg");  //submenu2.1
        $this->submenu("Supplier Registration","supplierreg");  //submenu2.1
        $this->submenu("Retailer Registration","retailerreg");  //submenu2.1
        $this->submenu("Marketing Executive Registration","executivereg");  //submenu2.1
        $this->submenu("Create and Manage Beat Entry","beat");  //submenu2.1
        $this->submenu("Create & Manage Tax Settings","addtax");  //submenu2.1
        $this->submenu("Reward Settings","rewardsettings");  //submenu2.1
        $this->menu("<i class=\"fa fa-users\"></i>Business Settings"); //Main Menu2

        $this->submenu("Change Password","changepassword");
        $this->submenu("Activity Log","log/1");
        $this->menu("<i class=\"fa fa-key\"></i>Account Settings");

    }
}
?>
