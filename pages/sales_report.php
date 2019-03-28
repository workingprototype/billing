<?php
include('config/config.php');
 ?>
<link href="./assets/css/bootstrap.min.css" rel="stylesheet">

<link href="./assets/fonts/css/font-awesome.min.css" rel="stylesheet">
<link href="./assets/css/animate.min.css" rel="stylesheet">

<!-- Custom styling plus plugins -->
<link href="./assets/css/custom.css" rel="stylesheet">
<link href="./assets/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="./assets/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="./assets/js/jquery.min.js"></script>




<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Sales Report <small>Table</small></h2>
      <div class="clearfix"></div>
    </div>
    <div class="row">
     <div class="input-daterange">
      <div class="col-md-4">
       <input type="date" name="start_date" id="start_date" class="form-control" />
      </div>
      <div class="col-md-4">
       <input type="date" name="end_date" id="end_date" class="form-control" />
      </div>
     </div>
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
     </div>
    </div>
    <br />
    <div class="x_content">
      <table id="salesreport" class="table table-striped table-bordered">
        <thead>
      <tr>
        <th>#</th>
        <th>Business</th>
        <th>Customer</th>
        <th>Product</th>
        <th>HSN</th>
        <th>UTC</th>
        <th>Quantity</th>
        <th>MRP</th>
        <th>Base Rate</th>
        <th>Amount</th>
        <th>Discount</th>
        <th>GST %</th>
        <th>GST Amount</th>
        <th>Total</th>
        <th>Final Rate</th>
        <th>Invoice</th>
        <th>Batch</th>
      </tr>
  </thead>
<tbody>
    <?php $query=mysqli_query($con,"select business.account_name as businessname, users.name as customername
    ,products.productName as pname,hsn,utc,qty,mrp,baserate,amount,dis,gst,gstamount,total,finalrate,invoice
    ,batch from sales INNER JOIN business ON sales.business = business.id INNER JOIN users ON
    sales.customer = users.id INNER JOIN products ON sales.product = products.id ;");
    $cnt=1;
    while($row=mysqli_fetch_array($query))
    {
    ?>
                        <tr>
                          <td><?php echo htmlentities($cnt);?></td>
                          <td><?php echo htmlentities($row['businessname']);?></td>
                          <td><?php echo htmlentities($row['customername']);?></td>
                          <td><?php echo htmlentities($row['pname']);?></td>
                          <td><?php echo htmlentities($row['hsn']);?></td>
                          <td><?php echo htmlentities($row['utc']);?></td>
                          <td><?php echo htmlentities($row['qty']);?></td>
                          <td><?php echo htmlentities($row['mrp']);?></td>
                          <td><?php echo htmlentities($row['baserate']);?></td>
                          <td><?php echo htmlentities($row['amount']);?></td>
                          <td><?php echo htmlentities($row['dis']);?></td>
                          <td><?php echo htmlentities($row['gst']);?></td>
                          <td><?php echo htmlentities($row['gstamount']);?></td>
                          <td><?php echo htmlentities($row['total']);?></td>
                          <td><?php echo htmlentities($row['finalrate']);?></td>
                          <td><?php echo htmlentities($row['invoice']);?></td>
                          <td><?php echo htmlentities($row['batch']);?></td>
                          </tr>
                        <?php $cnt=$cnt+1; } ?>

  </tbody>
    <button onclick="location.href = './purchasereport';"> Return to Billing </button>
    </div>
  </div>
</div>
<script src="./assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="./assets/js/datatables/dataTables.bootstrap.js"></script>
<script src="./assets/js/datatables/dataTables.buttons.min.js"></script>
<script src="./assets/js/datatables/buttons.bootstrap.min.js"></script>
<script src="./assets/js/datatables/jszip.min.js"></script>
<script src="./assets/js/datatables/pdfmake.min.js"></script>
<script src="./assets/js/datatables/vfs_fonts.js"></script>
<script src="./assets/js/datatables/buttons.html5.min.js"></script>
<script src="./assets/js/datatables/buttons.print.min.js"></script>
<script src="./assets/js/datatables/dataTables.fixedHeader.min.js"></script>
<script src="./assets/js/datatables/dataTables.keyTable.min.js"></script>
<script src="./assets/js/datatables/dataTables.responsive.min.js"></script>
<script src="./assets/js/datatables/responsive.bootstrap.min.js"></script>
<script src="./assets/js/datatables/dataTables.scroller.min.js"></script>


<!-- pace -->
<script src="./assets/js/pace/pace.min.js"></script>
<script>
  var handleDataTableButtons = function() {
      "use strict";
      0 !== $("#salesreport").length && $("#salesreport").DataTable({
        dom: "Bfrtip",
        buttons: [{
          extend: "copy",
          className: "btn-sm"
        }, {
          extend: "csv",
          className: "btn-sm"
        }, {
          extend: "excel",
          className: "btn-sm"
        }, {
          extend: "print",
          className: "btn-sm"
        }],
        responsive: !0
      })
    },
    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons()
        }
      }
    }();
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
      keys: true
    });
    $('#datatable-responsive').DataTable();
    $('#datatable-scroller').DataTable({
      ajax: "./assets/js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });
    var table = $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });
  });
  TableManageButtons.init();
</script>
