@extends('layouts.app')

@section('content')
	<!-- Main Header -->
  	<header class="main-header">
	  	<!-- Logo -->
	    <a href="index2.html" class="logo">
	    <!-- mini logo for sidebar mini 50x50 pixels -->
	    <span class="logo-mini"><b>A</b>LT</span>
	    <!-- logo for regular state and mobile devices -->
	    <span class="logo-lg"><b>Admin</b>LTE</span>
	    </a>
  	</header>
  

	<h1>Hello , {{ $user->name }}</h1>
	<form action="{{ url('/auth/logout') }}" class="form-horizontal" method="get">
		<div class="form-group">
			<button type="submit" class="btn btn-primary">LogOut</button>
		</div>
	</form>
@endsection
