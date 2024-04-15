<?php

$ar5 = [
    'name' => 'Bob',
    'job' => 'designer',
];

$ar6 = $ar5;
$ar6['name'] = 'Dave';

print_r([
    'ar5' => $ar5,
    'ar6' => $ar6,
]);

echo '<br>';

$ar7 = [
    'name' => 'Steve',
    'job' => 'designer',
];

$ar8 = &$ar7;
$ar8['name'] = 'Green';

print_r([
    'ar7' => $ar7,
    'ar8' => $ar8,
]);
?>