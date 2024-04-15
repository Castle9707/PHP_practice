<?php

header('Content-Type: text/plain'); # Json的內容

$str = '{"name":"小明","性別":"男生"}';

$obj = json_decode($str); // 轉換成 php 的物件
$ar = json_decode($str, true); // 轉換成 php 的陣列

var_dump($obj);
var_dump($ar);