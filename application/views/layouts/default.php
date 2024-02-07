<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="robots" content="">
    <script src="/assest/scripts/jquery.min.js"></script>
    <link rel="stylesheet" href="/assest/styles/default.css">
    <link rel="stylesheet" href="/assest/styles/header.css">
    <link rel="stylesheet" href="/assest/styles/footer.css">
    <?php
    if (isset($headers)) {
        echo $headers;
    }
    ?>
    <link rel="stylesheet" href="/assest/styles/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main">
        <?php echo $content; ?>
    </div>
    <?php include 'footer.php'; ?>
    <script src="/assest/scripts/main.js"></script>
    <script src="/assest/scripts/cart.js"></script>
</body>

</html>