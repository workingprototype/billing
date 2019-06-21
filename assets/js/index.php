<?php
$data = array(
			 '0' => array('Name'=> 'Parvez', 'Status' =>'complete', 'Priority'=>'Low', 'Salary'=>'001'),
			 '1' => array('Name'=> 'Alam', 'Status' =>'inprogress', 'Priority'=>'Low', 'Salary'=>'111'),
			 '2' => array('Name'=> 'Sunnay', 'Status' =>'hold', 'Priority'=>'Low', 'Salary'=>'333'),
			 '3' => array('Name'=> 'Amir', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'444'),
			 '4' => array('Name'=> 'Amir1', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'777'),
			 '5' => array('Name'=> 'Amir2', 'Status' =>'pending', 'Priority'=>'Low', 'Salary'=>'777')
			);
	if(isset($_POST["ExportType"]))
{
	 
    switch($_POST["ExportType"])
    {
        case "export-to-excel" :
            // Submission from
			$filename = $_POST["ExportType"] . ".xls";		 
            header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			ExportFile($data);
			//$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : ".$_POST["action"]);
            break;
    }
}
function ExportFile($records) {
	$heading = false;
		if(!empty($records))
		  foreach($records as $row) {
			if(!$heading) {
			  // display field/column names as a first row
			  echo implode("\t", array_keys($row)) . "\n";
			  $heading = true;
			}
			echo implode("\t", array_values($row)) . "\n";
		  }
		exit;
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<title>phpflow.com : Download code of export to excel file</title>

<div><h3>Source code : PHP export to excel file</h1></div>
<div> 
<div id="container" >
<div class="col-sm-6 pull-left">
                  <div class="well well-sm col-sm-12">
                      <b id='project-capacity-count-lable'><?php echo count($data);?></b> records found.
                   <div class="btn-group pull-right">
  <button type="button" class="btn btn-info">Action</button>
  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu" id="export-menu">
    <li id="export-to-excel"><a href="#">Export to excel</a></li>
    <li class="divider"></li>
    <li><a href="#">Other</a></li>
  </ul>
</div>
				
                      </div>
					  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="export-form">
						<input type="hidden" value='' id='hidden-type' name='ExportType'/>
					  </form>
                  <table id="" class="table table-striped table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Salary</th>
                  </tr>
                <tbody>
                  <?php foreach($data as $row):?>
				  <tr>
				  <td><?php echo $row ['Name']?></td>
				  <td><?php echo $row ['Status']?></td>
				  <td><?php echo $row ['Priority']?></td>
				  <td><?php echo $row ['Salary']?></td>
				  </tr>
				  <?php endforeach; ?>
                </tbody>
              </table>
              </div></div>  

</div>
</body>   
<script  type="text/javascript">
$(document).ready(function() {
jQuery('#export-menu li').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
	case 'export-to-excel' :
	$('#hidden-type').val(target);
	//alert($('#hidden-type').val());
	$('#export-form').submit();
	$('#hidden-type').val('');
	break
}
});
    });
</script>
