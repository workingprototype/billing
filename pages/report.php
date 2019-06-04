<?php
    function getbeats()
    {
        $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
        $sql="SELECT beat FROM beat";
        $result = $db->query($sql);
        $sql=$result->fetch_assoc();
        $a = "";
        while ($row=$result->fetch_assoc()) 
            $a.= "<option>".$row['beat']."</option>";
        return $a;
    }
    function tablehead($th){
        $r="<tr>";
        foreach ($th as $key => $value) {
            $r.="<th>$value</th>";
        }
        $r.="</tr>";
        return $r;
    }
        function filtermake($req){
        $r="<script>
        function gotourl(a) {
            window.location = '../csv/'+a+'/';
        }
        </script>";
        if($req=='purchase'){
            $r.="<h4>Filter By</h4><table class='table' >";
            $r.="<tr><th>Invoice Number </th><th>Supplier Name</th><th> Supplier Contact</th><tr>";
            $r.="<tr><td><input id='keywords'  style='max-width:250px' ><input id='beat'  style='display: none' ></td><td><input id='name'  style='max-width:250px' ></td><td><input id='contact'  style='max-width:250px' ></td></tr>";
            $r.="</table>";
        }
        if($req=='sales'){
            $r.="<h4>Filter By</h4><table class='table' >";
            $r.="<tr><th>Invoice Number </th><th> Customer Name</th><th> Customer Contact</th><th> Beat</th><tr>";
            $r.="<tr><td><input id='keywords'  style='max-width:250px' ></td><td><input id='name'  style='max-width:250px' ></td><td><input id='contact'  style='max-width:250px' ></td><td><select id='beat'  style='max-width:250px' >".getbeats()."</select></td></tr>";
            $r.="</table>";
        }
        $r.="<strong>Date From: </strong> <input id='datefr' type='date' style='height:20px'> ";
        $r.="<strong>Date To: </strong> <input id='dateto' type='date' style='height:20px' >";
        $r.=" <button onclick=\"fetchreport()\" class='btn btn-primary' style='width:70px;'>Filter</button>";
        $r.=" <button onclick=\"gotourl('$req')\" class='btn btn-primary' style='width:70px;'>Export</button>";
        $r.=" <button  onclick='window.print()' class='btn btn-danger' style='width:70px;'>Print</button><br><br>";
        //$r.="<div class='form-group'><label>Filter 1: </label><input class='form-control' style='width:300px'></div>";
        return $r;
    }
    function filtercustomer(){
        $r="<script>
        function gotourl() {
            window.location = '../csv/customer/';
        }
        </script>";
        $r.="<h4>Filter By</h4><table class='table' >";
            $r.="<tr><th>Customer Name </th><th>Customer Contact</th><tr>";
            $r.="<tr><td><input id='keywords'  style='max-width:250px' ></td><td><input id='contact'  style='max-width:250px' ></td></tr>";
            $r.="</table><input id='name'  style='visibility:hidden; position:absolute; max-width:250px' >";
        $r.=" <button onclick=\"fetchreport()\" class='btn btn-primary' style='width:70px;'>Filter</button>";
        $r.=" <button onclick=\"gotourl()\" class='btn btn-danger' style='width:70px;'>Export</button>";
        $r.=" <button  onclick='window.print()' class='btn btn-danger' style='width:70px;'>Print</button><br><br>";
        //$r.="<div class='form-group'><label>Filter 1: </label><input class='form-control' style='width:300px'></div>";
        return $r;
    }

    function filterstock(){
        $r="<script>
        function gotourl() {
            a = document.getElementById('keywords').value;
            window.location = '../csv/stock/'+a+'/';
        }
        </script>";
        $r.="<label>Filter Using </label>
        <input placeholder='Product Name' id='keywords' class='form-control' style='width:250px' ><br>
        ";
        $r.=" <button onclick=\"fetchreport()\" class='btn btn-primary' style='width:70px;'>Filter</button>";
        $r.=" <button onclick=\"gotourl()\" class='btn btn-danger' style='width:70px;'>Export</button>";
        $r.=" <button  onclick='window.print()' class='btn btn-danger' style='width:70px;'>Print</button><br><br>";
        //$r.="<div class='form-group'><label>Filter 1: </label><input class='form-control' style='width:300px'></div>";
        return $r;
    }
    function fetchreport($ths,$req){
        $r="<script>
        function fetchreport(){
            var table=document.getElementById('tablebody');
            var ret='$ths';
            var fromdate= document.getElementById('datefr').value;
            var todate= document.getElementById('dateto').value;
            var filter= document.getElementById('keywords').value;
            var name= document.getElementById('name').value;
            var contact= document.getElementById('contact').value;
            var beat = document.getElementById('beat').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table.innerHTML=ret+this.responseText;
                    console.log(this.responseText);
                }
            };
            xhttp.open(\"POST\", \"../function/$req \", true);
            xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
            xhttp.send('beat='+beat+'&from='+fromdate+'&to='+todate+'&keywords='+filter+'&name='+name+'&contact='+contact);
        }
        </script>";
        return $r;
    }

    function fetchcustomerreport($ths,$req){
        $r="<script>
        function fetchreport(){
            var table=document.getElementById('tablebody');
            var ret='$ths';
            var filter= document.getElementById('keywords').value;
            var contact= document.getElementById('contact').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table.innerHTML=ret+this.responseText;
                }
            };
            xhttp.open(\"POST\", \"../function/$req \", true);
            xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
            xhttp.send('keywords='+filter+'&contact='+contact);
        }
        </script>";
        return $r;
    }
    function fetchstock($ths,$req){
        $r="<script>
        function fetchreport(){
            var table=document.getElementById('tablebody');
            var ret='$ths';
            var filter= document.getElementById('keywords').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table.innerHTML=ret+this.responseText;
                }
            };
            xhttp.open(\"POST\", \"../function/$req \", true);
            xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
            xhttp.send('keywords='+filter);
        }
        </script>";
        return $r;
    }
    function fetchproduct($ths,$id){
        $r="<script>
        function fetchreport(){
            var table=document.getElementById('tablebody');
            var ret='$ths';
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table.innerHTML=ret+this.responseText;
                }
            };
            xhttp.open(\"POST\", \"../../function/productrep \", true);
            xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
            xhttp.send('id=$id');
        }
        </script>";
        return $r;
    }
    if($request[1]=='sales'){
        $th=["Sl.No.","Date","Invoice Number","Customer","Customer Contact", "Beat" ,"Total Amount","Credit Date","View/Print",];
        $ths=tablehead($th);
        $title="Sales Report";
        $table= "<table id='tablebody' class='print table table-bordered'>$ths</table>";
        $content=fetchreport($ths,"salesreportget").filtermake("sales").$table;
    }
    if($request[1]=='purchase'){
        $th=["Sl.No.","Date","Invoice Number","Supplier","Supplier Contact","Total Amount","SGST","CGST","View/Print",];
        $ths=tablehead($th);
        $title="Purchase Report";
        $table= "<table id='tablebody' class='print table table-bordered'>$ths</table>";
        $content=fetchreport($ths,"purchasereportget").filtermake("purchase").$table;
    }

    if($request[1]=='stock'){
        $th=["Sl.No.","Product Name","Units In stock" , "View"];
        $ths=tablehead($th);
        $title="Stock Report";
        $table= "<table id='tablebody' class='print table table-bordered'>$ths</table>";
        $content=fetchstock($ths,"stocks").filterstock().$table;
    }
    if($request[1]=='customer'){
        $th=["Sl.No.","Customer Name","Contact", "Purchases", "Paid" ,"Reward" , "Payment Pending" , "View"];
        $ths=tablehead($th);
        $title="Customer Report";
        $table= "<table id='tablebody' class='print table table-bordered'>$ths</table>";
        $content=fetchcustomerreport($ths,"customerrep").filtercustomer().$table;
    }
    if($request[1]=='product'){
        $th=["Sl.No.","Product Name","Batch", "Stock", "Sold"];
        $ths=tablehead($th);
        $title="Stock Report";
        $table= "<table id='tablebody' class='print table table-bordered'>$ths</table>";
        $content=fetchproduct($ths,$request[2]).$table;
    }
    require_once "./classes/page-class.php";
    require_once "./classes/sidebar-class.php";
    require_once "./classes/top-navigation-class.php";
    require_once "./classes/footer-class.php";
    $page = new Page;
    $sidebar = new Sidebar;
    $footer = new Footer;
    $navbar = new TopNav;
    $page->var['navbar']=$navbar->echo();
    $page->var['sidebar']=$sidebar->echo();
    $page->var['footer']=$footer->echo();
    $page->var['content']=$content;
    $page->var['header']="
    <style type=\"text/css\" media=\"print\">
    body {  visibility: hidden; }
    .print {
      visibility: visible;
      position: absolute;
      left:0;
      top:0;
     }
     .print  * {
      visibility: visible;
     }
     .print  a {
        visibility: hidden;
       }
    </style>";
    $page->var['title']="$title";
    $page->render();
?>
