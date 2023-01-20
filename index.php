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
	<!-- sweetalert2 -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<title>投票</title>
</head>

<body>

	<div class="text-center">
		<h1 class="WebTitle">做不出來:D</h1>
	</div>

	<span class="text-center">
		<?php
		if (isset($_SESSION['login'])) {
			if ($_SESSION['login'] == 'admin') {
		?>
					歡迎，<?= $_SESSION['login']; ?>
					<button><a href='back.php'>管理</a></button>|
					<button><a href="./api/logout.php">登出</a></button>
			<?php
			} else {
			?>
				<div class="text-center mb-3">
					<span style="font-size: 20px;">歡迎，<span> <?= $_SESSION['login']; ?>
					<a href="./api/logout.php" class="btn btn-secondary">登出</a>
				</div>
			<?php
			}
		} else {
			?>
			<ul class="nav navbar navbar-dark bg-dark justify-content-center">
				<li class="nav-item">
					<a href="?do=login" class="btn btn-outline-info me-3">會員登入</a>
				</li>
				<li class="nav-item">
					<a href="?do=reg" class="btn btn-outline-warning">會員註冊</a>
				</li>
			</ul>
		<?php
		}
		?>
	</span>
	<?php
	$do = $_GET['do'] ?? 'home';
	$file = "./front/" . $do . ".php";
	if (file_exists($file)) {
		include $file;
	} else {
		include "./front/home.php";
	}
	?>


</body>

</html>