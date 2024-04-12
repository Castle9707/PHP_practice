<?php

define("MY_CONSTANT", "常數_值在設定後不可變更");
echo MY_CONSTANT;
echo "<br>";

$i = 1;

echo isset($i) ? "i 有設定" : "i 沒有設定";
echo "<br>";
echo isset($k) ? "k 有設定" : "k 沒有設定";

?>