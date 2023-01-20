<?php include_once "base.php";

$opt=$Questions->find($_POST['opt']);
$subject=$Questions->find($opt['parent']);

$opt['count']++;
$subject['count']++;

$Questions->save($opt);
$Questions->save($subject);

to("../index.php?do=result&id={$subject['id']}");
?>