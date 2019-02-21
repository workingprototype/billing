<?php
/**
 * Page class
 */
class Page
{
    public $access="public"; 
    /*Access - Public for Unrestricted
    Acccess, private for Admins,
    Extra can be added */
    public $var=['sidebar'=>" ", 'footer'=>" ", 'title'=>" ", 'navbar'=>" ", 'content'=>" ",'header'=>" " ];
    public function render()
    {
        $this->content=str_replace("#$@#%@#%ssdfsd%@$%&^%", $this->var['sidebar'], $this->content);
        $this->content=str_replace("^%^&^%$&^%$86865^%$*%*%", $this->var['footer'], $this->content);
        $this->content=str_replace("%$#^%@TITLE$#^$@@#$%^", $this->var['title'], $this->content);
        $this->content=str_replace("##$@765#@$@#%", $this->var['navbar'], $this->content);
        $this->content=str_replace("85686482626", $this->var['content'], $this->content);
        $this->content=str_replace("234567899876543456", $this->var['header'], $this->content);
        echo $this->content;
    }
    public $content="<!DOCTYPE html>
    <html lang=\"en\">
    
    <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset=\"utf-8\">
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    
      <title>%$#^%@TITLE$#^$@@#$%^</title>
    
      <!-- Bootstrap core CSS -->
    
      <link href=\"".APP_ROOT."assets/css/bootstrap.min.css\" rel=\"stylesheet\">
    
      <link href=\"".APP_ROOT."assets/fonts/css/font-awesome.min.css\" rel=\"stylesheet\">
      <link href=\"".APP_ROOT."assets/css/animate.min.css\" rel=\"stylesheet\">
    
      <!-- Custom styling plus plugins -->
      <link href=\"".APP_ROOT."assets/css/custom.css\" rel=\"stylesheet\">
      <link href=\"".APP_ROOT."assets/css/icheck/flat/green.css\" rel=\"stylesheet\">
    
    
      <script src=\"".APP_ROOT."assets/js/jquery.min.js\"></script>
      234567899876543456
    
      <!--[if lt IE 9]>
            <script src=\"../assets/js/ie8-responsive-file-warning.js\"></script>
            <![endif]-->
    
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
              <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
              <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
            <![endif]-->
    
    </head>
    
    
    <body class=\"nav-md\">
    
      <div class=\"container body\">
    
    
        <div class=\"main_container\">
    
          <div class=\"col-md-3 left_col\">
            <div class=\"left_col scroll-view\">
    
              <div class=\"navbar nav_title\" style=\"border: 0;\">
              <a href=\"index.html\" class=\"site_title\"> <span><?php echo APP_TITLE ?></span></a>
              </div>\n
              <div class=\"clearfix\"></div>\n
    
              <!-- menu prile quick info --<
              <div class=\"profile\">
                <div class=\"profile_pic\">
                  <img src=\"".APP_ROOT."assets/images/img.jpg\" alt=\"...\" class=\"img-circle profile_img\">
                </div>\n
                <div class=\"profile_info\">
       <span>Welcome,</span>
    <?php // TODO: SQL firstname+lastname ?> <h2>John Doe</h2>
                </div>\n
              </div>\n
              <!-- /menu prile quick info -->
              <br />
    
              <!-- sidebar menu --> 
              #$@#%@#%ssdfsd%@$%&^%
              <!-- /sidebar menu -->
            </div>\n
          </div>\n
    
          <!-- top navigation -->
          ##$@765#@$@#%
          <!-- /top navigation -->
    
          <!-- page content -->
          <div class=\"right_col\" role=\"main\">
            <div class=\"\">
              <div class=\"page-title\">
                <div class=\"title_left\">
                  <h3>%$#^%@TITLE$#^$@@#$%^</h3>
                </div>\n
              </div>\n
              <div class=\"clearfix\"></div>\n
              85686482626
    
              
          
          ^%^&^%$&^%$86865^%$*%*%
          </div>\n
          <!-- /page content -->
        </div>\n
    
      </div>\n
    
      <div id=\"custom_notifications\" class=\"custom-notifications dsp_none\">
        <ul class=\"list-unstyled notifications clearfix\" data-tabbed_notifications=\"notif-group\">
        </ul>
        <div class=\"clearfix\"></div>\n
        <div id=\"notif-group\" class=\"tabbed_notifications\"></div>\n
      </div>\n
    
      <script src=\"".APP_ROOT."assets/js/bootstrap.min.js\"></script>
    
      <!-- bootstrap progress js -->
      <script src=\"".APP_ROOT."assets/js/progressbar/bootstrap-progressbar.min.js\"></script>
      <script src=\"".APP_ROOT."assets/js/nicescroll/jquery.nicescroll.min.js\"></script>
      <!-- icheck -->
      <script src=\"".APP_ROOT."assets/js/icheck/icheck.min.js\"></script>
    
      <script src=\"".APP_ROOT."assets/js/custom.js\"></script>
    
      <!-- pace -->
      <script src=\"".APP_ROOT."assets/js/pace/pace.min.js\"></script>
    
    </body>
    
    </html>
    ";

}

?>