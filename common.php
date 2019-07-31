<?php
	$servername = "localhost";
    $username = "hongbeu";
    $password = "190899";
    $dbname = "user";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->exec("set names utf8");
	    }   
	    catch(PDOException $errMsg){
	        echo 'loi: ' .$errMsg->getMessage();
	    }   
?>