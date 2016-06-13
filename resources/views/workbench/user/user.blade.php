@extends('workbench.index')

@section('sub_content')
<section class="content-header">
	<h1>
		<i class="fa fa-file-text-o"></i>
		{{ $menuData->name }}
		<small>Manage {{ $menuData->name }}</small>
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">{{ $menuData->name }}</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Main row -->
    <div class="row">
    	<!-- Left col -->
		<section class="col-lg-12 connectedSortable">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
              		    <h3 class="box-title">{{ $menuData->name }} Table</h3>
              		    
              		    <div class="box-tools">
              		    	<div class="box-tools pull-right">
	              		    	<button type="button" class="btn btn-success btn-sm" id="add-btn"><i class="fa fa-times-circle"></i> New</button>
								<button type="button" class="btn btn-danger btn-sm" id="delete-btn"><i class="fa fa-minus"></i> Delete</button>
              		    	</div>
              		    
	                		<div class="input-group input-group-sm" style="width: 150px;">
		                  		<input type="text" id="search" class="form-control pull-right" placeholder="Search">
		                  		<div class="input-group-btn">
		                    		<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
		                  		</div>
	                		</div>
              			</div>
            		</div>
					<div class="box-body">
						<table class="table table-hover" id="userTable">
							<tr>
								<th> # </th>
								<th>Name</th>
								<th>E-mail Address</th>
								<th>Designation</th>
							</tr>
							@foreach($usersData as $key => $val)
							<tr id="{{ $val->id }}">
								<td>{{ $key + 1 }}</td>
								<td>{{ $val->name }}</td>
								<td>{{ $val->email }}</td>
								<td>{{ $val->role_name }}</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="box-footer clearfix">
						<div class="col-sm-6">
							<div class="dataTables_info" id="user-role-list_info" role="status" aria-live="polite">
							@if($usersData->currentPage() == 1)
							Showing 1 to {{ $usersData->total() }} of {{ $usersData->total() }} entries
							@endif
							
							@if($usersData->currentPage() != 1)
							Showing {{ ($usersData->currentPage() -1 + $usersData->perPage()) }} to 
							
							@if($usersData->currentPage() -1 + $usersData->perPage() > $usersData->total())
							{{ $usersData->total() }} 
							@else
							{{ $usersData->currentPage() - 1 + $usersData->perPage() }} 
							@endif
							
							of {{ $usersData->total() }} entries
							@endif
							</div>
						</div>
						
		            	<ul class="pagination pagination-sm no-margin pull-right">
			                <li><a href="{{ $usersData->previousPageUrl() }}">&laquo;</a></li>
			                @for($i=1;$i<=ceil($usersData->total() / $usersData->perPage());$i++)
			                <li><a href="{{ $usersData->url($i) }}">{{ $i }}</a></li>
			                @endfor
			                <li><a href="{{ $usersData->nextPageUrl() }}">&raquo;</a></li>
		              	</ul>
	            	</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title" id="userName"></h3>
						
						<div class="box-tools pull-right" id="edit-div" style="display:none">
							<button type="button" class="btn btn-primary btn-sm" id="edit-btn"><i class="fa fa-pencil-square"></i> Edit</button>
          		    	</div>
          		    	<div class="box-tools pull-right" id="save-div">
							<button type="button" class="btn btn-primary btn-sm" id="save-btn"><i class="fa fa-floppy-o"></i> Save</button>
							<button type="button" class="btn btn-default btn-sm" id="cancel-btn"><i class="fa fa-times-circle"></i> Cancel</button>
          		    	</div>
						<div class="box-body">
							<div class="nav-tabs-custom">
					            <ul class="nav nav-tabs">
					            	<li class="active"><a href="#tab_1" data-toggle="tab">Profile</a></li>
              						<li><a href="#tab_2" data-toggle="tab">Details</a></li>
					            </ul>
					            <div class="tab-content">
					            	<!-- tabl -->
	              					<div class="tab-pane active" id="tab_1">	              					
	              						<div class="row">
		              						<div class="col-md-6">
						                		<div class="box-body">
						                			<div class="form-group">
						                				<input type="text" class="form-control" id="user_id" disabled>
						                				<label for="name">Name</label>
	                  									<input type="text" class="form-control user-input" id="name" placeholder="Enter Name">
						                			</div>
						                			<div class="form-group">
						                				<label for="email">E-mail Address</label>
	                  									<input type="text" class="form-control user-input" id="email" placeholder="Enter Email">
						                			</div>
						                			<div class="form-group">
									                	<label for="password">Password</label>
									                  	<input type="password" class="form-control user-input" id="password" placeholder="Password">
									                </div>
						                		</div>
						                	</div>
						                	<div class="col-md-6">
						                		<div class="box-body">
						                			<div class="form-group">
						                				<label for="status">Status / Role</label>
						                				<div id="roles">
						                					@foreach($roles as $role)
						                					<div class="radio">
							                					<label>
							                						<input class="user-input" type="radio" name="roleRadios" id="roleRadios" value="{{ $role->id }}">
							                						{{ $role->name }}
							                					</label>
						                					</div>
						                					@endforeach
						                				</div>
						                			</div>
						                		</div>
						                	</div>
					                	</div>
					                </div>
					                
					                <!-- tab2 -->
					                <div class="tab-pane" id="tab_2">					                	
					                	<div class="row">
					                		<div class="col-md-6">
							                	<div class="form-group">
								                	<label for="images">File input</label>
								                  	<input type="file" id="user-image">
								                  	<p class="help-block">Example block-level help text here.</p>
								                </div>
						                	</div>
					                	</div>					                	
					                </div>
				                </div>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
