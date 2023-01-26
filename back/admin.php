<h1 class="mt-3">帳號管理</h1>

<form action="./api/del_acc.php" method="post">
    <?php
    $rows = $Users->all();
    ?>
    <div class="container d-flex justify-content-center">
        <table class="table">
            <thead>
                <th scope="col">帳號</th>
                <th scope="col">密碼</th>
                <th scope="col">刪除</th>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                    if ($row['acc'] != 'admin') {
                ?>
                        <tr>
                            <td><?= $row['acc']; ?></td>
                            <td>
                                <?= str_repeat("*", strlen($row['pw'])); ?>
                            </td>
                            <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-danger me-3" value="確定刪除">
        <input type="reset" class="btn btn-info" value="清空選取">
    </div>
</form>