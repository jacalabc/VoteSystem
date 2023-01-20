<?php include_once 'base.php';

$chk=$Users->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk>0){
    echo $chk;
    $_SESSION['login']=$_POST['acc'];
}else{
    echo $chk;
}

?>