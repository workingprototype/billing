<?php

$invoice=$request[1];
    $db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);
    $sql = "SELECT * FROM sales WHERE invoice='$invoice'";
    $result = $db->query($sql);
    $rows=[];
    $stat=0;
    $sno=1;
    $total=0;
    $ix=0;
    $firms=[];
    $fpointer=0;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $customer = $row['customer'];
        $productid=$row['product'];
        $sqz="SELECT * FROM products WHERE id='$productid'";
        $res=$db->query($sqz);
        $product=$res->fetch_assoc();
        $productname=$product['productName'];
        $hsn=$product['hsnno'];
        $utc=$row['utc'];
        $qty=$row['qty'];
        $uom=$row['uom'];
        $mrp=$row['mrp'];
        $reward=$row['remarks'];
        $total+=$row['total'];
        $tobepaid=$row['paymentdue'];
        $base=$row['baserate'];
        $am=$row['amount'];
        $dis=($row['dis']/100)*$am;
        $taxable=$am-$dis;
        $taxable=intval($taxable*100)/100;
        $gst=$row['gst'];
        $cgst=$row['gst']/2;
        $sgst=$row['gst']/2;
        $business=$row['business'];
        $beat=$row['beat'];
        $sqz="SELECT * FROM beat WHERE id='$beat'";
        $reqc=$db->query($sqz);
        $beat=$reqc->fetch_assoc()['beat'];
        $gsta=$row['gstamount'];
        $cgsta=intval(($row['gstamount']/2)*100)/100;
        $sgsta=$cgsta;
        $tot=$row['total'];
        $fr=$row['finalrate'];
        $invoice_date = date("d-M-Y", $row['timestamp']);
        $rows[$ix++]="
        $ix</td>
        $productname</td>
        $hsn</td>
        $qty $uom</td>
        $mrp</td>
        $base</td>
        $am</td>
        $dis</td>
        $taxable</td>
        $cgst</td>
        $cgsta</td>
        $sgst</td>
        $sgsta</td>
        $tot";
        foreach ($firms as $key => $firm) {
          if($firm==$business){
            $stat=1;
          }
        }
        if($stat==1){
          $stat=0;
        }else{
          $firms[$fpointer++]=$business;
        }
      }
      $sql = "SELECT * FROM users WHERE id='$customer'";
      $res = $db->query($sql);
      if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            $customer_name=$row['name'];
            $customer_gstin=$row['gstin'];
            $customer_contact=$row['contactno'];
            $customer_address=$row['billingAddress'];
            $state=$row['billingState'];
        } 
      }
      $firmd='';
      foreach ($firms as $key => $firm) {
        $sql = "SELECT * FROM business WHERE id='$firm'";
        $res = $db->query($sql);
        if ($res->num_rows > 0) {
         $row = $res->fetch_assoc();
         $firmn=$row['account_name'];
         $gstin=$row['gstin'];
         $stateb=$row['state'];
         $conb=$row['phone'];
         $addr=$row['address'];

        }
        $firmd.="<tr>
        <td style='border:0'>GST IN : $gstin  </th>
        <td align='center' style='border:0; font-size:23px;'><strong>$firmn</strong></th>
        <th style='border:0; width:200px'>TAX INVOICE</th>
        </tr>";
      } 
      $table= "<table style='margin:0' class='table'>
      $firmd
      <tr>
      <td style='border:0'>STATE : $stateb </th>
      <td align='center' style='border:0'>$addr</th>
      <td style='border:0'>CONTACT NO : $conb </th>
      </tr>
      </table>";
      $table.="
      <table style='margin:0;' class='table table-bordered'>
      <tr>
      <td><strong>Retailer Name: </strong> $customer_name </td>
      <td><strong>INVOICE NO:</strong> $invoice </td>
      </tr>
      <tr>
      <td><strong>Address: </strong> $customer_address </td>
      <td><strong>INVOICE DATE:</strong> $invoice_date </td>
      </tr>
      <tr>
      <td><strong>Mobile No: </strong> $customer_contact </td>
      <td><strong>Beat (Area):</strong> $beat </td>
      </tr>
      <tr>
      <td><strong>State: </strong> $state </td>
      <td><strong>Bill Type:</strong> <span id='billt'>Original Copy</span></td>
      </tr>
      </table>
      ";
      $iz=[[],0,[],0];   
      //store all the product id to an array iz[0]
      foreach ($rows as $key => $value) {
        $value=explode("</td>",$value);
        $iz[0][$iz[1]++]=$value[0];
      }
      $iz[1]=0;
      //add the info to an array row by row, if duplicate found after combine both if duplicate found before then mark as duplicate;
      foreach ($iz[0] as $k => $val) {
        $iz[2][$k]="N";              
        foreach ($iz[0] as $key => $value) {
          if($value==$val){
            if($k>$key){
              $iz[2][$k]="D";
            }elseif ($k<$key) {
              $iz[2][$k]="C";              
            }
          }
        }
      }
      function combined($k,$a){
        $pid=explode("</td>",$a[$k]);$pid=$pid[0];
        $acc=[0,0,0,0,0,0,0,0,0,0,0];
        foreach ($a as $key => $value) {
          $value=explode("</td>",$value);
          if($value[0]==$pid){
            $acc[0]=$value[0];
            $acc[1]=$value[1];
            $acc[2]=$value[2];
            $acc[3]=$value[3];
            $acc[4]+=$value[4];
            $acc[5]=$value[5];
            $acc[6]=$value[6];
            $acc[7]=$value[7];
            $acc[8]=$value[8];
            $acc[9]+=$value[9];
            $acc[10]+=$value[10];
            $acc[11]=$value[11];
          }
        }
        var_dump($acc);
        return implode("</td>",$acc);
      }
      $newrow=[];
      foreach ($iz[2] as $key => $value) {
        if($value=="N"){
          $newrow[$iz[3]++]=$rows[$key];
        }elseif ($value=="C") {
          $newrow[$iz[3]++]=combined($key,$rows);          
        }elseif ($value=="D") {
          # code...
        }
      }
      $rows='';
      foreach ($newrow as $key => $value) {
        $value=explode("</td>",$value);
        $val='';
        foreach ($value as $k => $v) {
          $val.="<td>".$v."</td>";
        }
        $rows.="<tr>".$val."</tr>";
    }
}

