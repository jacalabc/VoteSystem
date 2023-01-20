<div class="container-fluid mt-3">
    <div class="text-center">
        <h1 style="color: #F2AD0C;">會員登入</h1>
    </div>

    <div class="container col-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="acc" id="acc" placeholder="name@example.com">
            <label for="floatingInput">帳號</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw" id="pw" placeholder="Password">
            <label for="floatingPassword">密碼</label>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-outline-info me-5" onclick="reset()">清除</button>
        <button class="btn btn-outline-success" onclick="login()">登入</button>
    </div>
    <div class="text-center mt-3">
        <a href="?do=forgot" class="btn btn-outline-warning me-3">忘記密碼</a>
    </div>
</div>

<script>
    function reset() {
        $("#acc,#pw").val('')
    }

    function login() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val()
        }

        $.post("./api/chk_acc.php", user, (result) => {
            console.log(result);
            if (parseInt(result) === 1) {
                //有此帳號
                $.post("./api/chk_pw.php", user, (result) => {
                    console.log(result);
                    if (parseInt(result) === 1) {
                        //帳密正確
                        if (user.acc === 'admin') {
                            location.href = 'back.php';
                        } else {
                            location.href = 'index.php';
                        }
                    } else {
                        //密碼錯誤
                        Swal.fire({
                            icon: 'error',
                            title: '溫馨提示',
                            text: '密碼錯誤'
                        })
                        reset()
                    }
                })
            } else {
                //無此帳號
                Swal.fire({
                    icon: 'error',
                    title: '溫馨提示',
                    text: '查無帳號'
                })
                reset()
            }
        })
    }
</script>