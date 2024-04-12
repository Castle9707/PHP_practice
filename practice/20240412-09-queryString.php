<?php
//echo $_GET['a'] + $_GET['b'];
//網址後?a=12&b=24

$a = isset($_GET['a']) ? intval($_GET['a']) : 0;
$b = !empty($_GET['b']) ? intval($_GET['b']) : 0;

echo $a + $b;

?>