<?php
include_once "base.php";

foreach($_POST['del'] as $id){
    $row=$Images->find($id);
    unlink('../upload/'.$row['image_name']);
    $Images->del($id);
}


to("../index.php");
