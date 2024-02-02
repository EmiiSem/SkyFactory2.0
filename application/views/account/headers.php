<?php
$currentController = trim($_SERVER["REQUEST_URI"], '/');
$description = "";

if (strpos($currentController, "account/login") !== false) {
    $description = "Авторизация в интернет-магазине телескопов SkyFactory";
} else if (strpos($currentController, "account/register") !== false) {
    $description = "Регистрация в интернет-магазине телескопов SkyFactory";
}

?>

<meta name="description" content='<?= $description; ?>'>
<link rel="stylesheet" href="/assest/styles/register_login.css">
<link rel="stylesheet" href="/assest/styles/personal_page.css">