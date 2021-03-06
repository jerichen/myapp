@extends('layouts.app')

@section('content')
<!-- Main Header -->
<header class="main-header">
	<!-- Logo -->
    <a href="{{ url('/workbench') }}" class="logo">
	    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
	    <span class="logo-lg"><b>Workbench</b>MyAPP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    		<!-- Sidebar toggle button-->
    	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    		<span class="sr-only">Toggle navigation</span>
    	</a>
	    <div class="navbar-custom-menu">
	    	<ul class="nav navbar-nav">
	    		<!-- User Account: style can be found in dropdown.less -->
	          	<li class="dropdown user user-menu">
	          		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	            		<img src="{{ URL::asset($user->user_pic) }}" class="user-image" alt="User Image">
				        <span class="hidden-xs">{{ $user->name }}</span>
	            	</a>
	            	<ul class="dropdown-menu">
	            		<!-- User image -->
	              		<li class="user-header">
	                		<img src="{{ URL::asset($user->user_pic) }}" class="img-circle" alt="User Image">
	                		<p>
		                  		{{ $user->name }} - Web Developer
		                  		<small>Member since Nov. 2012</small>
	                		</p>
	              		</li>
	              		<!-- Menu Body -->
	              		<li class="user-body">
			            </li>
			            <!-- Menu Footer-->
					    <li class="user-footer">
					    	<div class="pull-right">
					        	<a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
			                </div>
			           	</li>
	            	</ul>
	          	</li>
		  	</ul>
		</div>
   	</nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    	<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
          		<img src="{{ URL::asset($user->user_pic) }}" class="img-circle" alt="User Image">
        	</div>
        	<div class="pull-left info">
	          	<p>{{ $user->name }}</p>
        	</div>
		</div>
		
		<ul class="sidebar-menu">
		
			<li class="header">MAIN NAVIGATION</li>
			@if(count($menus))
				@foreach($menus as $menu)
				<li class="treeview">
					<a href="{{ $menu->url }}">
    	        		<i class="{{ $menu->icon }}"></i> 
    	        		<span>{{ $menu->name }}</span>
    	        		@if($menu->has_sub == 1)
    		        	<i class="fa fa-angle-left pull-right"></i>
    		        	@endif
            		</a>
            			
            		@if(count($menu->sub))
            		<ul class="treeview-menu">
            			@foreach($menu->sub as $sub)
            			<li>
            				<a href="{{ $sub->url }}">
    			        		<i class="{{ $sub->icon }}"></i> 
    			        		<span>{{ $sub->name }}</span>
    		        		</a>
            			</li>
            			@endforeach
            		</ul>
            		@endif
				</li>
				@endforeach
			@endif

			<li class="header">MAIN NAVIGATION</li>
			<li class="treeview">
				<a href="/workbench/user">
            		<i class="fa fa-dashboard"></i> <span>Dashboard</span> 
            		<i class="fa fa-angle-left pull-right"></i>
          		</a>
          		<ul class="treeview-menu">
            		<li><a href="/workbench/user/user"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            		<li><a href="/workbench/user/role"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          		</ul>
			</li>
			<li class="treeview">
				<a href="#">
		            <i class="fa fa-table"></i> <span>Tables</span>
		            <i class="fa fa-angle-left pull-right"></i>
          		</a>
          		<ul class="treeview-menu">
		            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
		            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          		</ul>
			</li>
			<li class="treeview">
	          	<a href="pages/calendar.html">
	            	<i class="fa fa-calendar"></i> <span>Calendar</span>
	            	<small class="label pull-right bg-red">3</small>
	          	</a>
        	</li>
        	<li class="treeview">
	          	<a href="pages/mailbox/mailbox.html">
	            <i class="fa fa-envelope"></i> <span>Mailbox</span>
	            <small class="label pull-right bg-yellow">12</small>
	          	</a>
        	</li>
        	<li class="treeview">
        		<a href="/workbench/dashboard">
        		<i class="fa fa-book"></i> 
        		<span>Documentation</span></a>
        	</li>
        	
		</ul>
    </section>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	@yield('sub_content')
</div>
@endsection


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">  
$(document).ready(function() {	
    var url = window.location.href; 
    var activePage = url.substring(url.lastIndexOf('/')+1); // role
    var activeLi = url.substring(0,url.lastIndexOf('/')); // /workbench/user


    $('li.treeview a').each(function() {
    	var li_href = this.href;
    	if ((li_href == url) || (li_href == activeLi)) {
    		$(this).parent().addClass('active'); 
    	} 
    });
    
    $('.treeview-menu li a').each(function() {
    	var currentPage = this.href.substring(this.href.lastIndexOf('/')+1); // user 	
    	if (activePage == currentPage) {
    		$(this).parent().addClass('active'); 
    	} 
    });
});
</script>

