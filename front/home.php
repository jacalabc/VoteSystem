<?php
include_once "./api/base.php";
// 找image_name欄位
$image_name = array_column($Images->all(), 'image_name');
//  print_r($image_name);
// 找id欄位
// $id = array_column($Images->all(), 'id');
// print_r($id);
// 找key值
// $key = array_search($id, $image_name);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票</title>
</head>

<body>

    <div class="contaoner text-center pt-5 pb-5 HomeText">
        <h1>這裡提供各種神奇問題投票，還請多多指教:D，請先成為會員喔</h1>
    </div>

    <div class="container-fluid myPic mb-5">
        <div class="row justify-content-center">

            <div id="carouselExampleFade" class="carousel slide carousel-fade col-6 " data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./image/miku.jpg" class="d-block w-100 myImg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./image/miku02.jpg" class="d-block w-100 myImg" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./image/mumei.png" class="d-block w-100 myImg" alt="...">
                    </div>

                    <?php
                    foreach ($image_name as $img) {
                        if ($img != '') {
                    ?>
                            <div class="carousel-item">
                                <img src="./upload/<?= $img; ?>" class="d-block w-100 myImg" alt="...">
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>


</body>

</html>