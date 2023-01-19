<?php include_once "./api/base.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>投票</title>
</head>

<body>
    <div class="container-fluid text-center">
        <h1>投票</h1>
    </div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="index.php?do=login">會員登入</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?do=reg">會員註冊</a>
        </li>
    </ul>
    <?php
    if (isset($_GET['do'])) {
        $do = $_GET['do'];
    } else {
        $do = 'main';
    }

    $file = "./front/" . $do . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "./front/main.php";
    }
    ?>
</body>

</html>