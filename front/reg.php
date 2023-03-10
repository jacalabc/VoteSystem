<div class="container-fluid mt-3">
    <div class="text-center">
        <h1 style="color: #F2AD0C;">會員註冊</h1>
    </div>

    <div class="container col-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="acc" id="acc" placeholder="name@example.com">
            <label for="acc">帳號</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw" id="pw" placeholder="Password">
            <label for="pw">密碼</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw2" id="pw2" placeholder="Password">
            <label for="pw2">確認密碼</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            <label for="email">電子郵件</label>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-outline-info me-5" onclick='reset()'>清除</button>
        <button class="btn btn-outline-success" onclick='reg()'>註冊</button>
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
                                    text: '註冊完成'
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