<?php

$data = ['email', 'pswd', 'last_name', 'first_name', 'birth_year', 'prefecture'];


function check_data_set($data){

    $i = 0;
    $count = count($data);
    
    foreach ($data as $value){
        isset($_POST[$value]) ? ++$i : '' ;
    }

    $result = $i == $count ? TRUE : FALSE;

    return $result;

}

function db_connect(){

    $dsn = 'mysql:host=localhost;dbname=app1';
    $username = 'app1';
    $pswd = 'vagrant';

    try{

        $pdo = new PDO($dsn, $username, $pswd);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        print("接続しました。");
    
    } catch(PDOException $error){
    
        die($error->getMessage);
    
    }

    return $pdo;

}

$pdo = db_connect();


if (check_data_set($data)){

    try{

        $pdo->beginTransaction();
    
        $sql = 'INSERT INTO preusers(
            email, pswd, last_name, first_name, birthday, prefecture)
            VALUES(
            :email, :pswd, :last_name, :first_name, :birthday, :prefecture
            )';
    
        $stmh = $pdo->prepare($sql);
        
        $stmh->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $stmh->bindValue(':pswd', $_POST['pswd'], PDO::PARAM_STR);
        $stmh->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
        $stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
        $stmh->bindValue(':birthday', $_POST['birth_year'], PDO::PARAM_INT);
        $stmh->bindValue(':prefecture', $_POST['prefecture'], PDO::PARAM_INT);
        
        $stmh->execute();
        
        $pdo->commit();
        
        print 'データを'.$stmh->rowCount().'件登録しました。';
        
        
    } catch(PDOException $error){
        
        $pdo->rollback();
        
        print("エラー:" .$error->getMessage() );
        
    }
    
}
