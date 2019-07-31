<!DOCTYPE html>
<html>
<head>
    <title>Delete complete</title>
    <meta http-equiv="refresh" content="1;url=http://localhost/MANAGE/ADD_USER.php">
</head>
<body>
    <?php
    if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["address"]) && !empty($_POST["age"]) && !empty($_POST["phone"]) && !empty($_POST["phone"])){
        include("common.php");

        $name_user = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $age = $_POST["age"];
        $phone = $_POST["phone"];
        $name_img = $_FILES["image"]["name"];
        if(is_numeric($_POST["age"]) && is_numeric($_POST["phone"])){
            $sql = "INSERT INTO my_user(name, email, address, age, phone, imgdata) 
            VALUES ('$name_user','$email','$address','$age','$phone','$name_img')";
            move_uploaded_file($_FILES['image']['tmp_name'],"upload/$name_img");

            $conn->exec($sql);
            echo "INSERT_USER successfully";
        }
        else
        {
            $message = "age and phone must be numberic";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        $conn = null;
    }else
    {
        $message = "fill full the form";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    ?>
</body>
</html>