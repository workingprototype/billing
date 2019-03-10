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
      function remove(no){
        document.getElementById(\"row_\"+no+\"\").outerHTML= '';
        disp[no+1]='';
        puts[no]='lol';
      }
      function submitty()
      {
        data=[]
        business_name = document.getElementById('business').value;
        supplier = document.getElementById('supplier').value;
        invoice = document.getElementById('invoice').value;
        remarks = document.getElementById('remarks').value;
        puts.forEach(function (item,index)
        {
          if(item!='lol'){
            x=[]
            x[0]=item;
            x[1]=document.getElementById('cost'+item).value;
            x[2]=document.getElementById('tax'+item).value;
            x[3]=document.getElementById('quantity'+item).value;
            x[4]=document.getElementById('total'+item).value;
            x[5]=document.getElementById('batch'+item).value;
            data[index]=x;
          }
        });
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            alert('Purchase Entry Sucessful!');
             location.reload();
            console.log(this.responseText);
          }
        };
        var dat = JSON.stringify(data);
        xhttp.open(\"POST\", \"function/purchase \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('supplier='+supplier+'&invoice='+invoice+'remarks='+remarks+'&business='+business_name+'&data='+dat);

      }

      var disp =['<tr><th>Batch Code</th>\
      <th>Product Name</th>\
      <th>MRP</th>\
      <th>Qty (cases)</th>\
      <th>Qty(units)</th>\
      <th>UOM Base Rate(Case) </th>\
      <th>Base Rate (UOM)  </th>\
      <th>Disc % </th>\
      <th>Disc Amount  </th>\
      <th>Net Amt </th>\
      <th>CGST % </th>\
      <th>SGST % </th>\
      <th>CGST Amt  </th>\
      <th>SGST Amt  </th>\
      <th>CESS  </th>\
      <th>Total Amount  </th>\
      <th>UOM SP  (Unit of measurement) </th>\
      <th>Display Price </th>\
      <th>Display Discount  </th>\
      <th>Remove</th>\
      </tr>'];

      var i = 1;
      var s=1;
      var puts=[]
      var boxes=0;
      function clicked(a,b,c,d,e,f){
        r=s++;
        puts[boxes]=r+'_'+f;

        disp[i] = '<tr id=\'row_'+boxes+'\'><td><input id=\"batch'+r+'_'+f+'\" style=\"width:80px\"></td>\
        <td>'+a+'</td>\
        <td><input id=\"mrp'+r+'_'+f+'\" style=\"width:80px\" value=\"'+b+'\"></td>\
        <td><input id=\"qty'+r+'_'+f+'\" style=\"width:80px\" value=\"\"></td>\
        <td><input id=\"qtyu'+r+'_'+f+'\" style=\"width:80px\" value=\"\"></td>\
        <td><input id=\"uombase'+r+'_'+f+'\" placeholder=\'UOM Base Rate\'></td>\
        <td><input id=\"base'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'Base Rate\'></td>\
        <td><input id=\"disc'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"disca'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"neta'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"cgst'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"sgst'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"cgsta'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"sgsta'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"cess'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"totala'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"uomsp'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"dispp'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"dispd'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><button onclick=\'remove('+boxes+')\' class=\'btn btn-danger\'>Remove</button></td>\
        </tr>';

        i++;
        var dis='';
        disp.forEach(
          function(item,index){
            dis += item;
          }
        );
        document.getElementById('table1').innerHTML=dis;
        document.getElementById('idrop').innerHTML='';
        boxes++;
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
    $users='';
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $sql = "SELECT * FROM supplier";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $users.="<option value='".$row['id']."'>Supplier ID: ".$row['id']." , Name: ".$row['name']."</option>";
    }
  } else {
    echo "0 results"; // No supplier registered.
  }
    $this->r .="<div class='row'><div class='col-md-4'></br><label>Firm Name :</label><select id='business' class='form-control'><option>Business A</option></select></div></div>";
    $this->r .="<div class='row'><div class='col-md-4'><label><br/> Supplier Name: </label><select id='supplier' class='form-control'>".$users."</select></div></div>";
    $this->r .="
    <div class='content' stylr='overflow-x:scroll'>
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
      <div style='overflow-x:scroll'><table class='table table-bordered' id='table1'>

      </table></div>
      <h4>Total : <input class='form-control' disabled='true' type='text'  style='width: 300px' ></h4>
      
      <label>Invoice Number:</label><br>
      <input id='invoice' placeholder='Invoice Number' class='form-control'>
      
      <label>Invoice date:</label><br>
      <input id='invoicedate' placeholder='Invoice date' type='date' class='form-control' style='width:200px'>
      
      <label>Transport:</label><br>
      <input id='transport' placeholder='Transort' class='form-control' style='width:400px'>
      
      <label>Recieved Date:</label><br>
      <input id='recieveddate' type='date' class='form-control' style='width:200px'>
      
      <label>Vehicle Number:</label><br>
      <input id='vehiclenum' placeholder='Vehicle Number'  class='form-control' style='width:400px'>
      
      <label>Delivered Person Contact:</label><br>
      <input id='deliveredperson' placeholder='Delivered Person Constact' class='form-control' style='width:400px'>
      
      <label>Purchase Remarks</label><br>
      <textarea id='remarks' class='form-control' placeholder='Remarks'></textarea><br>
      <button class='btn btn-success' onclick='submitty()'>Record Purchase</button>
    <div>";
  }
}
?>
