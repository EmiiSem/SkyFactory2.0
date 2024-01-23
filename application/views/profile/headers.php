<?php
$currentController = trim($_SERVER["REQUEST_URI"], '/');
$description = "";

if (strpos($currentController, 'profile/edit') !== false) {
    $description = "Редактирование данных личного кабинета интернет магазина телескопов SkyFactory";
} else if (strpos($currentController, 'profile') && !strpos($currentController, 'edit')) {
    $description = "Личный кабинет Интернет магазина SkyFactory";
}
?>

<meta name="description" content="<?= $description; ?>">
<link rel="stylesheet" href="/assest/styles/personal_account_page.css">
<link rel="stylesheet" href="/assest/styles/personal_page.css">