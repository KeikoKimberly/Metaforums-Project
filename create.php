<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <form method = "post" action="home.php">
        <input type="radio" id="ctg" name="ctg" value="1">
        <label for="game">Game</label><br>
        <input type="radio" id="ctg" name="ctg" value="2">
        <label for="education">Education</label><br>
        <input type="radio" id="ctg" name="ctg" value="3">
        <label for="funfact">Fun fact</label><br>
        <br><br>
        <textarea name="post" id="" cols="30" rows="10"></textarea>
        <input id="post_button" type="submit" value="post">
        
    </form>
    </div>
</body>
</html>