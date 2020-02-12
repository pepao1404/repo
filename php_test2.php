<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

try{
    $pdo = new PDO(
        'mysql:host=localhost;dbname=test;charset=utf8',
        'root',
        'yuma1404',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        )
    );
    if($_GET['tex'] != $_SESSION['tex']){
        $something = $_GET['tex'];
    
        $insert =('INSERT INTO shiken (something) VALUES(:something)');
        $setting = $pdo->prepare($insert);
        $setting->bindValue(':something',$something,PDO::PARAM_STR);
        $setting->execute();

        $_SESSION['tex'] = $_GET['tex'];
    }


}catch(PDOException $e){
    $error = $e->getMessage();
}

    $sql="SELECT * FROM shiken";
    $prep = $pdo->query($sql);
    $results = $prep->fetchAll(PDO::FETCH_NUM);
    foreach($results as $result){
        echo $result[1];
    }
