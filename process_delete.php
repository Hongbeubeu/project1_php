<!DOCTYPE html>
<html>
<head>
    <title>Delete complete</title>
    <meta http-equiv="refresh" content="0;url=http://localhost/MANAGE/SHOW_TABLE.php">
</head>
<body>
    <?php
        include("common.php");
        $id = $_GET["id"];
        $sql = "DELETE FROM my_user WHERE id=$id";
        $conn->exec($sql);
        echo "DELETE_USER successfully";
        $conn = null;
    ?>
</body>
</html>
