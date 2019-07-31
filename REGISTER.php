<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style1.css" type="text/css" >
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body>
	<h1>REGISTER FORM</h1>

	<div class="w3layoutscontaineragileits">
	<h2>Register here</h2>
		<form action="process_register.php" method="post">
			<input type="text" Name="name" placeholder="USERNAME" required="">
			<input type="password" Name="password" placeholder="PASSWORD" required="">
			<input type="password" Name="confpassword" placeholder="CONFIRM PASSWORD" required="">
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="REGISTER">
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
</body>
</html>