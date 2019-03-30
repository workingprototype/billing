<?php
session_start();
include('config/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:login');
}
else{
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
$page->var['content']="
<script>
function update(){
  var data =[];
  data[1]=document.getElementById(\"aday\").value;
  data[2]=document.getElementById(\"aper\").value;
  data[3]=document.getElementById(\"bday\").value;
  data[4]=document.getElementById(\"bper\").value;
  data[5]=document.getElementById(\"cday\").value;
  data[6]=document.getElementById(\"cper\").value;
  data[7]=document.getElementById(\"dday\").value;
  data[8]=document.getElementById(\"dper\").value;
  data[9]=document.getElementById(\"eday\").value;
  data[0]=document.getElementById(\"eper\").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            alert('Reward Settings Updated');
            console.log(this.responseText);
          }
        };
        var dat = JSON.stringify(data);
        xhttp.open(\"POST\", \"function/rewardsettings \", true);
        xhttp.setRequestHeader(\"Content-type\", \"application/x-www-form-urlencoded\");
        xhttp.send('data='+dat);

}
</script>
<div>Payment Within <input id='aday' value='' > Days : <input id='aper' value='' > % </div><br>
<div>Payment Within <input id='bday' value='' > Days : <input id='bper' value='' > % </div><br>
<div>Payment Within <input id='cday' value=''> Days : <input id='cper' value='' > % </div><br>
<div>Payment Within <input id='dday' value=''> Days : <input id='dper' value='' > % </div><br>
<div>Payment Within <input id='eday' value=''> Days : <input id='eper' value=''> % </div><br>
<button class='btn btn-primary' onclick='update()'>Update</button>
";
$page->var['title']="Reward Settings";
$page->render();
}
?>