$rowx = explode("</tr>",$rows);
$rows='';
$tota=0;
$totd=0;
$tott=0;
$totc=0;
$tots=0;
$tottt=0;
foreach($rowx as $key => $row){
  if($row!=""){
  	$cell='';
  	$cellx=explode("<td>",$row);
  	//here
  	foreach($cellx as $k => $celld){
  	  if(($celld!="")){
  	  	if($k==0){
  	    	$cell .=$celld;
  	    }elseif($k==2){
  	    	$cell .="<td colspan=\"5\">".$celld;
  	    }else{
  	    	if($k==7){
  	    	  $m = explode("</td>",$celld)[0];
  	    	  $tota+=(float)$m;
  	    	}elseif($k==8){
  	    	  $m = explode("</td>",$celld)[0];
  	    	  $totd+=(float)$m;
  	    	}
  	    	elseif($k==9){
  	    	  $m = explode("</td>",$celld)[0];
  	    	  $tott+=(float)$m;
  	    	}
  	    	elseif($k==11){
  	    	  $m = explode("</td>",$celld)[0];
  	    	  $totc+=(float)$m;
  	    	}
  	    	elseif($k==13){
  	    	  $m = explode("</td>",$celld)[0];
  	    	  $tots+=(float)$m;
  	    	}
  	    	elseif($k==14){
  	    	  $m = explode("</td>",$celld)[0];
  	    	  $tottt+=(float)$m;
  	    	}
  	    	$cell .="<td>".$celld;
  	    }
  	  }
	} 
	//here it ends
  	$rows .= $cell."</tr>";
  }
} 


function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise ;
}


