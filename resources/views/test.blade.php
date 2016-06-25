<!DOCTYPE html>
<html>
	<head>
    	<title>Laravel</title>
    </head>
    <body>
    	<h1>權限測試</h1>
    	<form action="" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		<input type="hidden" name="_method" value="PUT">
    		
    		<input type="submit" value="post">
    		<input type="file" id="user-image" name="user-image">
    	</form>
    </body>
</html>