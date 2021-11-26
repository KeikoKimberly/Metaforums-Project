<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to Metaforums</h1>
    <a href="login.php">Login</a>
    <br><br>
    <a href="signUp.php">SignUp</a>
    <br><br>

    <p>Posts Category : </p>
    <?php
    include("function.php");
        $conn = setUpDBConnection();

        $sql = "SELECT * FROM category ORDER BY category_title ASC";
        $res = mysqli_query($conn,$sql);
        $categories = "";

        if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['category_title'];
                $desc = $row['category_desc'];
                $categories .= "<a href='viewcategory.php?cid=".$id."' class='cat_links'>".$title."<br>".$desc.
                "<br><br>";
            }
            echo $categories;
            
        } else {
            echo "<p>There are no categories available yet.</p>";
        }

    ?>
</body>
</html>