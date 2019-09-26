<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset='UTF-8'>
    <title>新規登録確認</title>
</head>

<body>

<?php
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $birth_year = $_POST['birth_year'];
    $birth_month = $_POST['birth_month'];
    $birth_day = $_POST['birth_day'];
    $prefecture = $_POST['prefecture'];
    $password = $_POST['pswd'];
?>

<form name="new_registr" action="" method="post">

    <input type="hidden" name="last_name" value="<?= $last_name ?>">
    <input type="hidden" name="first_name" value="<?= $first_name ?>">
    <input type="hidden" name="email" value="<?= $email ?>">
    <input type="hidden" name="birth_year" value="<?= $birth_year ?>">
    <input type="hidden" name="birth_month" value="<?= $birth_month ?>">
    <input type="hidden" name="birth_day" value="<?= $birth_day?>">
    <input type="hidden" name="prefecture" value="<?= $prefecture ?>">
    <input type="hidden" name="pswd" value="<?= $password?>">

<p>姓: <?= $last_name?></p>

<p>名: <?= $first_name?></p>

<p>メールアドレス: <?= $email?></p>

<p>誕生日: <?= $birth_year ?> 年 <?= $birth_month?> 月 <?= $birth_day?> 日</p>

<p>都道府県: <?= $prefecture?></p>

    <input type="button" value="修正する" onclick="history.back()">
    <input type="submit" value="確 認">

</form>

</body>
</html>