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
console.log(document.getElementById('psku').value); //pass the value to the psku input on pageload
}, 500);


</script>
	<script src="./assets/js/custom-value.js"></script>
<div class="pull-right">
<button type="button" class="btn  btn-primary" id="command-add" data-row-id="0">Add New Product</button>
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
								<label for="pquantity" class="control-label">Quantity:</label>
								<input type="text" class="form-control" id="pquantity" name="pquantity"/>
							</div>

							<div class="form-group">
								<label for="pweight" class="control-label">Weight:</label>
								<input type="text" class="form-control" id="pweight" name="pweight"/>
							</div>

						<div class="form-group">
							<label for="ptaxapplicable" class="control-label">Tax Applicable?</label>
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
		<div class="box box-solid">
    <div class="box-body">
		<label for="cgstgroup" class="control-label">GST Group &nbsp </label><i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title=" Value is in %">
		</i><br />
		<label for="cgstgroup" class="control-label">Select CGST for this product:</label>
		<div id="divtaxtype">
	<select id="cgstgroup" class="form-control" name="cgstbrowser" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
			<option value="5"> 5 </option>
			<option value="10"> 10 </option>
			<option value="12"> 12 </option>
			<option value="18"> 18 </option>
			<option value="20"> 20 </option>
			<option value="28"> 28 </option>
			<option value="0"> 0 (None) </option>
			<option value="customOption"> [Enter a custom tax amount] </option></select><input class="form-control" name="cgstbrowser" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
</div>
<label for="sgstgroup" class="control-label">Select SGST for this product:</label>
<div id="divtaxtype">
<select id="sgstgroup" class="form-control" name="sgstbrowser" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
	<option value="5"> 5 </option>
	<option value="10"> 10 </option>
	<option value="12"> 12 </option>
	<option value="18"> 18 </option>
	<option value="20"> 20 </option>
	<option value="28"> 28 </option>
	<option value="0"> 0 (None) </option>
	<option value="customOption"> [Enter a custom tax amount] </option></select><input class="form-control" name="sgstbrowser" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
</div>
<label for="igstgroup" class="control-label">Select IGST for this product:</label>
<div id="divtaxtype">
<select id="igstgroup" class="form-control" name="igstbrowser" onchange="if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
	<option value="5"> 5 </option>
	<option value="10"> 10 </option>
	<option value="12"> 12 </option>
	<option value="18"> 18 </option>
	<option value="20"> 20 </option>
	<option value="28"> 28 </option>
	<option value="0"> 0 (None) </option>
	<option value="customOption"> [Enter a custom tax amount] </option></select><input class="form-control" name="igstbrowser" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
</div>
</div>
</div>
</div>
</div>
<!-- <div class="form-group">
	<label for="pmarginamount" class="control-label">Product Type:</label>
	<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Single product: Product with no variations.
    OR Variable product: Product with variations such as size, color etc.">
	</i>
	<input type="text" class="form-control" id="ptype" name="ptype"/>
</div> --> <?php // TODO: Have to add multiple variation of products with differential pricing for each variation ?>
<div class="form-group">
	<label for="pamountexcludingtax" class="control-label">Price Excluding Tax:</label>
	<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Price of the product excluding Tax">
	</i>
	<input type="text" class="form-control" id="pamountexcludingtax" name="pamountexcludingtax"/>
</div>
	<div class="form-group">
		<label for="pamountincludingtax" class="control-label">Price Including Tax:</label>
		<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Price of the product including Tax">
		</i>
		<input type="text" class="form-control" id="pamountincludingtax" name="pamountincludingtax"/>
	</div>
	<div class="form-group">
		<label for="pmarginamount" class="control-label">Profit Margin:</label>
		<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Profit Margin for your product in %">
		</i>
		<input type="text" class="form-control" id="pmarginamount" name="pmarginamount"/>
	</div>
	<div class="form-group">
		<label for="psellingprice" class="control-label">Final Selling Price:</label>
		<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="This should be the Total Price including cost and taxes and profit margin included.">
		</i>
		<input type="text" class="form-control" id="psellingprice" name="psellingprice"/>
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
<!-- Edit Product Form -->

