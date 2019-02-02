<script>
function RandomNumberForGeneratingSku() {
var min = 1;
var max = 9999999999;
var num = Math.floor(Math.random() * (max - min + 1)) + min;
var timeNow = new Date().getTime();
document.getElementById('psku').value = num + '' + timeNow; //our salt to prevent collison is to use time
}
window.onload = RandomNumberForGeneratingSku; //A generated value will be added to the form on form load
setTimeout(function () {
console.log(document.getElementById('pksu').value); //pass the value to the pksu input on pageload
}, 500);


</script>
	<script src="./assets/js/custom-value.js"></script>
<div class="pull-right">
<button type="button" class="btn  btn-primary" id="command-add" data-row-id="0">Add New User</button>
</div>
<br>
<table id="users_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
<thead>
				<tr>
					<th data-column-id="pid" data-type="numeric" data-identifier="true">Product ID</th>
					<th data-column-id="pname">Product Name</th>
					<th data-column-id="pbrand">Brand</th>
					<th data-column-id="punit">Unit</th>
					<th data-column-id="pcategory">Category</th>
					<th data-column-id="psubcategory">Sub-category</th>
					<th data-column-id="psku">SKU</th>
					<th data-column-id="pquantity">Quantity</th>
					<th data-column-id="pweight">Weight</th>
					<th data-column-id="ptaxapplicable">Tax Applicable?</th>
					<th data-column-id="ptaxtype">Tax Type</th>
					<th data-column-id="ptype">Product Type</th>
					<th data-column-id="pmarginamount">Profit Margin</th>
					<th data-column-id="psellingprice">Selling Price</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Manage Products</th>
				</tr>
</thead>
</table>

<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Product</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">
		        <div class="form-group">
		          <label for="pname" class="control-label">Product Name:</label>
		          <input type="text" class="form-control" id="pname" name="pname" required/>
		        </div>

						<div class="form-group">
							<label for="pbrand" class="control-label">Product Brand:</label>
							<input type="text" class="form-control" id="pbrand" name="pbrand" required/>
						</div>

							<div class="form-group">
								<label for="punit" class="control-label">Unit:</label>
								<input type="text" class="form-control" id="punit" name="punit" value="Pcs" required/>
							</div>

							<div class="form-group">
								<label for="pcategory" class="control-label">Product Category:</label>
								<input type="text" class="form-control" id="pcategory" name="pcategory" required/>
							</div>

							<div class="form-group">
								<label for="psubcategory" class="control-label">Product Sub-Category:</label>
								<input type="text" class="form-control" id="psubcategory" name="psubcategory" required/>
							</div>

							<div class="form-group">
								<label for="psku" class="control-label">SKU:</label>
								<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Created a  Random ID for the product. Leave the field with generated ID or add your own">
								</i>
								<input type="text" class="form-control" id="psku" name="psku"/>
							</div>

							<div class="form-group">
								<label for="psku" class="control-label">Quantity:</label>
								<input type="text" class="form-control" id="psku" name="psku"/>
							</div>

							<div class="form-group">
								<label for="psku" class="control-label">Weight:</label>
								<input type="text" class="form-control" id="psku" name="psku"/>
							</div>

						<div class="form-group">
							<label for="psku" class="control-label">Tax Applicable?</label>
							<select class="form-control" name="ptaxapplicable" id="ptaxapplicable">
							<option value="1"> Yes </option>
							<option value="0"> No </option>
							</select>
						</div>
							<script>
							$("#ptaxapplicable").change(function(){
   if($(this).val()=="1")
   {
       $("div#taxshower").show();
			 exit();
   }

    else
    {
        $("div#taxshower").hide();
    }
});							</script>
							<div class="form-group">
								<div id="taxshower">
									<label for="ptaxtype" class="control-label">Tax Type:</label>
									<div id="divtaxtype">
										<select class="form-control" name="cgstbrowser" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
			<option value="5"> 5 </option>
			<option value="5"> 10 </option>
			<option value="5"> 12 </option>
			<option value="5"> 18 </option>
			<option value="5"> 20 </option>
			<option value="5"> 28 </option>
			<option value="customOption"> [Enter a custom tax amount] </option></select><input class="form-control" name="cgstbrowser" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
			</div>

								</div>

						</div>

						<div class="form-group">
							<label for="psku" class="control-label">Profit Margin:</label>
							<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Profit Margin for your product in %">
							</i>
							<input type="text" class="form-control" id="psku" name="psku"/>
						</div>
						<div class="form-group">
							<label for="psku" class="control-label">Final Selling Price:</label>
							<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="This should be the Total Price including cost and taxes and profit margin included.">
							</i>
							<input type="text" class="form-control" id="psku" name="psku"/>
						</div>
      <?php // TODO: Fetch value from user roles ?>
			<!--   <select class="form-control select2" id="role" name="role">
							<option value="supplier">Supplier</option>
							<option value="supplier">General User</option>
						</select> -->
        </div>
				<div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="btn_add" class="btn btn-primary">Save</button>
            </div>
					</div>
			</form>
        </div>
    </div>
