<!DOCTYPE html>
<html>
<head>
    <title>Delete complete</title>
    <meta http-equiv="refresh" content="1;url=http://localhost/MANAGE/SHOW_TABLE.php">
</head>
<body>
    <?php
    include("common.php");

    $id = $_GET["id"];
    $name_user = $_POST["name"]; 
    $email = $_POST["email"];
    $address = $_POST["address"];
    if(is_numeric($_POST["age"]) && is_numeric($_POST["phone"])){
        $age = $_POST["age"];
        $phone = $_POST["phone"];
     

        if(!empty($_FILES['image']['name']))
        {
            $name_img = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],"upload/$name_img");
            $sql ="UPDATE my_user
            SET imgdata = '$name_img'
            WHERE id = '$id'";
            $stmt = $conn -> prepare($sql);
            $stmt -> execute();
        }

        $sql = "UPDATE my_user 
        SET name = '$name_user', 
        email = '$email',
        address = '$address',
        age = '$age',
        phone = '$phone'
        WHERE id = '$id'";

        $stmt = $conn->prepare($sql);
        $stmt -> execute();
        echo" UPDATED successfully";
    }else{
        $message = "age and phone must be numberic";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    $conn = null;   
    ?>
</body>
</html>