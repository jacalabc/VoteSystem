<h1 class="mt-3">首頁圖片刪除</h1>

<form action="./api/del_img.php" method="post">
    <?php
    include_once "./api/base.php";
    $rows = $Images->all();
    ?>
    <div class="container d-flex justify-content-center">
        <table class="table">
            <thead>
                <th scope="col">圖片名稱</th>
                <th scope="col">刪除</th>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                ?>
                        <tr>
                            <td><?= $row['image_name']; ?></td>
                            <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                        </tr>
                <?php
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