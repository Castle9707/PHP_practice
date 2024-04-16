<?php
session_start();

unset($_SESSION['admin']);
#轉向redirect
header('Location: 20240416-02-login.php');
?>