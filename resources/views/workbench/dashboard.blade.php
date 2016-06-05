@extends('workbench.index')

@section('sub_content')
<section class="content-header">
	<h1>
		{{ $sub }}
		<small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">{{ $sub }}</li>
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
@endsection



