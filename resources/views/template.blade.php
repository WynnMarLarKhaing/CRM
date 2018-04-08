<!DOCTYPE html>
<html>
<head>
	<title>CRM Project</title>
	<style media="screen">
		.wrap{
			width: 1000px;
			margin:20px auto;
		}

		h1{
			margin: 0 0 20px 0;
			padding: 0 0 10px 0;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>
<body>
	<div class="wrap">
		<h1>CRM Project</h1>
		<div class="content">
			@yield('content')
		</div>
		<hr>
		<div class="footer">
			&copy: 2018
		</div>
	</div>
</body>
</html>