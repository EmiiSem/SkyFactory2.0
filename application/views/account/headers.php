<?php
$currentController = trim($_SERVER["REQUEST_URI"], '/');
$description = "";

if (str_contains($currentController, "account/login")) {
    $description = "Авторизация в интернет-магазине телескопов SkyFactory";
} else if (str_contains($currentController, "account/register")) {
    $description = "Регистрация в интернет-магазине телескопов SkyFactory";
}

?>

<meta name="description" content='<?= $description; ?>'>
<link rel="stylesheet" href="/assest/styles/register_login.css">
<link rel="stylesheet" href="/assest/styles/personal_page.css">