</section>

<style>
    td {
    	cursor:pointer;
    }
    tr.highlighted td {
    	background: #d0d0d0;
    	font-weight: bold;
	}	
</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
// 	$("input[type=radio][value=1]").prop("checked",true);
});	

function addDisabled(){
	document.getElementById("user-image").disabled = true;
	$('.user-input').prop("disabled","disabled");
	$('#save-div').hide();
	$('#edit-div').show();
// 	$("input[type=radio]").prop("checked",false);
}

// TODO add
function userData(user_id){
    var _url = "/workbench/ajax/getUser?id=" + user_id;
    $.getJSON(_url, function(data) {
    	$("#userName").text("View User [ " + data.user.name + " ]");
    	$("#user_id").val(data.user.id);
    	$("#name").val(data.user.name);
    	$("#email").val(data.user.email);

    	$("input[type=radio][value=" + data.role.id + "]").prop("checked",true);
    });
}

$(function() {
	$("#search").on("keyup", function() {
	    var value = $(this).val();

	    $("table tr").each(function(index) {
	        if (index !== 0) {
	            $row = $(this);
	            var id = $row.find("td:eq(1)").text();
	            if (id.indexOf(value) !== 0) {
	                $row.hide();
	            }
	            else {
	                $row.show();
	            }
	        }
	    });
	});

	$("#userTable tr").click(function(e) {
		addDisabled();
	    $("#userTable tr").removeClass("highlighted");
	    $(this).addClass("highlighted");

	    <!-- 取得user資料 -->
	    var user_id = $(this).prop("id");
	    var _url = "/workbench/ajax/getUser?id=" + user_id;
	    $.getJSON(_url, function(data) {
	    	console.log(data);
	    	$("#userName").text("View User [ " + data.user.name + " ]");
	    	$("#user_id").val(data.user.id);
	    	$("#name").val(data.user.name);
	    	$("#email").val(data.user.email);

	    	$("input[type=radio][value=" + data.role.id + "]").prop("checked",true);
	    });
	});

	$("#edit-btn").click(function(e) {
		e.preventDefault();
		document.getElementById("user-image").disabled = false;
		$('.user-input').removeAttr("disabled");
		$('#edit-div').hide();
		$('#save-div').show();
	});

	$("#cancel-btn").click(function(e) {
		e.preventDefault();
		addDisabled();
	});

	// TODO
	$("#add-btn").click(function(e) {
		e.preventDefault();
		$("#user_id").val('');
    	$("#name").val('');
    	$("#email").val('');

    	document.getElementById("user-image").disabled = false;
		$('.user-input').removeAttr("disabled");
    	$('#edit-div').hide();
		$('#save-div').show();
	});
});	
</script>
@endsection
