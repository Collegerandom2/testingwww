<?php

require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];
$newUrl = 'site.php';

if(empty($login) || empty($pass))
{
    echo "Заполните все поля";
}
else
{
    $sql = "SELECT * FROM  `users` WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "Добро пожаловать " . $row['login'];
            header('Location: ' . $newUrl);
        }
    }
    else
    {
        echo "Нет такого пользователя";
    }
}