<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_edit">
				<input type="hidden" value="edit" name="action" id="action">
				<input type="hidden" value="0" name="edit_id" id="edit_id">
                  <div class="form-group">
                    <label for="fullname" class="control-label">Full Name:</label>
                    <input type="text" class="form-control" id="edit_fullname" name="edit_fullname"/>
                  </div>
                  <div class="form-group">
                    <label for="username" class="control-label">Username:</label>
                    <input type="text" class="form-control" id="edit_username" name="edit_username"/>
                  </div>
				  <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="email" class="form-control" id="edit_email" name="edit_email"/>
                  </div>
				  <div class="form-group">
                    <label for="password" class="control-label">Password:</label>
                    <input type="password" class="form-control" id="edit_password" name="edit_password"/>
                  </div>
									<div class="form-group">
								 					 <label for="role" class="control-label">Role:</label>
								 					 <input type="text" class="form-control" id="edit_role" name="edit_role"/>
								 				 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_edit" class="btn btn-primary">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
	var grid = $("#users_grid").bootgrid({
		ajax: true,
		rowSelect: true,
		post: function ()
		{
			/* To accumulate custom parameter with the request object */
			return {
				id: ""
			};
		},

		url: "<?php echo APP_ROOT ;?>inc/user-management-response.php",
		formatters: {
		        "commands": function(column, row)
		        {
		            return "<button type=\"button\" class=\"btn btn-xs btn-default command-edit\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-edit\"></span></button> " +
		                "<button type=\"button\" class=\"btn btn-xs btn-default command-delete\" data-row-id=\"" + row.id + "\"><span class=\"glyphicon glyphicon-trash\"></span></button>";
		        }
		    }
   }).on("loaded.rs.jquery.bootgrid", function()
{
    /* Executes after data is loaded and rendered */
    grid.find(".command-edit").on("click", function(e)
    {
        //alert("You pressed edit on row: " + $(this).data("row-id"));
			var ele =$(this).parent();
			var g_id = $(this).parent().siblings(':first').html();
            var g_name = $(this).parent().siblings(':nth-of-type(2)').html();
console.log(g_id);
                    console.log(g_name);

		//console.log(grid.data());//
		$('#edit_model').modal('show');
					if($(this).data("row-id") >0) {

                                // collect the data
                                $('#edit_id').val(ele.siblings(':first').html()); // in case we're changing the key
                                $('#edit_fullname').val(ele.siblings(':nth-of-type(2)').html());
                                $('#edit_username').val(ele.siblings(':nth-of-type(3)').html());
                                $('#edit_email').val(ele.siblings(':nth-of-type(4)').html());
                                $('#edit_password').val(ele.siblings(':nth-of-type(5)').html());
                                $('#edit_role').val(ele.siblings(':nth-of-type(6)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {

		var conf = confirm('Delete ' + $(this).data("row-id") + '?');
					alert(conf);
                    if(conf){
                                $.post('<?php echo APP_ROOT ;?>inc/user-management-response.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback),
										$("#users_grid").bootgrid('reload');
                                });
								//$(this).parent('tr').remove();
                    }
    });
});

function ajaxAction(action) {
				data = $("#frm_"+action).serializeArray();
				$.ajax({
				  type: "POST",
				  url: "<?php echo APP_ROOT ;?>inc/user-management-response.php",
				  data: data,
				  dataType: "json",
				  success: function(response)
				  {
					$('#'+action+'_model').modal('hide');
					$("#users_grid").bootgrid('reload');
				  }
				});
			}

			$( "#command-add" ).click(function() {
			  $('#add_model').modal('show');
			});
			$( "#btn_add" ).click(function() {
			  ajaxAction('add');
			});
			$( "#btn_edit" ).click(function() {
			  ajaxAction('edit');
			});
});
</script>
