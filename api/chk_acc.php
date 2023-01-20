<?php include_once 'base.php';
//dd($_POST);

echo $Users->count(['acc'=>$_POST['acc']]);

/* if($user>0){
    echo 1;
}else{
    echo 0;
} */

?>