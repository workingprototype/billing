<?php
/**
 * Sales Entry class
 */
class Sales
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
    $supps='';
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql = "SELECT * FROM business";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $supps.="<option value=\'".$row['id']."\'>".$row['account_name']."</option>";
      }
    } else {
      echo "0 results"; // No supplier registered.
    }
    $this->r .="
    <script>

      function total(){
        xox=0;
        puts.forEach(function (item,index)
        {
          if(item!='lol'){
            xox+=Number(document.getElementById('total'+item).value);
          }
        });
        document.getElementById('tot').value = xox.toFixed(2);
        discountx();
      }

    function autocompleted(id,value,supervalue){
      document.getElementById(id).value= value;
      document.getElementById('hidden_'+id).value= supervalue;
      document.getElementById('drop_'+id).innerHTML='';
    }
    function autocompletex(value,a){
      var beat = document.getElementById('beats').value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('drop_'+a).innerHTML=this.responseText;
        }
      };
      xhttp.open(\"POST\", \"function/auto\"+a, true);
      xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
      xhttp.send('beat='+beat+'&data='+value);
    }

      function remove(no){
        document.getElementById(\"row_\"+no+\"\").outerHTML= '';
        disp[no+1]='';
        puts[no]='lol';
        total();
      }
      function batchch(a,b){
        batch=document.getElementById('batch'+a).value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            data=JSON.parse(this.responseText);
            document.getElementById('base'+a).value=data[0].toFixed(2);
            pname=document.getElementById('pname'+a).value;
            document.getElementById('utc'+a).value=data[1];
            document.getElementById('disc'+a).value=data[2];
            if(data[3]!='--null--'){
              document.getElementById('name'+a).innerHTML=pname+' + Free ('+data[3]+')';
            }else{
              document.getElementById('name'+a).innerHTML=pname;
            }
          }
        };
        xhttp.open(\"POST\", \"function/batchch \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('batch='+batch+'&id='+b);
      }
      function qtych(a){
        qtyz=document.getElementById('qty'+a).value;
        total();
      }
      function utc(a){
        qtych(a);
      }
      function discountch(a){
        qtych(a);
      }
      function submitty()
      {
        data=[];
        customer = document.getElementById('hidden_customer').value;
        beats = document.getElementById('beats').value;
        billtype = document.getElementById('bill').value;
        puts.forEach(function (item,index)
        {
          if(item!='lol'){
            x=[]
            x[0]=item;
            x[1]=document.getElementById('batch'+item).value;
            x[2]=document.getElementById('firm'+item).value;
            x[3]=document.getElementById('hsn'+item).value;
            x[4]=document.getElementById('utc'+item).value;
            x[5]=document.getElementById('mrp'+item).value;
            x[6]=document.getElementById('qty'+item).value;
            x[8]=document.getElementById('base'+item).value;
            x[9]=document.getElementById('amount'+item).value;
            x[10]=document.getElementById('disc'+item).value;
            x[11]=document.getElementById('gst'+item).value;
            x[12]=document.getElementById('gsta'+item).value;
            x[13]=document.getElementById('total'+item).value;
            x[14]=document.getElementById('finalrate'+item).value;
            data[index]=x;
          }
        });
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            data=JSON.parse(this.responseText);
            window.location = './invoice/sales/'+data[1];
          }
        };
        var rewardsz = document.getElementById('rewardsx').value;
        var total = document.getElementById('tot').value;
        var dat = JSON.stringify(data);
        xhttp.open(\"POST\", \"function/sales \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('total='+total+'&customer='+customer+'&beats='+beats+'&bill='+billtype+' &data='+dat +'&discount='+rewardsz );

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
        disp[i] = '<tr id=\'row_'+boxes+'\'><td><select onchange=\"batchch(\''+r+'_'+f+'\','+f+')\" id=\"batch'+r+'_'+f+'\" style=\"width:80px\"><option></option>'+d+'</select></td>\
        <td><select id=\"firm'+r+'_'+f+'\" style=\"width:80px\">".$supps."</select></td>\
        <td id=\"name'+r+'_'+f+'\" >'+a+'</td>\
        <td><input hidden=\"hidden\" id=\"pname'+r+'_'+f+'\" value=\"'+a+'\"><input disabled=\'true\' id=\"hsn'+r+'_'+f+'\" style=\"width:80px\" value=\"'+c+'\"></td>\
        <td><input disabled=\'true\' onkeyup=\"utc(\''+r+'_'+f+'\')\" id=\"utc'+r+'_'+f+'\" style=\"width:80px\"></td>\
        <td><input disabled=\'true\' id=\"mrp'+r+'_'+f+'\" value=\"'+b+'\" ></td>\
        <td><input onkeyup=\"qtych(\''+r+'_'+f+'\')\" id=\"qty'+r+'_'+f+'\" style=\"width:150px\"  ></td>\
        <td><select><option>'+g+'</option><option>Pcs</option></select></td>\
        <td><input onkeyup=\"basech(\''+r+'_'+f+'\')\" id=\"base'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"amount'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input onkeyup=\"discountch(\''+r+'_'+f+'\')\" id=\"disc'+r+'_'+f+'\" value=\'0\' style=\"width:150px\" placeholder=\'\'></td>\
        <td><input onkeyup=\"gstch(\''+r+'_'+f+'\')\" value=\"'+e+'\" id=\"gst'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input onkeyup=\"qtych(\''+r+'_'+f+'\')\" id=\"gsta'+r+'_'+f+'\" style=\"width:150px\" placeholder=\'\'></td>\
        <td><input id=\"total'+r+'_'+f+'\" style=\"width:150px\" onkeyup=\'total()\' placeholder=\'\'></td>\
        <td><input id=\"finalrate'+r+'_'+f+'\" style=\"width:150px\"  placeholder=\'\'></td>\
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
        boxes++;
        i++
      }
      var rewardx=0;
      function customer(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            rewardx=this.responseText;
            document.getElementById(\"rewardsx\").value=rewardx;
            discountx(rewardx);
          }
        };
        xhttp.open(\"POST\", \"function/customer \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('data='+id);
      }
      function discountx(){
        val=document.getElementById('rewardsx').value;
        dex=document.getElementById('tot').value;
        document.getElementById('final').value=dex-val;
      }
      function isearch(term){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('idrop').innerHTML=this.responseText;
          }
        };
        xhttp.open(\"POST\", \"function/searchi \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('data='+term);
      }
    </script>
    ";
    $users='';
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $users.="<option value='".$row['id']."'>Retailer ID: ".$row['id']." , Name: ".$row['name']."</option>";
      }
    } else {
      echo "0 results"; // No retailer registered.
    }
  $beats='';
  $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
  $sql = "SELECT * FROM beat";
  $result = $db->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $beats.="<option value='".$row['id']."'>".$row['beat']."</option>";
    }
  } else {
    echo "0 results"; // No retailer registered.
  }
    $this->r .="<div class='row'><div class='col-md-4'><label><br/> Beat : </label><select id='beats' class='form-control'>".$beats."</select></div></div>";
    $this->r .="<div class='row'><div class='col-md-4'></br><label>Customer Name :</label>
    <input style='visibility:hidden;position:absolute' id='hidden_customer' class='form-control'>
    <input id='customer' onkeyup='autocompletex(this.value,\"customer\")' class='form-control' autocomplete='chromeisnotnice'>
    <div id='drop_customer' style='width:347px;background:#999;position:absolute;z-index:2'>
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
      <th>Firm Name</th>
      <th>Product Name</th>
      <th>HSN Code</th>
      <th>UTC</th>
      <th>MRP</th>
      <th>Qty</th>
      <th>Unit</th>
      <th>Base Rate</th>
      <th>Amount</th>
      <th>Discount %</th>
      <th>GST % </th>
      <th>GST Amt  </th>
      <th>Total Amount </th>
      <th>Final Rate </th>
      <th>Remove</th>
      </tr><tr id='tail'></tr>
      </table></div>
      <h4>Rewards :<input id='rewardsx' onkeyup=\"discountx()\" class='form-control'  type='text'  style='width: 300px' ></h4>

      <h4>Total : <input id='tot' class='form-control' disabled='true' type='text'  style='width: 300px' ></h4>
      <h4>Final Amount : <input id='final' class='form-control' disabled='true' type='text'  style='width: 300px' ></h4>
      <label>Bill Type:</label><br>
      <select style='width:300px' id='bill' class='form-control'><option>Cash</option><option>Credit</option></select>
      <br>
      <button class='btn btn-success' onclick='submitty()'>Submit And Generate Invoice</button>
    <div>";
  }
}
?>
