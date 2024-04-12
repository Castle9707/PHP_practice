<?php

$name = 'Bob';

echo $name . "<br>"; //使用 . 來連接

echo "$name Hello!" . "<br>"; //雙引號可包含變數
echo '$name Hello!' . "<br>"; //單引號不行

echo "{$name} Hello!" . "<br>";
echo "${name} Hello!" . "<br>";

?>