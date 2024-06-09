<?php
require('incl/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Montserrat:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <script src="js/main.js" defer></script>
    <title>Document</title>
</head>

<body>
    <?php include('incl/head.php'); ?>
    <section>
        <div class="container">
            <div class="header">
                <div class="dropdown">
                    <img src="img/menu.svg" alt="#" class="menu">
                    <div class="dropdown-content">
                        <a href="catalog.php" class="ff_roman fsz_min">Каталог</a>
                        <a href="favourites.php" class="ff_roman fsz_min">Избранное</a>
                        <a href="index.php#main" class="ff_roman fsz_min">Главная</a>
                        <a href="index.php#about" class="ff_roman fsz_min">О нас</a>
                        <a href="index.php#news" class="ff_roman fsz_min">Полезное</a>
                        <a href="index.php#letter" class="ff_roman fsz_min">Подписка</a>
                        <a href="index.php#serum" class="ff_roman fsz_min">Контакты</a>
                    </div>
                </div>
                <a href="index.php" class="italiana logo">cosmel:on</a>
                <? if (isset($_SESSION['USER'])) { ?>
                    <?php
                    if ($USER['role'] == 1) { ?>
                        <div class="menu_icons">
                            <a href="profile.php"><img src="img/user.svg" alt="#" class="user"></a>
                            <a href="basket.php"><img src="img/basket.svg" alt="#" class="basket"></a>
                        </div>
                    <? } else if ($USER['role'] == 2) { ?>
                        <div class="menu_icons">
                            <a href="profile.php"><img src="img/user.svg" alt="#" class="user"></a>
                            <a href="basket.php"><img src="img/basket.svg" alt="#" class="basket"></a>
                        </div>
                    <? }
                } else { ?>
                    <div class="menu_icons">
                        <a href="reg.php"><img src="img/user.svg" alt="#" class="user"></a>
                        <a href="reg.php"><img src="img/basket.svg" alt="#" class="basket"></a>
                    </div>
                <? } ?>
            </div>
        </div>
    </section>
</body>

</html>