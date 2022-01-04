<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title>Гаршанов lb4</title>
</head>

<body>
Test 1:
<?php
echo "Hello, World!"
?>
<br>
Test 2:
<?php echo 2+2 ?>
<br><br>
<!--На первой страничке сайта разместить форму для ввода имени пользователя.
После того как пользователь отправил "имя пользователя",
зарегистрировать новую переменную в cookies со значением этого имени.
При переходе на другие странички - выводить это имя.
Использовать функции для работы с cookies ( setcookie ) и массив глобальных переменных $_COOKIE.-->

<form action="setUserCookie.php" method="get">
    <label> Enter your name <br>
        <input type="text" name="username" placeholder="user name" value="">
        <input type="submit" value="ok">
    </label>
</form>

</body>
</html>