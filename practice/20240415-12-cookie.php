<?php
setcookie("my_cookie", "my value", time() + 10);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?= isset($_COOKIE["my_cookie"]) ? $_COOKIE["my_cookie"] : '沒有設定cookie' ?>
</body>

</html>