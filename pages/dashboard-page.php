<?php
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
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

$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ productPrice:'".$row["productPrice"]."', productPriceBeforeDiscount:".$row["productPriceBeforeDiscount"].", shippingCharge:".$row["shippingCharge"].", rewardsapplicable:".$row["rewardsapplicable"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

$query2 = "SELECT purchase.timestamp as timer,business.account_name as bname,purchase.count(invoicenumber) as invoicecount,purchase.totalwhole as ptotal, FROM purchase join business on business.id = purchase.business";
$result2 = mysqli_query($con, $query2);
$chart_data2 = '';
while($row = mysqli_fetch_array($result2))
{
 $chart_data2 .= "{ productPrice:'".$row["productPrice"]."', productPriceBeforeDiscount:".$row["productPriceBeforeDiscount"].", shippingCharge:".$row["shippingCharge"].", rewardsapplicable:".$row["rewardsapplicable"]."}, ";
}
$chart_data2 = substr($chart_data2, 0, -2);



$result1 = mysqli_query($con, "SELECT COUNT(id) AS `count` FROM `products`");
$row1 = mysqli_fetch_array($result1);
$count1 = $row1['count'];

$result2 = mysqli_query($con, "SELECT COUNT(DISTINCT `orderDate`) as total FROM `orders`");
$row2 = mysqli_fetch_array($result2);
$count2 = $row2['total'];

$result3 = mysqli_query($con, "SELECT count(invoice) as total FROM `sales`");
$row3 = mysqli_fetch_array($result3);
$count3 = $row3['total'];

// $count 4 : need to total Marketing people

$result5 = mysqli_query($con, "SELECT count(id) as total FROM `supplier`");
$row5 = mysqli_fetch_array($result5);
$count5 = $row5['total'];

$result6 = mysqli_query($con, "SELECT SUM(finalrate) as total FROM `sales`");
$row6 = mysqli_fetch_array($result6);
$count6 = $row6['total'];

$page->var['content']='    <div class="row tile_count">
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Retailers</span>
          <div class="count">'.$count1.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-shopping-cart"></i> Total Orders: Ecommerce</span>
          <div class="count">'.$count2.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-arrow-up"></i> Total Sales</span>
          <div class="count green">'.$count3.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-briefcase"></i> Total Marketing Executives</span>
          <div class="count">'.$count1.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Suppliers</span>
          <div class="count">'.$count5.'</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-inr"></i> Total Profit</span>
          <div class="count green">'.$count6.'</div>
        </div>
      </div>

    </div>

		  <link rel="stylesheet" href="./assets/css/morris.css">
		  <script src="./assets/js/jquery-1.9.0.js"></script>
		  <script src="./assets/js/raphael-min.js"></script>
		  <script src="./assets/js/moris/morris.min.js"></script>

		 </head>
		 <body>
		  <br /><br />
		  <div class="container" style="width:900px;">
		   <h2 align="center">Products Report</h2>
		   <br /><br />
		   <div id="productchart"></div>
		   <div id="purchasechart"></div>
		  </div>
		 </body>
		</html>

		<script>
		Morris.Bar({
		 element : "productchart",
		 data:['.$chart_data.'],
		 xkey:"productPrice",
		 ykeys:["productPriceBeforeDiscount", "shippingCharge", "rewardsapplicable"],
		 labels:["Product Price", "Shipping Charge", "Rewards"],
		 hideHover:"auto",
		 stacked:true
		});
		Morris.Bar({
		 element : "purchasechart",
		 data:['.$chart_data.'],
		 xkey:"productPrice",
		 ykeys:["productPriceBeforeDiscount", "shippingCharge", "rewardsapplicable"],
		 labels:["Product Price", "Shipping Charge", "Rewards"],
		 hideHover:"auto",
		 stacked:true
		});
		</script>

';
$page->var['title']="Dashboard";
$page->render();
}
?>
