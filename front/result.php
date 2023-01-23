<?php
$subject = $Questions->find($_GET['id']);
$options = $Questions->all(['parent' => $_GET['id']]);
?>

<h1 class="text-center">問卷調查統計 : <?= $subject['text']; ?></h1>

<div class="container-fluid d-flex justify-content-center mt-3">

    <div class="col-6">

        <table class='table'>

            <thead>
                <tr>
                    <th scope='col'>選項</th>
                    <th scope='col'>結果統計</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($options as $opt) {
                    $vote = $opt['count'];
                    $all = ($subject['count'] == 0) ? 1 : $subject['count'];

                    $rate = $vote / $all;


                    echo    "<tr>";
                    echo        "<td>";
                    echo            $opt['text'];
                    echo        "</td>";
                    echo        "<td>";
                    echo            $vote."票";
                    echo            "<div class='progress'>";
                    echo                "<div class='progress-bar bg-info' role='progressbar' aria-label='Info example' style='width:" . round($rate * 100, 1) . "%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>";
                    echo                    round($rate * 100, 1) . "%";
                    echo                "</div>";
                    echo            "</div>";
                    echo        "</td>";
                    echo    "</tr>";
                }

                ?>
            </tbody>
        </table>

    </div>

</div>

<div class="text-center">
    <a href="?do=que" class="btn btn-warning">返回問卷列表</a>
</div>