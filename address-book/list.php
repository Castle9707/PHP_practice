<?php
require __DIR__ . "/../config/pdo-connect.php";

// $sql = "SELECT * FROM address_book LIMIT 3";

// $stmt = $pdo->query($sql);
// $rows = $stmt->fetchAll();

// $rows = $pdo->query($sql)->fetchAll();

// echo json_encode($rows, JSON_UNESCAPED_UNICODE);

$perPage = 20;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(sid) FROM address_book";

# 總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

# 總頁數
$totalPages = ceil($totalRows / $perPage);
if ($page > $totalPages) {
    header("Location: ?page={$totalPages}");
    exit;
}

// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 0,20
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 20,20
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 40,20
// SELECT * FROM `address_book` ORDER BY sid DESC LIMIT 60,20


$rows = [];
if ($totalRows) {
    # 取得分頁資料
    $sql = sprintf(
        "SELECT * FROM `address_book` ORDER BY sid DESC LIMIT %s, %s",
        ($page - 1) * $perPage,
        $perPage
    );
    $rows = $pdo->query($sql)->fetchAll();
}

// echo json_encode([
//     'totalRows' => $totalRows,
//     'totalPages' => $totalPages,
//     'page' => $page,
//     'rows' => $rows,
// ]);

?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page Navigation Example">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">姓名</th>
                        <th scope="col">Email</th>
                        <th scope="col">手機</th>
                        <th scope="col">生日</th>
                        <th scope="col">地址</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <td><?= $r['sid'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= $r['mobile'] ?></td>
                            <td><?= $r['birthday'] ?></td>
                            <td><?= $r['address'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html-foot.php' ?>