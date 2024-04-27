<?php

$hash = '$2y$10$fp1ij1BYNzGEFa4OT9UdnO4/OZLR64ZfHfNLExMTA1UpcGj9AmjhC';
$pw = '1234567';

var_dump(password_verify($pw, $hash));