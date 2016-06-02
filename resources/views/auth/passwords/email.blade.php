@extends('layouts.app')

@section('content')
<div class="login-box">

    <!-- 顯示驗證錯誤 -->
    @include('common.errors')
    
    <!-- 顯示狀態message -->
    @include('common.status')

    <!-- /.login-logo -->
  	<div class="login-box-body">
    	<p class="login-box-msg">Forget Password</p>
    	
    	<form action="{{ url('/password/email') }}" class="login-form" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		
    		<div class="form-group has-feedback">
				<input type="email" class="form-control" name="email" placeholder="Email"/>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
			<a href="{{ url('/login') }}" class="btn btn-primary btn-block btn-flat">Back to Login</a>
		</form>   
    </div>
</div>
@endsection
  
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(function() {
	$('input').iCheck({
    	checkboxClass: 'icheckbox_square-blue',
      	radioClass: 'iradio_square-blue',
      	increaseArea: '20%'
    });
});	

$(document).ready(function() {
	$('body').removeAttr('class');
    $('body').addClass('hold-transition login-page');
});	
</script>