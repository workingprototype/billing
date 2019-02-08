
<?php
/**
 * Footer
 */
class Footer      //create a class: Footer, and print the HTML elements that you want to display at the bottom of every page.
{
    public function echo()
    {
        return "<!-- footer content -->
        <br><br><br><br>
        <footer>
            <div class=\"copyright-info\">
                <p class=\"pull-right\"> ".APP_NAME."</p>
            </div>
            <div class=\"clearfix\"></div>
        </footer>
        <!-- /footer content -->
        ";
    }
    public function __construct() { // this constructor can accept parameters, which are passed when the object is created
        return $this->echo();
    }
}

?>
