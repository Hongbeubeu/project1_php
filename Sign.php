<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body>
	<h1>EXISTING LOGIN FORM</h1>

	<div class="w3layoutscontaineragileits">
	<h2>Login here</h2>
		<form action="" method="post">
			<input type="text" Name="name" placeholder="USERNAME" required="">
			<input type="password" Name="password" placeholder="PASSWORD" required="">
			<ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
					<a href="#">Forgot password?</a>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="LOGIN">
				<p> To register new account <span>→</span> <a class="w3_play_icon1" href="REGISTER.php"> Click Here</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
</body>
</html>

<?php
	if(isset($_POST['name']) && isset($_POST['password']) && !empty($_POST['name']) && !empty($_POST['password']))
	{
		include("common.php");

	    $name = $_POST['name'];
		$pass = md5($_POST['password']);
		$check = false;

	    $results = "SELECT name,password  FROM  login WHERE name = '$name'";
	    foreach ($conn->query($results) as $row){
    		if($pass === $row['password']){
    			$check = true;
    			header('Location: http://localhost/MANAGE/SHOW_TABLE.php');
    			break;
    		}
	    }
	    if($check === false){
	    	$message = "name or password uncorrect";
    		echo "<script type='text/javascript'>alert('$message');</script>";
	    }
	}
?>