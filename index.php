<!DOCTYPE html>
<html lang='ja'>

<head>
  <meta charset='UTF-8'>
  <title>新規登録</title>
</head>

<body>
  <form name="form_confirm" action="prereg.php" method="post">

    姓:
    <input type="text" name="last_name"><br>

    名:
    <input type="text" name="first_name"><br>

    メールアドレス:
    <input type="email" name="email"><br>

    誕生日:
    <input type="text" name="birth_year">
    <input type="text" name="birth_month">
    <input type="text" name="birth_day"><br>

    都道府県:
    <select name="prefecture">
      <option value="">----都道府県-----</option>
      <option value= 1>北海道</option>
      <option value= 2>青森県</option>
      <option value= 3>岩手県</option>
    </select><br>

    パスワード:
    <input type="password" name="pwd"><br>

    <input type="submit" value="送 信"><br>

  <form>
</body>

</html>
