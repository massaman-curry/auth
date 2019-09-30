<?php

class Model{

    public function db_connect(){

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

    function confirm_user(){

        $to = 'usermail';
        $subject = '会員登録確認';
        $message = '下のメッセージ';

        // 会員登録ありがとうございます。
        // 下のリンクにアクセスして会員登録を完了してください。

        // http://192.168.33.10/premember_model.php?username=username&link_pass=linkpass

        // このメールに見覚えがない場合はメールを削除してください。
        

        mb_send_mail($to, $subject, $message);

    }


}