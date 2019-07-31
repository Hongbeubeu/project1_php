<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>
<body>
	<?php
		include("common.php"); 
	    $getid = $_GET["id"];
	    $results = "SELECT name, email, address, age, phone, imgdata  FROM  my_user WHERE id = $getid ";
	    foreach($conn->query($results) as $row)
	    	{
	    		$g_name = $row['name'];
	    		$g_email = $row['email'];
	    		$g_address = $row['address'];
	    		$g_age = $row['age'];
	    		$g_phone = $row['phone'];
	    		$g_img = $row['imgdata'];
	    	}
		echo '<form action="process_update.php?id='.$_GET["id"].'" method="post" enctype="multipart/form-data">';

	?>
	<div class="topnav">
		<a class="active" href="SHOW_TABLE.php">Table</a>
	</div>
	<h1>ADD USER</h1>

	<div class="w3layoutscontaineragileits">
	<h2>FILL INFORMATION HERE</h2>
		<form action="process_add.php" method="post"enctype="multipart/form-data">
			<input type="text" Name="name" placeholder="USERNAME" required="" value="<?php echo $g_name; ?>">
			<input type="email" Name="email" placeholder="EMAIL" required="" value="<?php echo $g_email; ?>">
			<input type="text" Name="address" placeholder="ADDRESS" required="" value="<?php echo $g_address; ?>">
			<input type="number" Name="age" placeholder="AGE" required="" value="<?php echo $g_age; ?>">
			<input type="tel" Name="phone" placeholder="PHONE NUMBER" required="" value="<?php echo $g_phone; ?>">
				
			<input type="file" Name="image""/>
			<img src="upload/<?php echo $g_img; ?>" width="100" height="100">
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="SUBMIT">
				<div class="clear"></div>
			</div>
		</form>
	</div>
</body>
</html>
