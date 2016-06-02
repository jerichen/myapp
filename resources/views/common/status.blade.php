@if (session('status'))
    <!-- 狀態messgae -->
    <div class="alert alert-success alert-dismissible">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <h4><i class="icon fa fa-check"></i> Alert!</h4>
	    {{ session('status') }}
    </div>
@endif
