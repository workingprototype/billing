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
      .autoitem{
        width:347px;
        background:#ddd;
      }
      .autoitem:hover{
        width:345px;
        margin:1px;
        background:#ddd;
      }
    </style>
    ";
    $buiss='';
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql = "SELECT * FROM business";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $buiss.="<option value=\'".$row['id']."\'>".$row['account_name']."</option>";
      }
    } else {
      echo "0 results"; // No supplier registered.
    }
    $this->r .="
    <script>
    function calcnet(){
      xs=Number(document.getElementById('tot').value);
      ys=Number(document.getElementById('credit').value);
      zs=Number(document.getElementById('logistic').value);
      document.getElementById('netam').value=(xs-(ys+zs));
    }
    function total(a){
      xox=0;
      puts.forEach(function (item,index)
      {
        if(item!='lol'){
          xox+=Number(document.getElementById('totala'+item).value);
        }
      });
      document.getElementById('tot').value = xox;
      calcnet();
    }
    function qtyu(a){
      fx=document.getElementById('qtyu'+a).value;
      fy=document.getElementById('uombase'+a).value;
      fz= fy/fx;
      document.getElementById('base'+a).value=fz;
      disc(a);
      total(a)
    }
    function uombase(a){
      qtyu(a);
    }

    function margin(a){
      fx=document.getElementById('margin'+a).value;
      fy=document.getElementById('qty'+a).value;
      fp=document.getElementById('totala'+a).value;
      fs=document.getElementById('qtyu'+a).value;
      fz= fs*fy;
      fs=fp*(100+Number(fx))/100;
      fz=fs/fz;
      document.getElementById('uomsp'+a).value=fz;
    }
    function disc(a){
      fx=document.getElementById('disc'+a).value;
      fy=document.getElementById('qty'+a).value;
      fz=document.getElementById('uombase'+a).value;
      fx= fx/100;
      fa= fx*fy*fz;
      fb= (1-fx)*fy*fz;
      document.getElementById('disca'+a).value=fa;
      document.getElementById('neta'+a).value=fb;

      fx=document.getElementById('cgst'+a).value;
      fy=document.getElementById('sgst'+a).value;
      fx=fx/100;
      fy=fy/100;
      document.getElementById('cgsta'+a).value=(fb*fx);
      document.getElementById('sgsta'+a).value=(fb*fy);

      cess= document.getElementById('cess'+a).value;
      ex=document.getElementById('totala'+a);
      ex.value=(parseInt((fb*fx))+parseInt((fb*fy))+parseInt((cess))+fb);
      margin(a)
    }
    function remove(no){
      document.getElementById(\"row_\"+no+\"\").outerHTML= '';
      disp[no+1]='';
      puts[no]='lol';
    }
    function autocompleted(id,value,supervalue){
      document.getElementById(id).value= value;
      document.getElementById('hidden_'+id).value= supervalue;
      document.getElementById('drop_'+id).innerHTML='';
    }
    function autocompletex(value,a){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('drop_'+a).innerHTML=this.responseText;
        }
      };
      xhttp.open(\"POST\", \"function/auto\"+a, true);
      xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
      xhttp.send('data='+value);
    }
      function batchch(a,b,c){
        if(a=='new'){
          document.getElementById(b).style.visibility='visible';
          document.getElementById(b).style.position='';
          document.getElementById(c).disabled=false;
        }else{
          var a = JSON.parse(a);
          document.getElementById(b).style.visibility='hidden';
          document.getElementById(b).style.position='absolute';
          document.getElementById(b).value=a[0];
          document.getElementById(c).value=a[1];
          document.getElementById(c).disabled=true;

        }
      }
      function submitty()
      {
        data=[]
        business_name = document.getElementById('hidden_business').value;
        supplier = document.getElementById('hidden_supplier').value;
        invoice = document.getElementById('invoice').value;
        invoicedate = document.getElementById('invoicedate').value;
        transport = document.getElementById('transport').value;
        receivedate = document.getElementById('receivedate').value;
        vehicleno = document.getElementById('vehicle').value;
        delcontact = document.getElementById('delcontact').value;
        puts.forEach(function (item,index)
        {
          if(item!='lol'){
            x=[]
            x[0]=item;
            x[1]=document.getElementById('mrp'+item).value;
            x[2]=document.getElementById('batch'+item).value;
            x[3]=document.getElementById('qty'+item).value;
            x[4]=document.getElementById('qtyu'+item).value;
            x[5]=document.getElementById('uombase'+item).value;
            x[6]=document.getElementById('base'+item).value;
            x[8]=document.getElementById('disc'+item).value;
            x[9]=document.getElementById('disca'+item).value;
            x[10]=document.getElementById('neta'+item).value;
            x[11]=document.getElementById('cgst'+item).value;
            x[12]=document.getElementById('sgst'+item).value;
            x[13]=document.getElementById('cgsta'+item).value;
            x[14]=document.getElementById('sgsta'+item).value;
            x[15]=document.getElementById('cess'+item).value;
            x[16]=document.getElementById('totala'+item).value;
            x[17]=document.getElementById('uomsp'+item).value;
            x[7]=document.getElementById('margin'+item).value;
            x[18]=document.getElementById('dispp'+item).value;
            x[19]=document.getElementById('dispd'+item).value;
            x[20]=document.getElementById('tot').value;
            data[index]=x;
          }
        });
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            alert('Purchase Entry Sucessful!');
            console.log(this.responseText);
          }
        };
        var dat = JSON.stringify(data);
        xhttp.open(\"POST\", \"function/purchase \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('supplier='+supplier+'&invoice='+invoice+'&invoicedate='+invoicedate+'&receivedate='+receivedate+'&transport='+transport+'&delcontact='+delcontact+'&vehicleno='+vehicleno+'&business='+business_name+'&data='+dat);

      }
      var disp =['<tr><th>Batch Code</th>\
      <th>Product Name</th>\
      <th>MRP</th>\
      <th>Qty (cases)</th>\
      <th>Qty(units)</th>\
      <th>Base Rate(Case) </th>\
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
      <th>Margin  </th>\
      <th>UOM SP  (Unit of measurement) </th>\
      <th>Display Price </th>\
      <th>Display Discount  </th>\
      <th>Remove</th>\
      </tr><tr id=\'tail\'></tr>'];

      var i = 1;
      var s=1;
      var puts=[]
      var boxes=0;
      function clicked(a,b,c,d,e,f,g){
        r=s++;
        puts[boxes]=r+'_'+f;

        disp[i] = '<tr id=\'row_'+boxes+'\'><td><select id=\"batchbox'+r+'_'+f+'\" onchange=\"batchch(this.value,\'batch'+r+'_'+f+'\',\'uombase'+r+'_'+f+'\')\"><option value=\"new\">New Batch</option></select><input id=\"batch'+r+'_'+f+'\" style=\"width:80px\"></td>\
        <td>'+a+'</td>\
        <td><input id=\"mrp'+r+'_'+f+'\" style=\"width:80px\" value=\"'+b+'\"></td>\
        <td><input id=\"qty'+r+'_'+f+'\" style=\"width:80px\" onkeyup=\"uombase(\''+r+'_'+f+'\')\"  value=\"\">('+g+')</td>\
        <td><input id=\"qtyu'+r+'_'+f+'\" style=\"width:80px\" onkeyup=\"qtyu(\''+r+'_'+f+'\')\" value=\"\"></td>\
        <td><input id=\"uombase'+r+'_'+f+'\" placeholder=\'Base Rate\' onkeyup=\"uombase(\''+r+'_'+f+'\')\" ></td>\
        <td><input id=\"base'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'Base Rate\'></td>\
        <td><input id=\"disc'+r+'_'+f+'\" style=\"width:150px\" onkeyup=\"disc(\''+r+'_'+f+'\')\" placeholder=\'\'></td>\
        <td><input id=\"disca'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"neta'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"cgst'+r+'_'+f+'\" value=\"'+c+'\" style=\"width:150px\" onkeyup=\"disc(\''+r+'_'+f+'\')\" placeholder=\'\'></td>\
        <td><input id=\"sgst'+r+'_'+f+'\" value=\"'+d+'\" style=\"width:150px\" onkeyup=\"disc(\''+r+'_'+f+'\')\" placeholder=\'\'></td>\
        <td><input id=\"cgsta'+r+'_'+f+'\"  style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"sgsta'+r+'_'+f+'\"  style=\"width:150px\" placeholder=\'\'></td>\
        <td><input value=\"0\" id=\"cess'+r+'_'+f+'\" style=\"width:150px\" onkeyup=\"disc(\''+r+'_'+f+'\')\" placeholder=\'\'></td>\
        <td><input id=\"totala'+r+'_'+f+'\" onkeyup=\"total(\''+r+'_'+f+'\')\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"margin'+r+'_'+f+'\" style=\"width:150px\" onkeyup=\"margin(\''+r+'_'+f+'\')\" placeholder=\'\'></td>\
        <td><input id=\"uomsp'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"dispp'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"dispd'+r+'_'+f+'\" style=\"width:150px\"  placeholder=\'\'></td>\
        <td><button onclick=\'remove('+boxes+')\' class=\'btn btn-danger\'>Remove</button></td>\
        </tr><tr id=\'tail\'></tr>';
        var dis='';
        disp.forEach(
          function(item,index){
            dis += item;
          }
        );
        document.getElementById('tail').outerHTML=disp[i];
        document.getElementById('idrop').innerHTML='';

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('batchbox'+r+'_'+f).innerHTML=this.responseText;
          }
        };
        xhttp.open(\"POST\", \"function/batchbox \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('id='+f);


        boxes++;
        i++
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
    $this->r .="<div class='row'><div class='col-md-4'></br><label>Firm Name :</label>
    <input style='visibility:hidden;position:absolute' id='hidden_business' class='form-control'>
    <input id='business' onkeyup='autocompletex(this.value,\"business\")' class='form-control' autocomplete='chromeisnotnice'>
    <div id='drop_business' style='width:347px;background:#999;position:absolute;z-index:2'>
    </div>
    </div></div>";
    $this->r .="<div class='row'><div class='col-md-4'><label><br/> Supplier Name: </label>
    <input style='visibility:hidden;position:absolute' id='hidden_supplier' class='form-control'>
    <input id='supplier' onkeyup='autocompletex(this.value,\"supplier\")' class='form-control' autocomplete='chromeisnotnice'>
    <div id='drop_supplier' style='width:347px;background:#999;position:absolute;z-index:2'>
    </div>
    </div></div>";
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
      <tr><th>Batch Code</th>
      <th>Product Name</th>
      <th>MRP</th>
      <th>Qty (cases)</th>
      <th>Qty(units)</th>
      <th>Base Rate(Case) </th>
      <th>Base Rate (UOM)  </th>
      <th>Disc % </th>
      <th>Disc Amount  </th>
      <th>Net Amt </th>
      <th>CGST % </th>
      <th>SGST % </th>
      <th>CGST Amt  </th>
      <th>SGST Amt  </th>
      <th>CESS  </th>
      <th>Total Amount  </th>
      <th>Margin  </th>
      <th>UOM SP  (Unit of measurement) </th>
      <th>Display Price </th>
      <th>Display Discount  </th>
      <th>Remove</th>
      </tr><tr id='tail'></tr>
      </table></div>
      <h4>Total : <input id='tot' class='form-control' disabled='true' type='text'  style='width: 300px' ></h4>
      <h4>Less: Credit Note Amount : <input onkeyup='calcnet()' value='0' id='credit' class='form-control'  type='text'  style='width: 300px' ></h4>
      <h4>Less:Logistic Amount : <input onkeyup='calcnet()' value='0' id='logistic' class='form-control' type='text'  style='width: 300px' ></h4>
      <h4>Net Amount : <input id='netam' class='form-control' disabled='true' type='text'  style='width: 300px' ></h4>

      <label>Invoice Number:</label><br>
      <input id='invoice' placeholder='Invoice Number' class='form-control'>

      <label>Invoice date:</label><br>
      <input id='invoicedate' placeholder='Invoice date' type='date' class='form-control' style='width:200px'>

      <label>Transport:</label><br>
      <input id='transport' placeholder='Transport' class='form-control' style='width:400px'>

      <label>Received Date:</label><br>
      <input id='receivedate' type='date' class='form-control' style='width:200px'>

      <label>Vehicle Number:</label><br>
      <input id='vehicle' placeholder='Vehicle Number'  class='form-control' style='width:400px'>

      <label>Delivery Person's Contact:</label><br>
      <input id='delcontact' placeholder='Delivery Contact' class='form-control' style='width:400px'>
      </br></br>
      <button class='btn btn-success' onclick='submitty()'>Record Purchase</button>
    <div>";
  }
}
?>
