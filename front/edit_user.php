<?php
include_once "./api/base.php";

           // 找acc欄位
            // $acc = array_column($Users->all(), 'acc');           
            // print_r($acc);
            // 找id欄位
            // $id = array_column($Users->all(),'id');
            // print_r($id);
            // 找key值
            // $key = array_search($_SESSION['login'],$acc);

            // 抓取目前登入的帳號的所有資料
            $accAllData = $Users->find(['acc'=>$_SESSION['login']]);
?>
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1 style="color: #F2AD0C;">會員資料修改</h1>
    </div>

    <div class="container col-3">
    <div class="form-floating mb-3">         
            <input type="hidden" class="form-control" name="id" id="id" value="<?=$accAllData['id'];?>">
            <label for="id">ID</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="acc" id="acc" value="<?=$accAllData['acc'];?>" placeholder="填寫你的帳號:D">
            <label for="acc">帳號</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw" id="pw" value="<?=$accAllData['pw'];?>" placeholder="填寫你的密碼:D">
            <label for="pw">密碼</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw2" id="pw2" value="<?=$accAllData['pw'];?>" placeholder="確認你的密碼:D">
            <label for="pw2">確認密碼</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" value="<?=$accAllData['email'];?>" placeholder="name@example.com">
            <label for="email">電子郵件</label>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-outline-info me-5" onclick='reset()'>清除</button>
        <button class="btn btn-outline-success" onclick='edit()'>修改</button>
    </div>
</div>

<script>
    function reset() {
        $("#acc,#pw,#pw2,#email").val('')
    }

    function edit() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
            id: $('#id').val()           
        }
        console.log(user.id)
        let EmailCharCheck = user.email.split("@")[1];
        if (user.acc === '' || user.pw === '' || user.pw2 === '' || user.email === '') {
            //有空白
            Swal.fire({
                icon: 'error',
                title: '溫馨提示',
                text: '請填寫所有欄位'
            })

        } else {
            //沒空白
            if (user.pw == user.pw2) {
                //相同
                $.post("./api/chk_acc.php", user, (result) => {
                    if (parseInt(result) === 1) {
                        //重覆
                        Swal.fire({
                            icon: 'warning',
                            title: '溫馨提示',
                            text: '帳號重複'
                        })
                    } else {                       
                        if (user.email.indexOf("@") === -1 || EmailCharCheck == '') {
                            // email 中沒有 @ 符號
                            Swal.fire({
                                icon: 'error',
                                title: '溫馨提示',
                                text: '請填寫正確的 Email 格式'
                            })
                        } else {
                            // email 中有 @ 符號
                            //不重覆
                            $.post("./api/reg.php", user, () => {
                                Swal.fire({
                                    icon: 'success',
                                    title: '溫馨提示',
                                    text: '修改完成，請重新登入以更新畫面:D'
                                })
                                reset();
                            })
                        }
                    }
                })
            } else {
                //不相同
                Swal.fire({
                    icon: 'error',
                    title: '溫馨提示',
                    text: '密碼與確認密碼不符',
                })
            }
        }
    }
</script>