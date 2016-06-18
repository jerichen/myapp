@if (count($errors) > 0)
	{!! Toastr::render() !!}
	
    <!-- 表單錯誤清單 -->
    <div class="alert alert-warning alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif