    <?php
    /**
     * TopNav Class
     */
    class TopNav //create a class: TopNav, and print the HTML elements that you want to display as the Top Hover Down Navigation of every page.
    {
        public $user = "Calculator & Admin Options";
        public function echo()
        {
            return "<div class=\"top_nav\">

            <div class=\"nav_menu\">
              <nav class=\"\" role=\"navigation\">
                <div class=\"nav toggle\">
                  <a id=\"menu_toggle\"><i class=\"fa fa-bars\"></i></a>
                </div>

                <ul class=\"nav navbar-nav navbar-right\">
                  <li class=\"\">
                    <a href=\"javascript:;\" class=\"user-profile dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\">
                      <img src=\"images/img.jpg\" alt=\"\">".$this->user."
                      <span class=\" fa fa-angle-down\"></span>
                    </a>
                    <ul class=\"dropdown-menu dropdown-usermenu animated fadeInDown pull-right\">

                    <script>
  //function that displays the value
      function dis(val)
      {
          document.getElementById(\"result\").value+=val
      }

      //function that evaluates the digit and return result
      function solve()
      {
          let x = document.getElementById(\"result\").value
          let y = eval(x)
          document.getElementById(\"result\").value = y
      }

  //function that clears the display
      function clr()
      {
          document.getElementById(\"result\").value = \"\"
      }
   </script>
   <style>
      .title{
      margin-bottom: 10px;
      text-align:center;
      width: 210px;
      color:black;
      }

      input[type=\"button\"]
      {
      background-color:#73879C;
      color: white;
      width:100%
      }

      input[type=\"text\"]
      {
      background-color:white;
      width:100%
      }
   </style>
                    </br>
                    <div class = title >Billing Calculator</div>
    <table border=\"1\">
       <tr>
          <td colspan=\"3\"><input type=\"text\" id=\"result\"/></td>
          <!-- clr() function will call clr to clear all value -->
          <td><input type=\"button\" value=\"c\" onclick=\"clr()\"/> </td>
       </tr>
       <tr>
          <!-- create button and assign value to each button -->
          <!-- dis(\"1\") will call function dis to display value -->
          <td><input type=\"button\" value=\"1\" onclick=\"dis('1')\"/> </td>
          <td><input type=\"button\" value=\"2\" onclick=\"dis('2')\"/> </td>
          <td><input type=\"button\" value=\"3\" onclick=\"dis('3')\"/> </td>
          <td><input type=\"button\" value=\"/\" onclick=\"dis('/')\"/> </td>
       </tr>
       <tr>
          <td><input type=\"button\" value=\"4\" onclick=\"dis('4')\"/> </td>
          <td><input type=\"button\" value=\"5\" onclick=\"dis('5')\"/> </td>
          <td><input type=\"button\" value=\"6\" onclick=\"dis('6')\"/> </td>
          <td><input type=\"button\" value=\"-\" onclick=\"dis('-')\"/> </td>
       </tr>
       <tr>
          <td><input type=\"button\" value=\"7\" onclick=\"dis('7')\"/> </td>
          <td><input type=\"button\" value=\"8\" onclick=\"dis('8')\"/> </td>
          <td><input type=\"button\" value=\"9\" onclick=\"dis('9')\"/> </td>
          <td><input type=\"button\" value=\"+\" onclick=\"dis('+')\"/> </td>
       </tr>
       <tr>
          <td><input type=\"button\" value=\".\" onclick=\"dis('.')\"/> </td>
          <td><input type=\"button\" value=\"0\" onclick=\"dis('0')\"/> </td>
          <!-- solve function call function solve to evaluate value -->
          <td><input type=\"button\" value=\"=\" onclick=\"solve()\"/> </td>
          <td><input type=\"button\" value=\"*\" onclick=\"dis('*')\"/> </td>
       </tr>
    </table>
</br>
</br>
                      <li><a href=\"logout\"><i class=\"fa fa-sign-out pull-right\"></i> Log Out</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>

          </div>";
        }
    }

    ?>
    <!-- <li>
      <a href=\"submitabug:;\">Submit a bug</a>
    </li> -->
