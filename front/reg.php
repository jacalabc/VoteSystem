<form action="../api/reg_user.php" method="post">
    <div class="container col-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="acc" id="account" placeholder="name@example.com">
            <label for="account">帳號</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="pw" id="Password" placeholder="Password">
            <label for="Password">密碼</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="email" id="ConfirmPassword" placeholder="Password">
            <label for="ConfirmPassword">確認密碼</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="email">電子郵件</label>
        </div>
    </div>
    <div class="text-center mt-5">
        <button type="button" class="btn btn-outline-info me-5">重置</button>
        <button type="submit" class="btn btn-outline-success">註冊</button>
    </div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {

        const account = $('#account');
        const password = $('#Password');
        const ConfirmPassword = $('#ConfirmPassword');
        const email = $('#email');
        const resetBtn = $("button[type='button']");
        const submitBtn = $("button[type='submit']");

        resetBtn.click(function() {
            account.val('');
            password.val('');
            ConfirmPassword.val('');
            email.val('');
        })

        submitBtn.click(function() {
            if (account.val() == '') {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: '溫馨提示',
                    text: '帳號不可空白'
                })
            }
            if (password.val() == '' || ConfirmPassword.val() == '') {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: '溫馨提示',
                    text: '密碼不可空白'
                })
            }
            if (password.val() != ConfirmPassword.val()) {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: '溫馨提示',
                    text: '確認密碼與密碼不符，請重新輸入'
                })
            }
            if (email.val() == '') {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: '溫馨提示',
                    text: '電子郵件不可空白'
                })
            }
            if (account.val() == '' && password.val() == '' && ConfirmPassword.val() == '' && email.val() == '') {
                event.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: '溫馨提示',
                    text: '請填寫欄位 :D'
                })
            }
        })
    })
</script>