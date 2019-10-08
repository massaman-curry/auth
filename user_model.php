<?php

require_once 'base_model.php';

class User_model extends base_model {

    private function insert_user_model($pdo, $email, $pswd, $last_name, $first_name, $birthday, $prefecture){

        try{

            $pdo -> beginTransaction();
        
            $sql = 'INSERT INTO users(
                email, pswd, last_name, first_name, birth_day, prefecture)
                VALUES (
                :email, :pswd, :last_name, :first_name, :birth_day, :prefecture
            )';
        
            $sthmh = $pdo->prepare($sql);
            
            $stmh->bindValue(':email', $email, PDO::PARAM_STR);
            $stmh->bindValue(':pswd', $pswd, PDO::PARAM_STR);
            $stmh->bindValue(':last_name', $last_name, PDO::PARAM_STR);
            $stmh->bindValue(':first_name', $first_name, PDO::PARAM_STR);
            $stmh->bindValue(':birth_day', $birth_day, PDO::PARAM_INT);
            $stmh->bindValue(':prefecture', $prefecture, PDO::PARAM_STR);
        
        } catch(PDOException $error){
        
            $pdo -> rollback();
        
            print ("エラー:" .$error->getMessage());
        
        }

    }

}

$user_model = new User_model;

$pdo = $user_model->db_connect();

$email = $_POST['email'];
$pswd = $_POST['pswd'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$birth_day = $_POST['birth_day'];
$prefecture = $_POST['prefecture'];

$user_model->insert_user_model($pdo, $email, $pswd, $last_name, $first_name, $birth_day, $prefecture);

