<?php

if(isset($_POST["From"], $_POST["to"]))
{
  include('./config/config.php');
	$result = '';
	$query = "SELECT * FROM purchase WHERE invoicedate BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($con, $query);
	$result .='
	<table class="table table-bordered">
	<tr>
	<th width="10%">Invoice Date</th>
	<th width="35%">Invoice Number</th>
	<th width="40%">Batch</th>
	<th width="10%">MRP</th>
	<th width="5%">Discount</th>
	</tr>';
	if(mysqli_num_rows($sql) > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
			<tr>
			<td>'.$row["invoicedate"].'</td>
			<td>'.$row["invoicenumber"].'</td>
			<td>'.$row["batch"].'</td>
			<td>'.$row["mrp"].'</td>
			<td>'.$row["disc"].'</td>
			</tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No Purchased Item Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}
?>
