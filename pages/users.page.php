<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> <?php echo APP_TITLE; ?> </title>

  <!-- Bootstrap core CSS -->

  <link href="<?php echo APP_ROOT; ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <link href="<?php echo APP_ROOT; ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo APP_ROOT; ?>assets/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="<?php echo APP_ROOT; ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo APP_ROOT; ?>assets/css/icheck/flat/green.css" rel="stylesheet">


  <script src="<?php echo APP_ROOT; ?>assets/js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Code -->


        <!-- Code -->
</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

        <?php require './classes/left-top-class.php';
        $leftnav= new NavTitle;
        ?>
          <div class="clearfix"></div>
          <br />

          <!-- menu prile quick info -->

          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <?php require "./classes/sidebar-class.php";
          $sidebar = new Sidebar;
          $sidebar->echo();
          ?>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <?php require "./classes/top-navigation-class.php";
          $topnav = new TopNav;
          $topnav->echo();
          ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>User Management</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel" style="height:600px;">


                  <ul class="nav navbar-right panel_toolbox">


                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>

<!-- Code -->
<?php // include './user-management/user.table.php'; ?>
<!-- Code -->

                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
      <?php
      include('footer.php');
      ?>

        <!-- /footer content -->

      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="<?php echo APP_ROOT; ?>assets/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="<?php echo APP_ROOT; ?>assets/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo APP_ROOT; ?>assets/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="<?php echo APP_ROOT; ?>assets/js/icheck/icheck.min.js"></script>

  <script src="<?php echo APP_ROOT; ?>assets/js/custom.js"></script>

  <!-- pace -->
  <script src="<?php echo APP_ROOT; ?>assets/js/pace/pace.min.js"></script>

</body>

</html>
