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
      <tr>
      <td><input class='form-control lezz'></td>        
        <td>
      <input class=\"form-control\" placeholder=\"Product Name or Code\">
      </td>
        <td><input class='form-control lezz'></td>
        <td><input class='form-control lezz'></td>
      </tr>
    </tbody>
  </table>
  </form>"; 
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
