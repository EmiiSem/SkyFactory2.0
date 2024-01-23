<?php
    include "./connect.php";

    // Получаем данные из формы
    $fio = $_POST['fio'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Создаем защищенный хеш пароля
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Вставляем данные пользователя в таблицу
    $sql = "INSERT INTO users (id, fio, login, email, password, role) VALUES (NULL, '$fio', '$login', '$email', '$hashedPassword', 1)";

    if (mysqli_query($db, $sql)) {
        echo "Пользователь зарегистрирован успешно.";
        header("Location: ../Login_page.php");
    } else {
        echo "Ошибка при регистрации пользователя: " . mysqli_error($db);
    }

    // Закрываем соединение с базой данных
    mysqli_close($db);
?>