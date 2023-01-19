<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=vote";
$pdo= new PDO($dsn,'root','');
session_start();

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function all($table,...$args){
    global $pdo;
    $sql="select * from $table";
    if(isset($args[0])){
        if(is_array($args[0])){
            foreach($args[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql=$sql." where ".join(" && ",$tmp);
        }else{
            $sql=$sql . $args[0];
        }
    }
    if(isset($args[1])){
        $sql=$sql . $args[1];
    }
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function find($table,$id){
    global $pdo;
    $sql="select * from `$table`";
    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        $sql=$sql." where ".join(" && ",$tmp);
    }else{
        $sql=$sql . " where `id`='$id'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function update($table,$col,...$args){
    global $pdo;
    $sql="update $table set ";
    if(is_array($col)){
        foreach($col as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        $sql=$sql . join(",",$tmp);
    }else{
        echo "錯誤,請提供以陣列型式的更新資料";
    }
    if(isset($args[0])){
        if(is_array($args[0])){
            $tmp=[];
            foreach($args[0] as $key => $value){
                $tmp[]="`$key`='$value'";
            }
            $sql=$sql . " where ".join(" && ",$tmp);
        }else{
            $sql=$sql . " where `id`='{$args[0]}'";
        }
    }

    echo $sql;
    return $pdo->exec($sql);

    function insert($table,$cols){
        global $pdo;
    
        $keys=array_keys($cols);
    
        $sql="insert into $table (`" . join("`,`",$keys) . "`) values('" . join("','",$cols) . "')";

        return $pdo->exec($sql);
    }
}

function del($table,$id){
    global $pdo;
    $sql="delete from `$table` ";

    if(is_array($id)){
        foreach($id as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ",$tmp);

    }else{

        $sql=$sql . " where `id`='$id'";
    }

    //echo $sql;
    return $pdo->exec($sql);
}

function q($sql){
    global $pdo;
    //echo $sql;
    return $pdo->query($sql)->fetchAll();
}

function to($location){
    header("location:$location");
}
?>