<?php

header('Content-Type: application/json'); # Json的內容

$ar9 = [
    'name' => '小新',
    'age' => '5',
    'data' => 'vvb6/vv',
];

echo json_encode($ar9, JSON_UNESCAPED_UNICODE);
