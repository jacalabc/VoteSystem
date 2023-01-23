<?php
include_once "base.php";

if (isset($_POST['subject']) && $_POST['subject'] != '' && $_POST['text'] != '') {

    $Questions->save(['text' => $_POST['subject'], 'count' => 0, 'parent' => 0]);

    $parent = $Questions->max('id');

    foreach ($_POST['option'] as $opt) {

        $Questions->save(['text' => $opt, 'count' => 0, 'parent' => $parent]);
    }
}

to("../back.php?do=que");
