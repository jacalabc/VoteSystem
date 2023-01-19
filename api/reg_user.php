<?php
include "base.php";

$acc=trim((strip_tags($_POST['acc'])));
$pw=trim($_POST['pw']);
$email=trim($_POST['email']);

if(empty($acc) || empty($pw) || empty($email)){
    // echo "欄位不可空白";

    header("location:../index.php?do=reg");
    exit();
}else{

$sql="insert into `users` (`acc`,`pw`,`email`) values('$acc','$pw','$email')";
echo "acc=>".$acc;
echo "<br>";
echo "pw=>".$pw;
echo "<br>";
echo "email=>".$email;
echo "<br>";
echo $sql;
// $pdo->exec($sql);

// header("location:../index.php?do=login");

}


?>