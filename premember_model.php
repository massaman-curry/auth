<?php

$dsn = 'mysql:host=localhost;dbname=app1';
$username = 'app1';
$pswd = 'vagrant';

try{
    $pdo = new PDO($dsn, $username, $pswd);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    print("接続しました。");

}

