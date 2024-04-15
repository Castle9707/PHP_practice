<?php

# 設定回應給用戶端的檔頭
# header('Content-Type: text/html'); # 在 php 這是預設值

header('Content-Type: text/plain'); # 純文字的內容

for ($i = 1; $i <= 42; $i++) {
    $ar1[] = $i;
}

array_push($ar1, 43);

echo implode('-', $ar1);  # 把陣列接起來變成字串
echo "\n\n";

shuffle($ar1);  # 亂數排序
echo implode('-', $ar1); # 把陣列接起來變成字串
echo "\n\n";

$str = '65;;89;;21;;11;;76;;332';
$ar2 = explode(';;', $str); # 把字串切割成陣列

var_dump($ar2);

?>