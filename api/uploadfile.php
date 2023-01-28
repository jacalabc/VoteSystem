<?php
include_once "base.php"; 

if($_FILES['image']['error']>0){
    echo "Error : ".$_FILES['image']['error'];
}else{
    echo "檔案名稱 : ".$_FILES['image']['name']."<br>";
    echo "檔案類型 : ".$_FILES['image']['type']."<br>";
    echo "檔案大小 : ".($_FILES['image']['size']/(1024*1024))."Mb"."<br>";
    echo "暫存名稱 : ".$_FILES['image']['tmp_name']."<br>";
    if(file_exists("../upload/".$_FILES['image']['name'])){
        echo "檔案已存在，請勿重複上傳相同檔案";
    }else{
        move_uploaded_file($_FILES['image']['tmp_name'],"../upload/".$_FILES['image']['name']);
        // 沒有用到id這個欄位所以取消
        // $Images->saveImg(['id'=>$_POST,'image_name'=>$_FILES['image']['name'],'image_size'=>$_FILES['image']['size']]);
        $Images->saveImg(['image_name'=>$_FILES['image']['name'],'image_size'=>$_FILES['image']['size']]); 
    }   
    to("../index.php");
}
?>
