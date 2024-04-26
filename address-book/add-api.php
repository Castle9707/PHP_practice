<?php

require __DIR__ . '/../config/pdo-connect.php';

header("Content-Type: application/json");

$output = [
    'success' => false, //沒有新增成功
    'bodyData' => $_POST,
    'newId' => 0,
];

// TODO: 欄位資料檢查
if (!isset($_POST['name'])) {
    echo json_encode($output);
    exit;
}

//錯誤的做法，會有 SQL injection 的問題
/*
$sql = sprintf("INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (
      '%s',
      '%s',
      '%s',
      '%s',
      '%s', NOW() )",
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address']
);

$stmt = $pdo->query($sql);
*/

$birthday = strtotime($_POST['birthday']);
if ($birthday === false) {
    $birthday = null;
} else {
    $birthday = date('Y-m-d', $birthday);
}

$sql = "INSERT INTO `address_book`(
    `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (
      ?,
      ?,
      ?,
      ?,
      ?, NOW() )";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $birthday,
    $_POST['address']
]);


$output['success'] = !!$stmt->rowCount(); # 新增了幾筆
$output['newId'] = $pdo->lastInsertId(); # 取得最近的新增資料的primary key

echo json_encode($output);