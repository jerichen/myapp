@if (count($errors) > 0)
	<a id='linkButton'>ClickMe</a>
	
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

<script type="text/javascript">
$(document).ready(function() {
	toastr.options = {
		"closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
	}
	
// 	if(count($errors > 0)){
// 		$('#linkButton').trigger('click');
// 	} 

	$('#linkButton').trigger('click');
	$('#linkButton').click(function() {
       toastr.error('Click Button');
    });
});
</script>