<?php
$a = 66;
$b = '22';
$c = 'abc';

echo $a + $b; //88，沒有運算子多載
echo "<br>";
echo $a + $c; //Fatal Error 嚴重錯誤

?>