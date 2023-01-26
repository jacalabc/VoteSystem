<?php
include_once "./api/base.php";
?>
<div class="container-fluid mt-3">
    <div class="text-center">
        <h1 style="color: #F2AD0C;">會員資料修改</h1>
    </div>

    <div class="container col-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="acc" id="acc" value="<?=$_SESSION['login'];?>" placeholder="填寫你的帳號:D">
            <label for="acc">帳號</label>
        </div>
       <?php
            // 找acc欄位
            $acc = array_column($Users->all(), 'acc');
            // print_r($acc);
            // 找key值
            $key = array_search($_SESSION['login'],$acc);  
        ?>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw" id="pw" value="<?=array_column($Users->all(), 'pw')[$key];?>" placeholder="填寫你的密碼:D">
            <label for="pw">密碼</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw2" id="pw2" value="<?=array_column($Users->all(), 'pw')[$key];?>" placeholder="確認你的密碼:D">
            <label for="pw2">確認密碼</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" value="<?=array_column($Users->all(), 'email')[$key];?>" placeholder="name@example.com">
            <label for="email">電子郵件</label>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-outline-info me-5" onclick='reset()'>清除</button>
        <button class="btn btn-outline-success" onclick='reg()'>修改</button>
    </div>
</div>

<script>
    function reset() {
        $("#acc,#pw,#pw2,#email").val('')
    }

    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),           
        }

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
                                    text: '修改完成'
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