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
              		    	<div class="pull-right">
	              		    	<button type="button" class="btn btn-success btn-sm" id="add-btn" onclick="formReset()"><i class="fa fa-times-circle"></i> New</button>
								<button type="button" class="btn btn-danger btn-sm" id="del-btn" data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message="您確定刪除嘛 ?">
								<i class="fa fa-minus"></i> Delete
								</button>
              		    	</div>
              		    
	                		<div class="input-group input-group-sm pull-left" style="width: 150px;">
		                  		<input type="text" id="search" class="form-control pull-right" placeholder="Search">
		                  		<div class="input-group-btn">
		                    		<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
		                  		</div>
	                		</div>
              			</div>
            		</div>
					<div class="box-body">
						<table class="table table-hover" id="roleTable">
							<tr>
								<th> # </th>
								<th>Name</th>
							</tr>
							@foreach($roles as $key => $val)
							<tr id="{{ $val->id }}">
								<td>{{ $key + 1 }}</td>
								<td>{{ $val->name }}</td>
							</tr>
							@endforeach
						</table>
					</div>
					<div class="box-footer clearfix">
						<div class="col-sm-6">
							<div class="dataTables_info" id="user-role-list_info" role="status" aria-live="polite">
							@if($roles->currentPage() == 1)
							Showing 1 to {{ $roles->total() }} of {{ $roles->total() }} entries
							@endif
							
							@if($roles->currentPage() != 1)
							Showing {{ ($roles->currentPage() -1 + $roles->perPage()) }} to 
							
							@if($roles->currentPage() -1 + $roles->perPage() > $roles->total())
							{{ $roles->total() }} 
							@else
							{{ $roles->currentPage() - 1 + $roles->perPage() }} 
							@endif
							
							of {{ $roles->total() }} entries
							@endif
							</div>
						</div>
						
		            	<ul class="pagination pagination-sm no-margin pull-right">
			                <li><a href="{{ $roles->previousPageUrl() }}">&laquo;</a></li>
			                @for($i=1;$i<=ceil($roles->total() / $roles->perPage());$i++)
			                <li><a href="{{ $roles->url($i) }}">{{ $i }}</a></li>
			                @endfor
			                <li><a href="{{ $roles->nextPageUrl() }}">&raquo;</a></li>
		              	</ul>
	            	</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-warning" id="post-div">
					<form id="roleForm">
						<div class="box-header with-border">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" id="_method" name="_method">

							<h3 class="box-title" id="roleName">New Role</h3>
							
							<div class="box-tools pull-right" id="edit-div" style="display:none">
    							<button type="button" class="btn btn-primary btn-sm" id="edit-btn"><i class="fa fa-pencil-square"></i> Edit</button>
              		    	</div>
              		    	<div class="box-tools pull-right" id="save-div">
    							<button type="button" class="btn btn-primary btn-sm" id="save-btn"><i class="fa fa-floppy-o"></i> Save</button>
    							<button type="button" class="btn btn-default btn-sm" id="cancel-btn"><i class="fa fa-times-circle"></i> Cancel</button>
              		    	</div>
              		    	<div class="box-body">
              		    		<div class="row">
              		    			<div class="col-md-5">
	    	              				<div class="box-body">
	    	              					<div class="form-group">
    						                	<input type="hidden" class="form-control" id="role_id" name="role_id">
    						                	<input type="hidden" class="form-control" id="action">
    						                				
    						                	<label for="name">Name</label>
    	                  						<input type="text" class="form-control role-input" id="name" name="name" placeholder="Enter Name">
    						                </div>
    						                <div class="form-group">
    						                	<label for="email">Label</label>
    						                	<input type="text" class="form-control role-input" id="label" name="label" placeholder="Enter Label">  						                	
    						                </div>
	    	              				</div>
    	              				</div>
    	              				<div class="col-md-2">
    	              					<label for="modules">Modules</label>
    	              					<div>User</div>
    	              				</div>
    	              				<div class="col-md-4">
    	              					<label for="permissions">Permissions</label>
					                  	<div class="form-group">
					                  		<label>
						                  		<input type="checkbox" class="minimal" checked>
						                  		View
						                	</label>
						                	<label>
						                  		<input type="checkbox" class="minimal">
						                  		Create
						                	</label>
						                	<label>
						                  		<input type="checkbox" class="minimal">
						                  		Update
						                	</label>
						                	<label>
						                  		<input type="checkbox" class="minimal">
						                  		Delete
						                	</label>
					                  	</div>
    	              				</div>
              		    		</div>
              		    	</div>
						</div>
					</form>
				</div>
			</div>
		</section>
    </div>
</section>

@include('common.confirm')

<style>
td {
	cursor:pointer;
}
tr.highlighted td {
	background: #d0d0d0;
}	
</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function addDisabled(){
	$('.role-input').prop('disabled','disabled');
	//$('input[name="rolesRadios"]').prop('disabled','disabled');
}

function removeDisabled(){
	document.getElementById('user_pic').disabled = false;
	$('.role-input').removeAttr('disabled');
	//$('input[name="rolesRadios"]').removeAttr('disabled');
}

$(function() {
	$('#search').on('keyup', function() {
	    var value = $(this).val();

	    $('table tr').each(function(index) {
	        if (index !== 0) {
	            $row = $(this);
	            var id = $row.find('td:eq(1)').text();
	            if (id.indexOf(value) !== 0) {
	                $row.hide();
	            }
	            else {
	                $row.show();
	            }
	        }
	    });
	});

	$('#roleTable tr').click(function(e) {
		$('#roleTable tr').removeClass('highlighted');
	    $(this).addClass('highlighted');

	    <!-- 取得role資料 -->
	    var role_id = $(this).prop('id');
	    var _url = "/workbench/ajax/getRole?id=" + role_id;
	    $.getJSON(_url, function(data) {
	    	$('#roleName').text('View Role [ ' + data.role.name + ' ]');
	    	$('#role_id').val(data.role.id);
	    	$('#name').val(data.role.name);
	    	$('#label').val(data.role.label);
	    	$('#action').val('edit');

	    	addDisabled();
			$('#save-div').hide();
			$('#edit-div').show();
			$('#post-div').show();
	    	
	    	console.log(data);exit;
	    });	
	    e.preventDefault();
	});	
});	
</script>
@endsection
