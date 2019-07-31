<!DOCTYPE html>
<html>
<head>
	<title>process register</title>
</head>
<body>
<?php
	if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['confpassword']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['confpassword'])){
		$name_regis = $_POST['name'];
		$pass_regis = $_POST['password'];
		$confpass_regis = $_POST['confpassword'];
		$check = true;
		if ($pass_regis === $confpass_regis) {
			include("common.php");
		    $check_name = false;
	        $results = "SELECT name,password  FROM  login WHERE name = '$name_regis'";
		    foreach ($conn->query($results) as $row){
	    		$check = false;
	    		$check_name = true;
	    		echo "Tên đăng nhập đã được sử dụng";
	    		echo "<a href = 'http://localhost/MANAGE/REGISTER.php'>"."Back to Register"."</a>";
	    		break;
		    	}
		    if($check_name === false){
			    $code = md5($pass_regis);
			    $sql = "INSERT INTO login(name, password) 
	                VALUES ('$name_regis','$code')";
	            $conn -> exec($sql); 
			}
		}
		else{
			$check = false;
			echo "Password không trùng khớp";
			echo "<a href = 'http://localhost/MANAGE/REGISTER.php'>"."Back to Register"."</a>";
		}	
	}else{
		$check = false;
		echo "Nhập đầy đủ thông tin";
		echo "<a href = 'http://localhost/MANAGE/REGISTER.php'>"."Back to Register"."</a>";
	}
	if ($check)
	{
		echo "Register Successfully";
		echo "<a href = 'http://localhost/MANAGE/Sign.php'>"."Back to Sign in"."</a>";
	}
?>
</body>
</html>
