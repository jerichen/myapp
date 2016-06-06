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
		<section class="col-lg-7 connectedSortable">
		
		@foreach ($roles as $role)
	        {{ $role->name }}
	    @endforeach
	    
		</section>
    </div>
</section>
@endsection
