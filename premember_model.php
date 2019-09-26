<?php

function db_connect(){

    $dsn = 'mysql:host=localhost;dbname=app1';
    $username = 'app1';
    $pswd = 'vagrant';

    try{

        $pdo = new PDO($dsn, $username, $pswd);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        print("接続しました。");
    
    }catch(PDOException $error){
    
        die($error->getMessage);
    
    }

    return $pdo;

}

$pdo = db_connect();

$sql = 'INSERT INTO pre_users(

    email, pswd, last_name, first_name, birthday, prefecture)
    VALUES(
    :email, :pswd, :last_name, :first_name, :birthday, :prefecture
    )';

$stmh = $pdo->prepare($sql);

$stmh->bindValue(':email', $_POST['last_name']);
$stmh->bindValue(':pswd', $_POST['pswd']);
$stmh->bindValue(':last_name', $_POST['last_name']);
$stmh->bindValue(':first_name', $_POST['first_name']);
$stmh->bindValue(':birthday', $_POST['birth_year']);
$stmh->bindValue(':prefecture', $_POST['prefecture']);

$stmh->execute();




