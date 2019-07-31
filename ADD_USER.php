<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
	<div class="topnav">
		<a class="active" href="SHOW_TABLE.php">Table</a>
		<a href="Sign.php">Log out</a>
	</div>
	<h1>ADD USER</h1>

	<div class="w3layoutscontaineragileits">
	<h2>FILL INFORMATION HERE</h2>
		<form action="process_add.php" method="post"enctype="multipart/form-data">
			<input type="text" Name="name" placeholder="USERNAME" required="">
			<input type="email" Name="email" placeholder="EMAIL" required="">
			<input type="text" Name="address" placeholder="ADDRESS" required="">
			<input type="number" Name="age" placeholder="AGE" required="">
			<input type="tel" Name="phone" placeholder="PHONE NUMBER" required="">
			<input type="file" Name="image" required=""/>	
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="SUBMIT">
				<div class="clear"></div>
			</div>
		</form>
	</div>
</body>
</html>
					