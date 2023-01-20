<?php include './api/base.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- css -->
	<link rel="stylesheet" href="./css/style.css">
	<title>投票</title>
</head>

<body>
	<div>
		<div class="text-center mt-3">
			<a href='index.php' class="btn btn-primary">回首頁</a>
		</div>
		<div>
			<div class="text-center mt-3">
				<a href="?do=admin" class="btn btn-warning">帳號管理</a>
				<a href="?do=que" class="btn btn-info">問卷管理</a>
			</div>
			<div>
				<div class="text-center">
					<span style="width:18%; display:inline-block;">
						<?php
						if (isset($_SESSION['login'])) {
							if ($_SESSION['login'] == 'admin') {
						?>
								<div class="mt-3">
									<span style="font-size: 20px;">歡迎，</span><?= $_SESSION['login']; ?>
									<a href='back.php' class="btn btn-primary">管理</a>
									<a href="./api/logout.php" class="btn btn-secondary">登出</a>
								</div>
							<?php
							} else {
							?>
								歡迎，<?= $_SESSION['login']; ?>
								<button><a href="./api/logout.php">登出</a></button>
							<?php
							}
						} else {
							?>
							<a href="?do=login">會員登入</a>
						<?php
						}
						?>
					</span>
					<div class="">
						<?php
						$do = $_GET['do'] ?? 'home';
						$file = "./back/" . $do . ".php";
						if (file_exists($file)) {
							include $file;
						} else {
							include "./back/home.php";
						}

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>