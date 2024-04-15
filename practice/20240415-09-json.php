<?php

header('Content-Type: application/json');

$ar10 = [
    'name' => [
        'first' => 'David',
        'last' => 'Wick',
    ],
    'age' => 28,
    'gender' => 'male',
];

echo json_encode($ar10);

// echo '123';