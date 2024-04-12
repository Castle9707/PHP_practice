<?php

$a = 5;
$b = 7;

$c = $a and $b; // = 的優先權比 and or 高
var_dump($c);

echo "<br>";

$d = ($a and $b); //使用邏輯運算子(and)的結果為布林值
var_dump($d);

?>