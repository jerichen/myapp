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
	                		<div class="input-group input-group-sm" style="width: 150px;">
		                  		<input type="text" id="search" class="form-control pull-right" placeholder="Search">
		                  		<div class="input-group-btn">
		                    		<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
		                  		</div>
	                		</div>
              			</div>
            		</div>
					<div class="box-body">
						<table class="table table-striped">
							<tr>
								<th> # </th>
								<th>Name</th>
								<th>E-mail Address</th>
								<th>Designation</th>
							</tr>
							@foreach($usersData as $key => $val)
							<tr>
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
							Showing 1 to {{ $usersData->perPage() }} of {{ $usersData->total() }} entries
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
		</section>
    </div>
</section>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
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
});	
</script>
@endsection