<div id="edit_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Product</h4>
            </div>

						<div class="modal-body">
								<form method="post" id="frm_add">
					<input type="hidden" value="add" name="action" id="action">
					<div class="form-group">
						<label for="pid_edit" class="control-label">Product ID:</label>
						<input type="text" class="form-control" id="pid_edit" name="pid_edit" required/>
					</div>
						<div class="form-group">
							<label for="pname_edit" class="control-label">Product Name:</label>
							<input type="text" class="form-control" id="pname_edit" name="pname_edit" required/>
						</div>

						<div class="form-group">
							<label for="pbrand_edit" class="control-label">Product Brand:</label>
							<input type="text" class="form-control" id="pbrand_edit" name="pbrand_edit" required/>
						</div>

							<div class="form-group">
								<label for="punit_edit" class="control-label">Unit:</label>
								<input type="text" class="form-control" id="punit_edit" name="punit_edit" value="Pcs" required/>
							</div>

							<div class="form-group">
								<label for="pcategory_edit" class="control-label">Product Category:</label>
								<input type="text" class="form-control" id="pcategory_edit" name="pcategory_edit" required/>
							</div>

							<div class="form-group">
								<label for="psubcategory_edit" class="control-label">Product Sub-Category:</label>
								<input type="text" class="form-control" id="psubcategory_edit" name="psubcategory_edit" required/>
							</div>

							<div class="form-group">
								<label for="psku_edit" class="control-label">SKU:</label>
								<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Created a  Random ID for the product. Leave the field with generated ID or add your own">
								</i>
								<input type="text" class="form-control" id="psku_edit" name="psku_edit"/>
							</div>

							<div class="form-group">
								<label for="pquantity_edit" class="control-label">Quantity:</label>
								<input type="text" class="form-control" id="pquantity_edit" name="pquantity_edit"/>
							</div>

							<div class="form-group">
								<label for="pweight_edit" class="control-label">Weight:</label>
								<input type="text" class="form-control" id="pweight_edit" name="pweight_edit"/>
							</div>

						<div class="form-group">
							<label for="ptaxapplicable_edit" class="control-label">Tax Applicable?</label>
							<select class="form-control" name="ptaxapplicable_edit" id="ptaxapplicable_edit">
							<option value="1"> Yes </option>
							<option value="0"> No </option>
							</select>
						</div>
							<script>
							$("#ptaxapplicable_edit").change(function(){
					if($(this).val()=="1")
					{
					$("div#taxshower").show();
					exit();
					}

					else
					{
					$("div#taxshower_edit").hide();
					}
					});							</script>

					<div class="form-group">
					<div id="taxshower_edit">
					<div class="box box-solid">
					<div class="box-body">
					<label for="ptaxtype_edit" class="control-label">GST Group &nbsp </label><i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title=" Value is in %">
					</i><br />
					<label for="cgstgroup_edit" class="control-label">Select CGST for this product:</label>
					<div id="divtaxtype_edit">
					<select class="form-control" name="cgstbrowser1_edit" onchange="if(this.options[this.selectedIndex].value=='customOption1_edit'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
					<option value="5"> 5 </option>
					<option value="10"> 10 </option>
					<option value="12"> 12 </option>
					<option value="18"> 18 </option>
					<option value="20"> 20 </option>
					<option value="28"> 28 </option>
					<option value="0"> 0 (None) </option>
					<option value="customOption1_edit"> [Enter a custom tax amount] </option></select><input class="form-control" name="cgstbrowser1_edit" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
					</div>
					<label for="sgstgroup_edit" class="control-label">Select SGST for this product:</label>
					<div id="divtaxtype_edit">
					<select class="form-control" name="cgstbrowser2_edit" onchange="if(this.options[this.selectedIndex].value=='customOption2_edit'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
					<option value="5"> 5 </option>
					<option value="10"> 10 </option>
					<option value="12"> 12 </option>
					<option value="18"> 18 </option>
					<option value="20"> 20 </option>
					<option value="28"> 28 </option>
					<option value="0"> 0 (None) </option>
					<option value="customOption2_edit"> [Enter a custom tax amount] </option></select><input class="form-control" name="cgstbrowser2_edit" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
					</div>
					<label for="igstgroup_edit" class="control-label">Select IGST for this product:</label>
					<div id="divtaxtype_edit">
					<select class="form-control" name="cgstbrowser3_edit" onchange="if(this.options[this.selectedIndex].value=='customOption3_edit'){toggleField(this,this.nextSibling); this.selectedIndex='0';}">
					<option value="5"> 5 </option>
					<option value="10"> 10 </option>
					<option value="12"> 12 </option>
					<option value="18"> 18 </option>
					<option value="20"> 20 </option>
					<option value="28"> 28 </option>
					<option value="0"> 0 (None) </option>
					<option value="customOption3_edit"> [Enter a custom tax amount] </option></select><input class="form-control" name="cgstbrowser3_edit" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
					</div>
					</div>
					</div>
					</div>
					</div>
					<!-- <div class="form-group">
					<label for="pmarginamount" class="control-label">Product Type:</label>
					<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Single product: Product with no variations.
					OR Variable product: Product with variations such as size, color etc.">
					</i>
					<input type="text" class="form-control" id="ptype" name="ptype"/>
				</div> --> <?php // TODO: Have to add multiple variation of products with differential pricing for each variation ?>
					<div class="form-group">
					<label for="pamountexcludingtax_edit" class="control-label">Price Excluding Tax:</label>
					<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Price of the product excluding Tax">
					</i>
					<input type="text" class="form-control" id="pamountexcludingtax_edit" name="pamountexcludingtax_edit"/>
					</div>
					<div class="form-group">
					<label for="pamountincludingtax_edit" class="control-label">Price Including Tax:</label>
					<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Price of the product including Tax">
					</i>
					<input type="text" class="form-control" id="pamountincludingtax_edit" name="pamountincludingtax_edit"/>
					</div>
					<div class="form-group">
					<label for="pmarginamount_edit" class="control-label">Profit Margin:</label>
					<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="Profit Margin for your product in %">
					</i>
					<input type="text" class="form-control" id="pmarginamount_edit" name="pmarginamount_edit"/>
					</div>
					<div class="form-group">
					<label for="psellingprice_edit" class="control-label">Final Selling Price:</label>
					<i class="fa fa-info-circle text-info hover-q" data-toggle="tooltip" title="This should be the Total Price including cost and taxes and profit margin included.">
					</i>
					<input type="text" class="form-control" id="psellingprice_edit" name="psellingprice_edit"/>
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

		url: "<?php echo APP_ROOT ;?>inc/product-management-response.php",
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
																$('#pid_edit').val(ele.siblings(':first').html());
                                $('#pname_edit').val(ele.siblings(':nth-of-type(2)').html()); // in case we're changing the key
                                $('#pbrand_edit').val(ele.siblings(':nth-of-type(3)').html());
                                $('#punit_edit').val(ele.siblings(':nth-of-type(4)').html());
                                $('#pcategory_edit').val(ele.siblings(':nth-of-type(5)').html());
                                $('#psubcategory_edit').val(ele.siblings(':nth-of-type(6)').html());
                                $('#pquantity_edit').val(ele.siblings(':nth-of-type(7)').html());
                                $('#pweight_edit').val(ele.siblings(':nth-of-type(8)').html());
                                $('#ptaxapplicable_edit').val(ele.siblings(':nth-of-type(9)').html());
                                $('#cgstgroup_edit').val(ele.siblings(':nth-of-type(10)').html());
                                $('#sgstgroup_edit').val(ele.siblings(':nth-of-type(11)').html());
                                $('#igstgroup_edit').val(ele.siblings(':nth-of-type(12)').html());
                                $('#pamountexcludingtax_edit').val(ele.siblings(':nth-of-type(13)').html());
                                $('#pamountincludingtax_edit').val(ele.siblings(':nth-of-type(14)').html());
                                $('#pmarginamount_edit').val(ele.siblings(':nth-of-type(15)').html());
                                $('#psellingprice_edit').val(ele.siblings(':nth-of-type(16)').html());
					} else {
					 alert('Now row selected! First select row, then click edit button');
					}
    }).end().find(".command-delete").on("click", function(e)
    {

		var conf = confirm('Delete ' + $(this).data("row-id") + '?');
					alert(conf);
                    if(conf){
                                $.post('<?php echo APP_ROOT ;?>inc/product-management-response.php', { id: $(this).data("row-id"), action:'delete'}
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
				  url: "<?php echo APP_ROOT ;?>inc/product-management-response.php",
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
