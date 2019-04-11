<?php
if(!isset($request[1])OR($request[1]=="")){
    $request[1]=1;
}
if(($request[1]<1)){
    $request[1]=1;
}
$s=50;
$lowerlimit=($request[1]*$s)-$s;
$limit=$s;
$notif="<table class='table table-bordered'>";
$db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
$sql = "SELECT * FROM notifications WHERE type=2 ORDER BY  timestamp DESC LIMIT $lowerlimit,$limit";
$result = $db->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $data=json_decode($row['data']);
      $notif.="<tr><td>".date("D d-M-Y, H:m:s",$row['timestamp'])."</td><td>".$data[0]."</td></tr>";
  }
} else {
    $notif.="<h2>DATA OVER</h2>";
}
$notif.="</table>";
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
    $page->var['content']= "<strong>Current date and Time :".date("D d-M-Y, H:m:s",time())."</strong>";
    $page->var['content'].=$notif;
    $page->var['content'].="<a href='./".($request[1]-1)."'><button class='btn btn-primary'><< Previous </button></a><a href='./".($request[1]+1)."'><button class='btn btn-primary'>Next >></button></a>";
    $page->var['title']="Activity Log";
    $page->render();
?>