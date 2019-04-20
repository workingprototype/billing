<?php
/**
 * Purchase Entry class
 */
class Purchase
{
  #properties
  private $r = " "; //Return Variable
  private $id = 0;
  #methods
  public function echo()
  {
    $this->form();
    return $this->r;
  }
  public function id($id)
  {
    $this->id = $id;
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
        width:200px;
        color:#111;
        background:#ddd;
      }
      .autoitem:hover{
        width:200px;
        margin:1px;
        background:#ddd;
      }
      .free {
        position:fixed;
        width:350px;
        top:50%;
        left:50%;
        background:#fff;
        height: 200px;
        box-shadow: 5px 10px 5px;
        padding:5px;
        margin-top: -100px;
        margin-left: -175px;
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
      document.getElementById('hidden_'+id).innerHTML= supervalue;
      document.getElementById('drop_'+id).innerHTML='';
    }
    function autocompletex(value,a){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById('drop_'+a).innerHTML=this.responseText;
        }
      };
      xhttp.open(\"POST\", \"../function/auto\"+a, true);
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
      function freecancel(a){
        name=document.getElementById('name'+a).value;
        document.getElementById('freebox'+a).style.visibility='hidden';
        document.getElementById('freename'+a).value='';
        document.getElementById('pname'+a).innerHTML= name;
        document.getElementById('name'+a).style.visibility='hidden';
      }
      function freeshow(a){
        document.getElementById('freebox'+a).style.visibility='visible';
      }
      function freeadd(a){
        freename=document.getElementById('freename'+a).value;
        name=document.getElementById('name'+a).value;
        document.getElementById('pname'+a).innerHTML= name +' + Free: ( '+freename+' )';
        document.getElementById('freebox'+a).style.visibility='hidden';
      }
      function submitty()
      {
        data=[]
        business_name = document.getElementById('hidden_business').value;
        supplier = document.getElementById('hidden_supplier').value;
        invoice = document.getElementById('invoice').value;
        logistic = document.getElementById('logistic').value;
        credit = document.getElementById('credit').value;
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
            x[21]=document.getElementById('freename'+item).value;
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
        xhttp.send('supplier='+supplier+'&invoice='+invoice+'&invoicedate='+invoicedate+'&receivedate='+receivedate+'&transport='+transport+'&delcontact='+delcontact+'&vehicleno='+vehicleno+'&business='+business_name+'&data='+dat+'&logistic='+logistic+'&credit='+credit);

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
        <td><span id=\"pname'+r+'_'+f+'\">'+a+'</span><button onclick=\"freeshow(\''+r+'_'+f+'\')\" class=\"btn btn-primary\">Add Free Product</button></td>\
        <td><input id=\"mrp'+r+'_'+f+'\" style=\"width:80px\" value=\"'+b+'\"><input id=\"name'+r+'_'+f+'\" style=\"width:80px\" value=\"'+a+'\">\
        <div class=\"free\" id=\"freebox'+r+'_'+f+'\" align=\"center\"><h4>Attach Free Product</h4> <input id=\"freename'+r+'_'+f+'\" placeholder=\"Free Product Name\" >\
        <br><br><br><button onclick=\"freeadd(\''+r+'_'+f+'\')\" class=\"btn btn-primary\">Enter</button><button onclick=\"freecancel(\''+r+'_'+f+'\')\" class=\"btn btn-danger\">Cancel</button><div>\
        </td>\
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
        freecancel(r+'_'+f);
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

      function clickededit(a,b,c,d,e,f,g){
        r=s++;
        puts[boxes]=r+'_'+f;

        disp[i] = '<tr id=\'row_'+boxes+'\'><td><select id=\"batchbox'+r+'_'+f+'\" onchange=\"batchch(this.value,\'batch'+r+'_'+f+'\',\'uombase'+r+'_'+f+'\')\"><option value=\"new\">New Batch</option></select><input id=\"batch'+r+'_'+f+'\" style=\"width:80px\"></td>\
        <td><span id=\"pname'+r+'_'+f+'\">'+a+'</span><button onclick=\"freeshow(\''+r+'_'+f+'\')\" class=\"btn btn-primary\">Add Free Product</button></td>\
        <td><input id=\"mrp'+r+'_'+f+'\" style=\"width:80px\" value=\"'+b+'\"><input id=\"name'+r+'_'+f+'\" style=\"width:80px\" value=\"'+a+'\">\
        <div class=\"free\" id=\"freebox'+r+'_'+f+'\" align=\"center\"><h4>Attach Free Product</h4> <input id=\"freename'+r+'_'+f+'\" placeholder=\"Free Product Name\" >\
        <br><br><br><button onclick=\"freeadd(\''+r+'_'+f+'\')\" class=\"btn btn-primary\">Enter</button><button onclick=\"freecancel(\''+r+'_'+f+'\')\" class=\"btn btn-danger\">Cancel</button><div>\
        </td>\
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
        freecancel(r+'_'+f);
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
      function netcalc(){
        x=Number(document.getElementById('logi').value);
        y=Number(document.getElementById('crediti').value);
        z=document.getElementById('hidden_total').innerHTML;
        document.getElementById('netamount').innerHTML='Net Amount:'+(z-(x+y))+' Rs';
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
      function purchasecollect(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            data=JSON.parse(this.responseText);
            addtable(data);
          }
        };
        xhttp.open(\"POST\", \"../function/purchasec \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('data=".$this->id."');
      }
      function addtable(data){
        x=1;
        i=0;
        while(x==1) {
          if(data[i][0]==\"OVER\"){
            x=0;
          }else{
            console.log(data);
            document.getElementById('firm').innerHTML='Firm :<a id=\"hidden_firmx\" hidden>'+data[i]['firmid']+'</a> <input onkeyup=\'autocompletex(this.value,\"firmx\")\' id=\"firmx\" value=\"'+data[i]['firmname']+'\" > <div style=\"width:200px;background:#999;position:absolute;z-index:2\" id=\"drop_firmx\"></div>';
            document.getElementById('sup').innerHTML='Supplier Name : <a id=\"hidden_supplier\" hidden>'+data[i]['supid']+'</a> <input onkeyup=\'autocompletex(this.value,\"supplier\")\' id=\"supplier\" value=\"'+data[i]['suppliername']+'\"><div style=\"width:200px;background:#999;position:absolute;z-index:2\" id=\"drop_supplier\"></div>';
            document.getElementById('invoice').innerHTML='Invoice No : <input id=\"inv\" value=\"'+data[i]['invoicenumber']+'\">';
            document.getElementById('indate').innerHTML='Invoice Date : <input id=\"ind\" type=\"date\" value=\"'+data[i]['invoicedate']+'\">';
            document.getElementById('recdate').innerHTML='Received Date : <input id=\"recd\" type=\"date\" value=\"'+data[i]['receiveddate']+'\">';
            document.getElementById('transport').innerHTML='Transport : <input id=\"tspt\" value=\"'+data[i]['transport']+'\">';
            document.getElementById('vehicle').innerHTML='Vehicle Number : <input id=\"vno\" value=\"'+data[i]['vehiclenumber']+'\">';
            document.getElementById('delcon').innerHTML='Delivery Person Contact : <input id=\"delconi\" value=\"'+data[i]['deliveredcontact']+'\">';
            document.getElementById('total').innerHTML='Total :<a id=\"hidden_total\" hidden>'+data[i]['totalwhole']+'</a> '+data[i]['totalwhole']+' Rs';
            document.getElementById('credit').innerHTML='Credit Note Amount: <input onkeyup=\'netcalc()\' id=\"crediti\" value=\"'+data[i]['creditnote']+'\"> Rs';
            document.getElementById('log').innerHTML='Logistic Amount: <input  onkeyup=\'netcalc()\' id=\"logi\" value=\"'+data[i]['logistic']+'\"> Rs';
            document.getElementById('netamount').innerHTML='Net Amount:'+(Number(data[i]['totalwhole'])-(Number(data[i]['creditnote'])+Number(data[i]['logistic'])))+' Rs';
            tablenew(data[i]);
          }
          i=i+1;
        }
      }
      function tablenew(data){
        table=\"<table class ='table table-bordered'><tr><td id='batch'>batchcode: \"+data['batch']+\"</td>\
        <td id='pname'> \"+data['productname']+\"</td>\
        <td id='mrp'>MRP: \"+data['mrp']+\"</td>\
        <td id='qty'>Qantity (cases): \"+data['qtycase']+\"</td>\
        <td id='qtyu'>Qantity (units): \"+data['qtyuom']+\"</td>\
        </tr><tr><td id='base'>Base Rate: \"+data['baseratecase']+\"</td>\
        <td id='baserateu'>Base Rate (Uom): \"+data['baserateuom']+\" </td>\
        <td id='disc'>Discount: \"+data['disc']+\"%</td>\
        <td id='disca'>Discount Amount: \"+data['disca']+\"</td>\
        <td id='neta'>Net Amount: \"+data['neta']+\"</td>\
        </tr><tr><td id='cgst'>CGST: \"+data['cgst']+\"</td>\
        <td id='sgst'>SGST: \"+data['sgst']+\" </td>\
        <td id='cgsta'>CGST Amount : \"+data['cgsta']+\"</td>\
        <td id='sgsta'>SGST Amount: \"+data['sgsta']+\"</td>\
        <td id='cess'>CESS: \"+data['cess']+\"</td></tr>\
        <tr><td id='margin'>Margin: \"+data['margin']+\"%</td>\
        <td id='spuom'>Sales Price (UOM): \"+data['uomsp']+\" </td>\
        <td id='dispp'>Display Price: \"+data['dispp']+\"</td>\
        <td id='dispd'>Display Discount: \"+data['dispd']+\"</td>\
        <td id='free'> Free: \"+data['freeproduct']+\"</td></tr></table>\";
        document.getElementById('tablego').outerHTML=table+\"<div id='tablego'></div>\";
      }
      function update(){
        dat=[];
        dat[0]=document.getElementById('hidden_firmx').innerHTML;
        dat[1]=document.getElementById('hidden_supplier').innerHTML;
        dat[2]=document.getElementById('inv').value;
        dat[3]=document.getElementById('ind').value;
        dat[4]=document.getElementById('recd').value;
        dat[5]=document.getElementById('tspt').value;
        dat[6]=document.getElementById('vno').value;
        dat[7]=document.getElementById('delconi').value;
        dat[8]=document.getElementById('crediti').value;
        dat[9]=document.getElementById('logi').value;
        var dat = JSON.stringify(dat);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
          }
        };
        xhttp.open(\"POST\", \"../function/updatepurchase \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('data=".$this->id."&dat='+dat);
      }
      function deletex(){
        alert('you sure?');
      }
    </script>
    ";
    $this->r .="<span class=\"badge badge-danger\" style='background:orange'>Warning</span>";
    $this->r .="<br><br><br>
      <table class ='table table-bordered'>
      <tr><td id='firm'>Firm Name:</td><td id='sup'>Supplier Name:</td></tr>
      </table>
      <table class ='table table-bordered'>
      <tr><td id='invoice'>Invoice No:</td><td id='indate'>Invoice Date:</td><td id='recdate'>Recieved Date:</td></tr>
      <tr><td id='transport'>Transport:</td><td id='vehicle'>Vehicle Number:</td><td id='delcon'>Delivery Person Contact:</td></tr>
      </table>
      <div id='tablego'></div>
      <table class ='table table-bordered'>
      <tr><td id='total'>Total:</td><td id='credit'>Credit Note Amount:</td><td id='log'>Logistic Amount:</td><td  id='netamount'>Net Amount:</td></tr>
      </table>
      <button class='btn btn-warning' onclick='update()'>Update</button> <button onclick='deletex()' class='btn btn-danger'>Delete</button>
    <script>
    purchasecollect();
    </script>";
  }
}
?>
