<?php
error_reporting(E_ALL & ~E_NOTICE); 
//$what = $_SESSION['what'];
try {

    $pdo = new PDO(
        'mysql:host=localhost;dbname=void;charset=utf8',
        'root',
        'yuma1404',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            )
        );
        $what = $_GET['what'];
        $when = $_GET['when'];
        $reset = $_GET['reset'];

    if($what and $when){
    
        $submit = $pdo->prepare('INSERT INTO todo VALUES(:what,:when)');
        $submit->bindValue(':what',$what);
        $submit->bindValue(':when',$when);
        $submit->execute();

    }else{
        $warning ="注：ToDoとLimitを記入してください！";
    }
    if($reset){
        $delete = $pdo->exec('DELETE FROM todo');
        echo "リセットが完了しました！";
    }

    $all = $pdo->prepare('SELECT * FROM todo');
    $all->execute();
    $all_list = $all->fetchAll(PDO::FETCH_NUM);

} catch (PDOEXCEPTION $e) {
    echo $e->getMessage();
}


