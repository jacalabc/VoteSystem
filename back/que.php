<h1 class="mt-3">新增問卷</h1>

<div class="container">

    <div class="row d-flex justify-content-evenly">

        <form action="./api/add_que.php" method="post" class="text-center col-6">

            <div class="input-group mb-3 subject">
                <span class="input-group-text" id="inputGroup-sizing-default">問卷名稱</span>
                <input type="text" class="form-control" name="subject" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                <input type="hidden" name="ser" value="<?= md5(rand(1, 10000000000)) ?>">
            </div>
            <div class="input-group mb-3 options">
                <span class="input-group-text" id="inputGroup-sizing-default">選項</span>
                <input type="text" class="form-control" name="option[]" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>

            <input type="submit" class="btn btn-success me-3" value="新增">
            <input type="reset" class="btn btn-warning me-3" value="清空">
            <input type="button" class="btn btn-info" value="更多" onclick="moreOpt()">
        </form>

    </div>

</div>

<script>
    function moreOpt() {
        let opt = `<div class="input-group mt-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">選項</span>
                        <input type="text" class="form-control" name="option[]" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                   </div>`;

        $(".options").append(opt);
    }
</script>