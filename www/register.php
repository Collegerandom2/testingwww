<?php
 require_once('db.php');
$login = $_POST['login'];
$pass = $_POST['pass'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];


if(empty($login) || empty($pass) || empty($repeatpass) || empty($email))
{
    echo "Заполните все поля";
}
else
{
    if($pass != $repeatpass)
    {
        echo "Пароли не совпадают!";
    }
    else
    {
        $sql = "SELECT * FROM  `users` WHERE login = '$login' OR email = '$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "Имя пользователя или почта заняты";
            }
        }
        else
        {
            $sql = "INSERT INTO `users` (login,pass,email) VALUES('$login', '$pass', '$email')";
            if($conn -> query($sql) === TRUE)
            {
                echo "Успешная регистрация!";
            }
            else
            {
                echo "Ошибка: " . $conn->error;
            }
        }

        
    }
    
}



