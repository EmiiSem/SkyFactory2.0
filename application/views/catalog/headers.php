<?php
$currentController = trim($_SERVER["REQUEST_URI"], '/');
$styleType = "";

if (strpos($currentController, "catalog/product") !== false) {
    $styleType = "cart_page";
} else if (strpos($currentController, "catalog") && !strpos($currentController, "product") !== false) {
    $styleType = "catalog_page";
}

?>

<meta name="description" content="Телескопы, имеющие низкие цены на Телескопы на рынке России. Сравните технические характеристики на Телескопы. Телескопы для начинающих и детей.
    Быстрый и удобный поиск из товаров популярных брендов: Sky-Watcher, Celestron, Levenhuk, Veber и другие.">
<link rel="stylesheet" href="/assest/styles/<?= $styleType; ?>.css">
<link rel="stylesheet" href="/assest/styles/personal_page.css">