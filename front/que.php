<?php
$subjects = $Questions->all(['parent' => 0]);
?>

<h1 class="text-center">問卷調查</h1>

<div class="container-fluid d-flex justify-content-center">

    <div class="col-6">

        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">編號</th>
                    <th scope="col">問卷題目</th>
                    <th scope="col">投票總數</th>
                    <th scope="col">結果</th>
                    <th scope="col">狀態</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($subjects as $key => $subject) {
                ?>
                    <tr>
                        <td><?= $key + 1; ?>.</td>
                        <td><?= $subject['text']; ?></td>
                        <td><?= $subject['count']; ?></td>
                        <td>
                            <a href='index.php?do=result&id=<?= $subject['id']; ?>'>結果</a>
                        </td>
                        <td>
                            <?php
                            if (isset($_SESSION['login'])) {
                                echo "<a href='index.php?do=vote&id={$subject['id']}'>我要投票</a>";
                            } else {
                                echo "請先登入";
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>



</div>