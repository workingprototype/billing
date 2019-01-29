<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FMCG User Management</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css" type="text/css" media="all">
<link href="bootstrap/jquery.bootgrid.css" rel="stylesheet" />
<script src="bootstrap/jquery-1.11.1.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
<script src="bootstrap/jquery.bootgrid.min.js"></script>
</head>
<body>
	<div class="container">
      <div class="">
        <h1>FMCG User Management</h1>
        <div class="col-sm-8">

			<div class="pull-right"><button type="button" class="btn btn-xs btn-primary" id="command-add" data-row-id="0">
			<span class="glyphicon glyphicon-plus"></span> Add New User</button></div>
			<br>		<br>
		<table id="users_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<th data-column-id="id" data-type="numeric" data-identifier="true">ID</th>
					<th data-column-id="fullname">Full Name</th>
					<th data-column-id="username">Username</th>
					<th data-column-id="email">Email</th>
					<th data-column-id="role">Role</th>
					<th data-column-id="commands" data-formatter="commands" data-sortable="false">Manage Data</th>
				</tr>
			</thead>
		</table>
    </div>
      </div>
    </div>

<div id="add_model" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New User</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="frm_add">
				<input type="hidden" value="add" name="action" id="action">
                  <div class="form-group">
                    <label for="fullname" class="control-label">Full Name:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required/>
                  </div>
                  <div class="form-group">
                    <label for="username" class="control-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required/>
                  </div>
									<div class="form-group">
										<label for="email" class="control-label">Email: </label>
										<input type="email" class="form-control" id="email" name="email" required/>
									</div>
									<div class="form-group">
										<label for="password" class="control-label">Password: </label>
										<input type="password" class="form-control" id="password" name="password" required/>
									</div>
				  			<div class="form-group">
                    <label for="role" class="control-label">Role</label>
										<input type="text" class="form-control" id="role" name="role" required/>
                  </div>
      <?php // TODO: Fetch value from user roles ?>
			<!--   <select class="form-control select2" id="role" name="role">
							<option value="supplier">Supplier</option>
							<option value="supplier">General User</option>
						</select> -->
        </div>
				<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn_add" class="btn btn-primary">Save</button>
            </div>
					</div>
			</form>
        </div>
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
</body>
</html>
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

		url: "response.php",
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
                                $.post('response.php', { id: $(this).data("row-id"), action:'delete'}
                                    , function(){
                                        // when ajax returns (callback),
										$("#users_grid").bootgrid('reload');
                                });
								//$(this).parent('tr').remove();
								//$("#employee_grid").bootgrid('remove', $(this).data("row-id"))
                    }
    });
});

function ajaxAction(action) {
				data = $("#frm_"+action).serializeArray();
				$.ajax({
				  type: "POST",
				  url: "response.php",
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
