<?php
include('./config/config.php');
?>
 <div class="row tile_count">
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Products</span>
          <div class="count">  <?php
            $result = mysqli_query($con, "SELECT COUNT(id) AS `count` FROM `products`");
            $row = mysqli_fetch_array($result);
            $count = $row['count'];
            echo $count;
            ?></div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-shopping-cart"></i> Total Orders: Ecommerce</span>
          <div class="count">  <?php
            $result = mysqli_query($con, "SELECT COUNT(DISTINCT `orderDate`) as total FROM `orders`");
            $row = mysqli_fetch_array($result);
            $count = $row['total'];
            echo $count;
            ?></div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-arrow-up"></i> Total Sales Value</span>
          <div class="count green">  <?php
            $result = mysqli_query($con, "SELECT SUM(finalrate) as total FROM `sales`");
            $row = mysqli_fetch_array($result);
            $count = $row['total'];
            echo $count;
            ?></div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-briefcase"></i> Total Marketing Executives</span>
          <div class="count">4,567</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-user"></i> Total Suppliers</span>
          <div class="count">2,315</div>
        </div>
      </div>
      <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
          <span class="count_top"><i class="fa fa-inr"></i> Total Profit</span>
          <div class="count">7,325</div>
        </div>
      </div>

    </div>
