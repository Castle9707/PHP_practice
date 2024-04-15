<?php

header('Content-Type: text/plain'); # 純文字的內容

$ar5 = [
    'name' => 'David',
    'hello',
];

$ar6 = &$ar5;  # 設定位址
$ar6['name'] = 'Daphne';

print_r([
    'ar5' => $ar5,
    'ar6' => $ar6,
]);

$a = 10;
$b = &$a;  # 設定位址
$b = 5;

echo "\n \$a=$a, \$b=$b";