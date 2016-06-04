@extends('layouts.app')

@section('content')
<!-- Main Header -->
<header class="main-header">
	<!-- Logo -->
    <a href="index2.html" class="logo">
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
	            		<img src="{{ URL::asset('bower_components/AdminLTE/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
				        <span class="hidden-xs">{{ $user->name }}</span>
	            	</a>
	            	<ul class="dropdown-menu">
	            		<!-- User image -->
	              		<li class="user-header">
	                		<img src="{{ URL::asset('bower_components/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
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
          		<img src="{{ URL::asset('bower_components/AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        	</div>
        	<div class="pull-left info">
	          	<p>{{ $user->name }}</p>
        	</div>
		</div>
		
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			
			<li class="active treeview">
				<a href="#">
            		<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          		</a>
          		<ul class="treeview-menu">
            		<li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            		<li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
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
			<li>
	          	<a href="pages/calendar.html">
	            	<i class="fa fa-calendar"></i> <span>Calendar</span>
	            	<small class="label pull-right bg-red">3</small>
	          	</a>
        	</li>
        	<li>
	          	<a href="pages/mailbox/mailbox.html">
	            <i class="fa fa-envelope"></i> <span>Mailbox</span>
	            <small class="label pull-right bg-yellow">12</small>
	          	</a>
        	</li>
        	<li>
        		<a href="documentation/index.html">
        		<i class="fa fa-book"></i> 
        		<span>Documentation</span></a>
        	</li>
        	
        	
        	<li class="header">MAIN NAVIGATION</li>
        	@if(count($menus))
        		@foreach($menus as $menu)
        		<li>
        			<a href="{{ $menu->url }}">
	        			<i class="{{ $menu->icon }}"></i> 
	        			<span>{{ $menu->name }}</span>
	        			@if($menu->has_sub == 1)
		        		<i class="fa fa-angle-left pull-right"></i>
		        		@endif
        			</a>
        			
        			@if($menu->has_sub == 1)
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
		</ul>
    </section>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
	        Dashboard
	        <small>Control panel</small>
      	</h1>
      	<ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Dashboard</li>
      	</ol>
    </section>
    <!-- Main content -->
    <section class="content">
    	<!-- Main row -->
      	<div class="row">
      		<!-- Left col -->
	        <section class="col-lg-7 connectedSortable">
	        	<div class="box box-info">
	        		<div class="box-header">
	        			<i class="fa fa-envelope"></i>
              			<h3 class="box-title">Quick Email</h3>
              			<!-- tools box -->
              			<div class="pull-right box-tools">
	                		<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
	                  		<i class="fa fa-times"></i></button>
              			</div>
	        		</div>
	        		<div class="box-body">
	        			<form action="#" method="post">
	        				<div class="form-group">
                  				<input type="email" class="form-control" name="emailto" placeholder="Email to:">
                			</div>
			                <div class="form-group">
			                	<input type="text" class="form-control" name="subject" placeholder="Subject">
			                </div>
			                <div>
			                	<textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
			                </div>
	        			</form>
	        		</div>
	        		<div class="box-footer clearfix">
              			<button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                		<i class="fa fa-arrow-circle-right"></i></button>
            		</div>
	        	</div>
	        </section>
	        <section class="col-lg-5 connectedSortable">
	        </section>
      	</div>
    </section>
</div>
@endsection


