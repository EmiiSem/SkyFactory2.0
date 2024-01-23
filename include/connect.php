<?php
    // Установите подключение к базе данных
    $db = mysqli_connect('localhost', 'root', '', 'skyfactory');

    // Проверяем подключение к базе данных
    if (!$db) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
?>