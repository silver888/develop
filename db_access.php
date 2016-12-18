<?php


##DBに接続するクラス
class connect_db{
  //PDO接続する関数
  function pdo($strQuery){
    $dsn="mysql:dbname=wktk0127;host=localhost;charset=utf8";
    $user="wktk0127";
    $pass="Lsa0cXl1";
    try{
      $pdo=new PDO($dsn,$user,$pass);
    }catch(Exception $e){
      echo 'error' .$e->getMesseage;
      die();
    }
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $stmt=$pdo->query($strQuery);
    $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $items;
  }
}

?>
