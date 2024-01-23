<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="robots" content="">
    <link rel="stylesheet" href="/assest/styles/default.css">
    <link rel="stylesheet" href="/assest/styles/header.css">
    <link rel="stylesheet" href="/assest/styles/footer.css">
    <?php
    if (isset($headers)) {
        echo $headers;
    }
    ?>
    <link rel="stylesheet" href="/assest/styles/bootstrap.min.css">
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
</body>

</html>