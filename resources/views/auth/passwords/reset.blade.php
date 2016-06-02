@extends('layouts.app')

@section('content')
<div class="login-box">

    <!-- 顯示驗證錯誤 -->
    @include('common.errors')
    
    <!-- 顯示狀態message -->
    @include('common.status')

    <!-- /.login-logo -->
  	<div class="login-box-body">
    	<p class="login-box-msg">Reset Password</p>
    	
    	<form action="{{ url('/password/reset') }}" class="login-form" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		
    		<input type="hidden" name="token" value="{{ $token }}">
    		
    		<div class="form-group has-feedback">
				<input type="email" class="form-control" name="email" placeholder="Email" value="{{ $email }}"/>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
		    	<input type="password" class="form-control" placeholder="Password" name="password">
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		    </div>
		    <div class="form-group has-feedback">
		    	<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		    </div>              
			<button name="submit" type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
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

