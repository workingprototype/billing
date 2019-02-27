<?php
/**
 * Purchase Entry class
 */
class Purchase
{
  #properties
  private $r = " "; //Return Variable

  #methods
  public function echo()
  {
    $this->form();
    return $this->r;
  }
  public function form()
  {
    $this->r .="
    <style>
      .searchitem{
        font-size:16px;
        background:#eee;
      }
      .searchitem:hover {
        font-size:16px;
        background:#fff;
      }
    </style>
    ";
    $this->r .="
    <script>
      var disp =['<tr><th>Product Name</th><th>Cost</th><th>Tax</th><th>Quantity</th><th>Total Amount</th><th>Batch No</th><th>Remove</th></tr>'];
      var i = 1; 
      function clicked(a,b,c,d,e){
        disp[i] = '<tr><td>'+a+'</td><td><input style=\"width:80px\" value=\"'+b+'\"></td><td><input style=\"width:80px\" value=\"'+c+'\"></td><td><input style=\"width:80px\" value=\"'+d+'\"></td><td><input style=\"width:80px\" value=\"'+e+'\"></td><td><input placeholder=\'Batch No\'></td><td><button class=\'btn btn-danger\'>Remove</button></td></tr>';
        i++;
        var dis='';
        disp.forEach(
          function(item,index){
            dis += item;
          }
        );
        document.getElementById('table1').innerHTML=dis;
        document.getElementById('idrop').innerHTML='';
      }
      function isearch(term){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('idrop').innerHTML=this.responseText;
          }
        };
        xhttp.open(\"POST\", \"function/search \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('data='+term);
      }
    </script>
    ";
    $this->r .="<div class='row'><div class='col-md-4'><label>Add Purchase Into :</label><select class='form-control'><option>Business A</option></select></div></div>";
    $this->r .="
    <div class='content'>
      <br>
      <div class='row'>
        <div class='col-md-10'>
          <div class='form-group has-feedback'>
            <i class='glyphicon glyphicon-search form-control-feedback'></i>
            <input onkeyup='isearch(this.value)' type='text' class='form-control' placeholder='Start typing Product ID or Product Name of The Product to be Added' />
          </div>
          <div id='idrop'></div>
        </div>
        <button class='btn btn-primary'><i class='glyphicon glyphicon-plus '></i> Add</button>
      </div>
      <table class='table table-bordered' id='table1'>
        
      </table>
      <label>Purchase Remarks</label><br>
      <textarea class='form-control' placeholder='Remarks'></textarea><br>
      <button class='btn btn-success' >Add Purchase</button>
    <div>";
  }
}
?>