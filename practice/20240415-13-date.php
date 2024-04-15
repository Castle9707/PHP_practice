<?php
# date_default_timezone_set('Asia/Taipei');

header('Content-Type: text/plain');

echo date("Y-m-d H:i:s") . "\n\n";
echo date("Y-m-d H:i:s", time() + 30 * 24 * 60 * 60) . "\n\n";
echo date("D w", time() + 30 * 24 * 60 * 60) . "\n\n";
$t = strtotime('2024-08-10');
echo date("Y-m-d H:i:s", $t) . "\n\n";
