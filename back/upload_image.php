<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票</title>
</head>

<body>
    <div class="container d-flex justify-content-center mt-3">
        <div class="row col-6">
            <form action="../api/uploadfile.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <input type="hidden" name="image" id="image" >
                <input type="file" class="form-control" name="image" id="image" aria-describedby="image" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="submit" name="image" id="image">上傳檔案</button>
            </div>
        </form>
        </div>
        
    </div>

    <a href="?do=del_img" class="btn btn-danger mt-3">前往刪除首頁圖片</a>

</body>

</html>