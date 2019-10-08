<?php

require_once 'base_model.php';

class Premember_model extends Model{

    private $data = ['email', 'pswd', 'last_name', 'first_name', 'birth_year', 'prefecture'];


    public function check_data_set($data){

        $i = 0;
        $count = count($data);
        
        foreach ($data as $value){
            isset($_POST[$value]) ? ++$i : '' ;
        }

        $result = $i == $count ? TRUE : FALSE;

        return $result;

    }

    public function confirm_mail($to){
    
        $subject = '会員登録確認';
        $message = '会員登録ありがとうございます。下のリンクにアクセスして完了させてください';

        print mb_send_mail($to, $subject, $message) ? 'メールを送信しました' : 'エラーが発生しました';

    }

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

            confirm_mail($_POST['email']);
            
            
        } catch(PDOException $error){
            
            $pdo->rollback();
            
            print("エラー:" .$error->getMessage() );
            
        }
        
    }