<div class="text-center">
    <h1 style="color: #F2AD0C;">找回密碼</h1>
</div>
<div>
    <div class="text-center" style="font-size: 20px;">請輸入信箱以查詢密碼</div>
    <div class="text-center"><input type="text" name="email" id="email"></div>
    <div class="text-center" id="result"></div>
    <div class="text-center mt-3">
        <button class="btn btn-info" onclick='forgot()'>
            尋找
        </button>
    </div>
</div>

<script>
    function forgot() {
        $.get('./api/forgot.php', {
            email: $("#email").val()
        }, (result) => {
            $("#result").html(result)
        })
    }
</script>