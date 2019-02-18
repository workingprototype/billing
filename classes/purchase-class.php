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
      var disp =['<tr><th>Product Name</th><th>Cost</th><th>Tax</th></tr>'];
      var i = 1; 
      function clicked(a,b,c){
        disp[i] = '<tr><td>'+a+'</td><td><input value=\"'+b+'\"></td><td>'+c+'</td></tr>';
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
        var render='';
        var result = [['Britania','1234'],['Sunfeast','1211'],['Pepsi','12455'],['Coca-cola','151'],['Thumbs up','5442']];
        result.forEach(iterate);
        function iterate(item, index) {
          if(item!='break'){
          render += '<div onclick=\'clicked(\"'+item[0]+'\",\"'+item[1]+'\",\"2342\")\' class=\'searchitem\'>' + item[0] + '</div>';
          }
        }
        document.getElementById('idrop').innerHTML=render;

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
      <table class='table' id='table1'>
        
      </table>
    <div>";
  }
}
?>