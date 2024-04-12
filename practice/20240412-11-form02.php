<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = isset($_GET['a']) ? intval($_GET['a']) : 0;
    $b = !empty($_GET['b']) ? intval($_GET['b']) : 0;

    echo $a + $b;
    ?>
    <form action="" method="post">
        <input type="text" id="account" name="a" placeholder="a">
        <br>
        <input type="password" id="password" name="b" placeholder="b">
        <br>
        <input type="submit" value="送出">
    </form>

</body>

</html>