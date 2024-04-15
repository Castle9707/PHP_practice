<?php

# 設定回應給用戶端的檔頭
# header('Content-Type: text/html'); # 在 php 這是預設值

header('Content-Type: text/plain'); # 純文字的內容

$ar1 = array(1, 2, 3, );
$ar2 = [1, 2, 3,];

$ar3 = array(
    'name' => 'David',
    'age' => 28,
);

$ar4 = [
    'name' => 'David',
    'age' => 28,
];

$ar5 = [
    'name' => 'David',
    'hello',
    'age' => 28,
    56,
];
var_dump($ar1);

print_r($ar1);
print_r($ar4);
print_r($ar5);

?>