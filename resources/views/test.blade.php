<!DOCTYPE html>
<html>
	<head>
    	<title>Laravel</title>
    </head>
    <body>
    	<h1>權限測試</h1>
        <p>
        	@can('user.user.view')
                <a href="#">Uesr View</a>
            @endcan
        </p>
        <p>
            @can('user.user.create')
                <a href="#">User Create</a>
            @endcan
    	</p>
    	<p>
            @can('user.user.edit')
                <a href="#">User Update</a>
            @endcan
    	</p>
    	<p>
            @can('user.user.delete')
                <a href="#">User Delete</a>
            @endcan
    	</p>
    </body>
</html>