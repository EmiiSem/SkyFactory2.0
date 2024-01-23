<?php
    include "./connect.php";

    $login = $_POST['login'];
    $password = $_POST['password'];

    // Ищем пользователя в базе данных
    $sql = "SELECT * FROM users WHERE login = '$login'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Пользователь найден
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['password'];
        
        // Проверяем соответствие паролей
        if (password_verify($password, $hashedPassword)) {
            echo "Успешная авторизация! Добро пожаловать, " . $row['login'] . "!";
            header("Location: ../Personal_accout_page.php");
        } else {
            echo "Неправильный логин или пароль.";
            header("Location: ../Login_page.php");
        }
    } else {
        echo "Пользователь не найден.";
    }

    // Закрываем соединение с базой данных
    mysqli_close($db);
?>