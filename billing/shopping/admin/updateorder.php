<?php
session_start();
error_reporting(0);
include_once 'include/config.php';
if(strlen($_SESSION['alogin'])==0)
  {
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$status=mysqli_real_escape_string($con,$_POST['status']);
$remark=mysqli_real_escape_string($con,$_POST['remark']);//space char

$query=mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
$sql=mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");
echo "<script>alert('Order updated sucessfully...');</script>";
//}
}

$content.='
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print();
}
</script>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">


<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> </div></td>

    </tr>
    <tr height="30">
      <td  class="fontkink1">Order Id:</td>
      <td  class="fontkink">'.$oid.'</td>
    </tr>';
$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
     while($row=mysqli_fetch_array($ret))
      {
$content.='



      <tr height="20">
      <td class="fontkink1" ><b>On Date:</b></td>
      <td  class="fontkink">'.$row['postingDate'].'</td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Status:</b></td>
      <td  class="fontkink">'.$row['status'].'</td>
    </tr>
     <tr height="20">
      <td  class="fontkink1"><b>Remark:</b></td>
      <td  class="fontkink">'.$row['remark'].'</td>
    </tr>


    <tr>
      <td colspan="2"><hr /></td>
    </tr>';
   }

$st='Delivered';
   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     {
       $content.='
   <tr><td colspan="2"><b>
      Product Delivered </b>
      </br></br><input name="Submit2" type="submit" class="btn btn-warning" value="Close this Window " onClick="return f2();" style="cursor: pointer;"  /></td>';
}else  {
      $content.='

    <tr height="50">
      <td class="fontkink1">Status: </td>
      <td  class="fontkink"><span class="fontkink1" >
        <select name="status" style="width:200px;" class="form-control" required="required" >
          <option value="">Select Status</option>
                 <option value="in Process">In Process</option>
                  <option value="Delivered">Delivered</option>
        </select>
        </span></td>
    </tr>

     <tr>
      <td class="fontkink1" >Remark:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="remark" style="width:1000px;" required="required" ></textarea>
        </span></td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  class="btn btn-primary active" value="Update"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;
      <input name="Submit2" type="submit"  class="btn btn-warning"  value="Close this Window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>';
} $content.='
</table>
 </form>
</div>

';
}
require_once "../../classes/page-class.php";
require_once "../../classes/sidebar-class.php";
require_once "../../classes/top-navigation-class.php";
require_once "../../classes/footer-class.php";
$page = new Page;
$sidebar = new Sidebar;
$footer = new Footer;
$navbar = new TopNav;
$page->var['navbar']=$navbar->echo();
$page->var['sidebar']=$sidebar->echo();
$page->var['footer']=$footer->echo();
$page->var['content']=$content;
$page->var['title']=("Update Order Status: ");
$page->render();
?>
