<?php
$subject=$Questions->find($_GET['id']);
$options=$Questions->all(['parent'=>$_GET['id']]);
?>

<form action="./api/vote.php" method="post">
    <h1 class="text-center">問卷 : <?=$subject['text'];?></h1>
    <?php

    foreach($options as $opt){
        echo "<p class='text-center'>";
        echo "<input type='radio' name='opt' value='{$opt['id']}'> &nbsp";
        echo $opt['text'];
        echo "</p>";
    }

    ?>

    <div class="text-center">
        <input type="submit" value="我要投票" class="btn btn-success">
        <a href="?do=que">
            <input type="button" value="回問卷列表" class="btn btn-warning">
        </a>
    </div>
</form>
