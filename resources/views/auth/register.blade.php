@extends('layouts.app')

@section('content')
<div class="login-box">
	<div class="login-logo">
    	<a href="{{ url('/login') }}"><b>MyAPP</b>LTE</a>
    </div>
    
    <!-- 顯示驗證錯誤 -->
    @include('common.errors')
    
    <!-- /.login-logo -->
  	<div class="login-box-body">
    	<p class="login-box-msg">Register a new membership</p>
    	
    	<form action="{{ url('/register') }}" class="login-form" method="post">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		
    		<div class="form-group has-feedback">
        		<input type="text" class="form-control" placeholder="Full name" name="name">
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
    		<div class="form-group has-feedback">
		    	<input type="email" class="form-control" placeholder="Email" id="email" name="email">
		        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
		    	<input type="password" class="form-control" placeholder="Password" id="password" name="password">
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		    </div>
		    <div class="form-group has-feedback">
		    	<input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
		        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		    </div>   
		    <div class="row">
		    	<div class="col-xs-8">
		    	</div>
		    	<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        		</div>
		    </div>
		</form>   
		
		<a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
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