<?php
    function tablehead($th){
        $r="<tr>";
        foreach ($th as $key => $value) {
            $r.="<th>$value</th>";
        }
        $r.="</tr>";
        return $r;
    }
    function filtermake($req){
        $r="<label>Filter Keywords </label><input id='keywords' class='form-control' style='width:450px' ><br>";
        $r.="<strong>Date From: </strong> <input id='datefr' type='date' style='height:20px'> ";
        $r.="<strong>Date To: </strong> <input id='dateto' type='date' style='height:20px' >";
        $r.=" <button onclick=\"fetchreport()\" class='btn btn-primary' style='width:70px;'>Filter</button><br><br>";
        //$r.="<div class='form-group'><label>Filter 1: </label><input class='form-control' style='width:300px'></div>";
        return $r;
    }function fetchreport($ths,$req){
        $r="<script>
        function fetchreport(){
            var table=document.getElementById('tablebody');
            var ret='$ths';
            var fromdate= document.getElementById('datefr').value;
            var todate= document.getElementById('dateto').value;
            var filter= document.getElementById('keywords').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    table.innerHTML=ret+this.responseText;
                }
            };
            xhttp.open(\"POST\", \"../function/$req \", true);
            xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
            xhttp.send('from='+fromdate+'&to='+todate+'&keywords='+filter);
        }
        </script>";
        return $r;
    }
    if($request[1]=='sales'){
        $th=["Sl.No.","Date","Invoice Number","Customer","Total Amount","GST","View/Print",];
        $ths=tablehead($th);
        $title="Sales Report";
        $table= "<table id='tablebody' class='table table-bordered'>$ths</table>";
        $content=fetchreport($ths,"salesreportget").filtermake("salesreportget").$table;
    }
    if($request[1]=='purchase'){
        $title="Purchase Report";
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
    $page->var['title']="$title";
    $page->render();
?>