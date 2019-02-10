<?php
/**
 * Purchase Entry class
 */
class Purchase
{    
    public function echo()
    {
        return $this->ret;
    }
    public function header()
    {
        return $this->head;
    }
    public function script()
    {
        return $this->script;
    }

// Initializing the Return Property
    private $ret = "<form>
    <label>Add to Business:</label>
    <select class='form-control lezs'>
    <option> Business A </option>
    </select><br>
    <table class=\"table table-bordered\">
    <thead>
      <tr>
        <th scope=\"col\" width='3'>Product ID</th>
        <th scope=\"col\">Product Name</th>
        <th scope=\"col\" width='3'>Quantity</th>
        <th scope=\"col\"  width='3'>Cost</th>
      </tr>
    </thead>
    <tbody>
      <tr class='bg-blue'>
      <td><input id='product_id' class='form-control lezz'></td>        
        <td>
      <input id='product_name' class=\"form-control\" onkeypress=\"return submit_name(event)\" placeholder=\"Product Name or Code\">
      </td>
        <td><input id='product_q' class='form-control lezz'></td>
        <td><input id='product_c' class='form-control lezz'></td>
      </tr>
      <tr id='last_row'>
      </tr>
    </tbody>
  </table>
  </form>";
    private $script = "
    <script>
      function submit_name(e) {
        if (e.keyCode == 13) {
          var pname = document.getElementById(\"product_name\").value;
          var pid = document.getElementById(\"product_id\").value;
          var pquantity = document.getElementById(\"product_q\").value;
          var pcost = document.getElementById(\"product_c\").value;
          document.getElementById(\"product_name\").value = '';
          document.getElementById(\"product_id\").value = '';
          document.getElementById(\"product_q\").value = '';
          document.getElementById(\"product_c\").value = '';
          add_row(pname,pid,pquantity,pcost);

        }
      }
      function add_row(a,b,c,d){
        var last_row = document.getElementById('last_row');
        last_row.outerHTML =\"<tr id='last_row'>\
        </tr>\
        <tr><td>\"+b+\"</td><td>\"+a+\"</td> \
          <td>\"+c+\"</td>\
          <td>\"+d+\"</td></tr>\";
      }
    </script>
    
    ";
    private $head = "<style>
    .lezz{
        width:100px;
     }
     .lezs{
        width:300px;
     }
    </style> "; 
}

?>
