<?php
$title = '通訊列表';
$pageName = 'list';
?>

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
        <div class="col d-flex justify-content-center my-4">
            <nav aria-label="Page Navigation Example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="?page=1">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                    <li class="page-item ">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++):
                        if ($i >= 1 and $i <= $totalPages): ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endif; endfor; ?>
                    <li class="page-item ">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item ">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col"><i class="fa-solid fa-trash"></i></th>
                        <th scope="col">#</th>
                        <th scope="col">姓名</th>
                        <th scope="col">Email</th>
                        <th scope="col">手機</th>
                        <th scope="col">生日</th>
                        <th scope="col">地址</th>
                        <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <!-- <td><a data-bs-toggle="modal" href="#deleteModal"><i class="fa-solid fa-trash"></i></a></td> -->
                            <td><a href="javascript: deleteOne(<?= $r['sid'] ?>)">
                                    <i class="fa-solid fa-trash"></i></a></td>
                            <td><?= $r['sid'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= $r['mobile'] ?></td>
                            <td><?= $r['birthday'] ?></td>
                            <td><?= htmlentities($r['address']) ?></td>
                            <td><a href="edit.php?sid=<?= $r['sid'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- 確認刪除 彈出視窗 -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">確定刪除此筆資料？</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">保留</button>
                <!-- 這裡有問題 -->
                <button type="button" class="btn btn-danger" herf="delete.php?sid=<?php $r['sid'] ?>">確認刪除</button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    // const delModal = new bootstrap.Modal('#deleteModal');
    // delModal.show();
    const deleteOne = (sid) => {
        if (confirm(`是否要刪除編號為 ${sid} 的資料？`)) {
            location.herf = `delete.php?sid=${sid}`;
        }
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>