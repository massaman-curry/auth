<?php

class Model{

    private function db_connect(){

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


    // public function get_data($column, $value){

    //     try{

    //         $pdo = db_connect();

    //         $sql = 'SELECT email, last_name, first_name FROM pre_users WHERE user_id = :user_id';

    //         $stmh = $pdo->prepare($sql);
    //         $stmh->bindValue(':user_id', $user_id, PDO::PARAM_INT);

    //         $stmh->execute();


    //     } catch(PDOException $Exception){

    //         print('エラー:').$Exception->getMessage();

    //     }


    // }


}