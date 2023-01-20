<?php include_once "base.php";

$user=$Users->find(['email'=>$_GET['email']]);

if(!empty($user)){
    echo "您的密碼為:".$user['pw'];
}else{
    echo "<p style='color:red;font-size:20px'>查無此資料</p>";
}
?>
