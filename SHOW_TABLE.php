<!DOCTYPE html>
<html>
<head>
    <title>TABLE USER</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <div class="topnav">
        <a class="active" href="ADD_USER.php">Add User</a>
        <a href="SHOW_TABLE.php">Table</a>
        <a href="Sign.php">Log out</a>
        <div class="search-container">
            <form action="SHOW_TABLE.php" method="GET">
                <input placeholder="Search" type="text" name="keyword">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <?php 
    include("common.php");

    $display = 5;
    $num_links = 5;
    $page_url = 'http://localhost/MANAGE/SHOW_TABLE.php';

    $whereCond = '';
    $keyword = '';
    $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 


    if(isset($_GET['keyword']) && !empty($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $kt = "'";
        $pos = strpos($keyword, $kt);
        if($pos === false)
        {
            if(is_numeric($keyword)){
                $whereCond = "WHERE phone LIKE '%$keyword%'";
            }
            elseif (preg_match($regex, $keyword)) {
                $whereCond = "WHERE email = '$keyword'";
            }
            else{
                $whereCond = "WHERE name LIKE '%$keyword%'";
            }
        }else{
            $message = "Không điền ký tự đặc biệt vào Search";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }

    $page_url .= '?keyword=' . $keyword;
    $records = $conn->query("SELECT id FROM my_user {$whereCond}");
    $total_records = 0;

    foreach ($records as $row) {
        $total_records ++;
    }
    if ($total_records > 0) {
        echo '<table class = "table table-dark">';
        echo '    <tr>';
        echo '        <th scope = "col">Id</th>';
        echo '        <th scope = "col">Name</th>';
        echo '        <th scope = "col">Email</th>';
        echo '        <th scope = "col">Address</th>';
        echo '        <th scope = "col">Age</th>';
        echo '        <th scope = "col">Phone Number</th>';
        echo '        <th scope = "col">Image</th>';
        echo '        <th scope = "col">Update</th>';
        echo '        <th scope = "col">Delete</th>';
        echo '    </tr>';
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $current_page = $_GET['page'];
        }
        else{
            $current_page = 1;
        }

        $position = (($current_page -1)*$display);

        $total_page = ceil($total_records / $display);

        if ($current_page > $num_links){
            $start = $current_page - ($num_links - 1);
        }
        else {
            $start = 1;
        }

        if (($current_page + $num_links) < $total_page){
            $end = $current_page + $num_links;
        }
        else{
            $end = $total_page;
        }
        ?>
        <div>
            <?php 

            $results = "SELECT id, name, email, address, age, phone, imgdata  FROM  my_user {$whereCond} ORDER BY id DESC LIMIT $position,$display ";

            foreach ($conn->query($results) as $row){
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['address'].'</td>';
                echo '<td>'.$row['age'].'</td>';
                echo '<td>'.$row['phone'].'</td>';
                echo '<td>'.'<img src="upload/'.$row["imgdata"].'" width="100" height="100">'.'</td>';
                echo '<td>'.'<a href = "http://localhost/MANAGE/UPDATE_USER.php?id='.$row["id"].'">'.'<input type="button" value = "UPDATE" class="btn btn-primary">'.'</a>'.'</td>';
                echo '<td>'.'<a href = "http://localhost/MANAGE/process_delete.php?id='.$row["id"].'">'.'<input type="button" value = "DELETE" class="btn btn-outline-danger">'.'</a>'.'</td>';
                echo '</tr>';
                echo '<br>';    
            }

            ?>
        </div>
    </table>
    <div>
        <ul>
            <?php 
                // PHẦN HIỂN THỊ PHÂN TRANG
            if(isset($total_page)){
                if($total_page > 1){
                    echo '<li>Page '. $current_page.  'of '. $total_page. '</li>';
                    if($current_page > $num_links){
                        echo '<li><a href= "'. $page_url. '&page=1'.'">First</a></li>';
                    }

                    if($current_page > 1){                   
                        echo '<li><a href= "'. $page_url. '&page='.($current_page - 1).'">Previous</a></li>';
                    }

                    for($pages = $start ; $pages <= $end ; $pages++){
                        if($pages == $current_page){
                            echo '<li><a href= "'. $page_url. '&page=' .$pages.'">'.$pages.'</a></li>';
                        }
                        else{
                            echo '<li><a href="'.$page_url.'&page='.$pages.'">'.$pages.'</a></li>'; 
                        }
                    }

                    if ($current_page < $total_page){
                        echo '<li><a href="'.$page_url.'&page='.($current_page + 1).'">Next</a></li>';
                    }
                    if(($current_page + $num_links) < $total_page){
                        echo '<li><a href="'.$page_url.'&page='.$total_pages.'">Last</a> </li>';
                    }
                }
            }
        }else
        { 
            echo "Not found";
        }
     ?>
 </ul>
</div>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
