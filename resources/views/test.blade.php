<!DOCTYPE html>
<html>
	<head>
    	<title>Laravel</title>
    </head>
    <body>
    	<h1>權限測試</h1>
    	@foreach($menus as $menu)
    	<p>
    		@can($menu->id,'view')
    		<a href="#">{{ $menu->name }}</a>
    		@endcan
    	</p>
    	@endforeach
    </body>
</html>