ob_start();
require_once('tcpdf/tcpdf.php');
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle("Invoice");
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins('5', '5', '5');
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
$obj_pdf->SetAutoPageBreak(TRUE, 10);
$obj_pdf->SetFont('helvetica', '', 7);
$obj_pdf->AddPage();


$roundt= round($tottt,0.2);
$round = $roundt-$tottt;
if($round<0){
  $roundt=round($tottt+1 ,2);
  $round= $roundt-$tottt;
}
$round=round($round,2);
$content = '<table  cellspacing="0" cellpadding="1" border="0">
<tr>
	<td>GSTIN: '.$gstin.'</td>
	<td align="center" colspan="2"><h2 padding="0">'.$firmn.'</h2></td>
	<td align="right"><a color="black">TAX INVOICE </a> <br> Original &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
	<td>STATE : '.strtoupper($stateb).' </td>
	<td align="center" colspan="2">'.strtoupper($addr).'</td>
	<td align="right">Contact : '.$conb.'</td>
</tr>
</table>


<br><br><br>

<table  cellspacing="0" cellpadding="3" style="font-size:9px;" border="0.5">
<tr>
	<td colspan="2">Retailer Name : '.strtoupper($customer_name).'<br>Address : '.strtoupper($customer_address).' <br>Mobile No : '.$customer_contact.' GST NO: '.$customer_gstin.'<br>State : '.strtoupper($state).'</td>

	<td>
	Invoice No: '.$invoice.' <br>
	Invoice Date: '.$invoice_date.'<br>
	Beat : '.$beat.'
	</td>
</tr>
</table>
<table border="0.5" cellpadding="1">
<tr style="background-color:#ccc">
	<td align="center">SNo</td>
	<td align="center" colspan="5">Description of Goods</td>
	<td align="center">HSN</td>
	<td align="center">Qty</td>
	<td align="center">MRP</td>
	<td align="center">Rate</td>
	<td align="center">Amount</td>
	<td align="center">Dis</td>
	<td align="center">Taxable</td>
	<td align="center">CGST%</td>
	<td align="center">CGST Amt</td>
	<td align="center">SGST%</td>
	<td align="center">SGST Amt</td>
	<td align="center">Total</td>
	
</tr>
'.$rows.'

<tr>
	<td style="background-color:#ccc" colspan="6" align="center">Total</td>
	<td align="center"></td>
	<td align="center"></td>
	<td align="center"></td>
	<td align="center"></td>
	<td align="center">'.$tota.'</td>
	<td align="center">'.$totd.'</td>
	<td align="center">'.$tott.'</td>
	<td align="center"></td>
	<td align="center">'.$totc.'</td>
	<td align="center"></td>
	<td align="center">'.$tots.'</td>
	<td align="center">'.$tottt.'</td>
	
</tr>

</table>

<table cellspacing="0" cellpadding="1" border="0.2">
<tr>
	<td  colspan="8" align="left">'.getIndianCurrency($roundt).'</td>
	<td colspan="4" align="left">Tax amount before tax :  '.$tott.'</td>
	
</tr>
<tr>
<td  style="border-color:white" rowspan="4" colspan="4" align="left"></td>
<td  style="border-color:white" rowspan="4" colspan="4" align="left"></td>
<td colspan="4" align="left">Add: CGST: '.$totc.' </td>
</tr>
<tr>
<td colspan="4" align="left">Add: SGST: '.$tots.' </td>
</tr>
<tr>
<td colspan="4" align="left">Roundoff: '.$round.' </td>
</tr>
<tr>
<td colspan="4" align="left">Tax amount after tax: '.$roundt.' </td>
</tr>

</table>
<table boder="0">
<tr><td colspan="5"></td><td  align="center" colspan="1"><strong>For '.$firmn.'</strong> </td></tr>
<tr><td colspan="5"></td><td align="center" colspan="1"><br><br><br><br>Authorized Signatory </td></tr>
</table>

'; 
$file= "Invoice.pdf";
$obj_pdf->writeHTML($content);
$obj_pdf->Output($file, 'I');
?>
