<?php
require __DIR__ . '/../config/pdo-connect.php';

header('Content-Type: application/json');

$output = [
    'success' => false, # 有沒有登入成功
    'bodyData' => $_POST,
    'code' => 0,  # 除錯追蹤用
];

# 先確認有送表單資料過來
if (empty($_POST['email']) or empty($_POST['password'])) {
    $output['code'] = 400;
    echo json_encode($output);
    exit; # 結束 php 程式
}

# preg_match(): regexp 比對用 

# mb_strlen(): 算字串的長度

# filter_var('bob@example.com', FILTER_VALIDATE_EMAIL): 檢查 email 格式

# 1. 判斷帳號是否正確
$sql = "SELECT * FROM members WHERE email=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['email']]);

$row = $stmt->fetch();
if (empty($row)) {
    # 帳號是錯的
    $output['code'] = 420;
    echo json_encode($output);
    exit;# 結束 php 程式
}


if (password_verify($_POST['password'], $row['password'])) {
    $output['success'] = true;
    # 把登入完成的狀態記錄在 session
    $_SESSION['admin'] = [
        'id' => $row['id'],
        'email' => $row['email'],
        'nickname' => $row['nickname'],
    ];
} else {
    # 密碼是錯的
    $output['code'] = 440;
}

echo json_encode($output);