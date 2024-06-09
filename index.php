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
    <!-- отложенный вызов -->
    <div class="container">
        <div class="phone">
            <div class="time-block">
                <p class="ff_roman fsz_min">При покупке на <span class="yellow">10 000₽</span><br><br><span class="yellow">В подарок:</span> пенка для умывания от HADO LABO </p>
                <div class="count montserrat fsz_min"></div>
            </div>
            <button class="time-button"><img src="img/gift.svg" alt="#"></button>
        </div>
    </div>
    <div class="btn_block">
        <a href="" class="btn_circle"><img src="img/ar_up.png" alt="#" class="ar_up"></a>
    </div>
    <?php include('incl/header.php'); ?>
    <section>
        <div class="bg" id="main">
            <img src="img/banner.png" alt="#" class="banner_img">
        </div>
        <div class="container">
            <div class="banner">
                <p class="montserrat">
                    Cosmelon верит в простую, естественную и гармоничную заботу о каждой части всего тела. Каждого тела.
                </p>
                <div class="btn_block">
                    <a href="catalog.php" class="btn_border montserrat">Смотреть больше</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="about_us" id="about">
                <img src="img/about_us.png" alt="#" class="about_img">
                <div class="txt_about">
                    <h2>О нас</h2>
                    <p class="ff_roman">Наша основная ценность заключается в распространении наших высококачественных
                        натуральных средств по уходу за кожей по доступным ценам.
                        <br><br>Мы гордимся тем, что являемся брендом чистой красоты, и получили сертификаты,
                        подтверждающие
                        это, такие как CGMP, Beauty without Bunnies, cruelty-free & vegan от PETA и др. Мы всегда будем
                        придерживаться этичных и чистых принципов ведения бизнеса в сфере красоты.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- slider -->
    <section>
        <?php
        $sql = "SELECT * FROM article";
        $result = $link->query($sql);
        ?>
        <div class="container">
            <h2 id="news" class="h2_news">Полезное по уходу</h2>
            <div class="slider_news">
                <div class="slider">
                    <button id="prev" class="ar_slide"><img src="img/ar_left.svg" alt="#"></button>
                    <?php foreach ($result as $news) : ?>
                        <div class="slide">
                            <div class="slide_news">
                                <img src="<?= $news['photo'] ?>" alt="#" class="news_img">
                                <h3><?= $news['title'] ?></h3>
                                <p class="ff_roman"><?= $news['min_txt'] ?></p>
                                <div class="btn_block">
                                    <a href="article.php?id=<?php echo $news['id'] ?>" class="btn_border montserrat">Читать далее</a>
                                </div>
                            </div>
                        </div>
                    <? endforeach; ?>
                    <!-- <div class="slide">
                            <div class="slide_news">
                                <img src="img/card_newsTwo.png" alt="#" class="news_img">
                                <h3>Центелла азиатская косметика для лица</h3>
                                <p class="ff_roman">Цица-крем содержит в основе ингредиенты, которые укрепляют защитный барьер
                                    кожи, поэтому о нём все говорят. Трудно найти средство, которое было бы столь эффективным.</p>
                                <div class="btn_block">
                                    <a href="catalog.php" class="btn_border montserrat">Читать далее</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide_news">
                                <img src="img/card_newsThree.png" alt="#" class="news_img">
                                <h3>Центелла азиатская косметика для лица</h3>
                                <p class="ff_roman">Цица-крем содержит в основе ингредиенты, которые укрепляют защитный барьер
                                    кожи, поэтому о нём все говорят. Трудно найти средство, которое было бы столь эффективным.</p>
                                <div class="btn_block">
                                    <a href="catalog.php" class="btn_border montserrat">Читать далее</a>
                                </div>
                            </div>
                        </div> -->
                    <button id="next" class="ar_slide"><img src="img/ar_right.svg" alt="#"></button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="block_four" id="serum">
                <div class="serum_block">
                    <img src="img/serum.png" alt="#" class="serum_img">
                    <div class="btn_block serum_btn">
                        <a href="catalog.php" class="btn_border_min_white montserrat">В каталог</a>
                    </div>
                </div>
                <div class="contacts">
                    <img src="img/list.png" alt="#" class="list">
                    <p class="montserrat fsz_min">Служба заботы</p>
                    <a href="support@cosmelon.com" class="ff_roman fsz_min">support@cosmelon.com</a>
                    <br>
                    <p class="montserrat fsz_min">Горячая линия</p>
                    <a href="+7 900 000 00 00" class="ff_roman fsz_min">+7 900 000 00 00</a>
                    <br>
                    <p class="montserrat fsz_min">Соц. сети</p>
                    <div class="social_icons center_icon">
                        <a href="telegram.com"> <img src="img/telegram.svg" alt="#" class="network"></a>
                        <a href="pinterest.com"><img src="img/pinterest.svg" alt="#" class="network"></a>
                        <a href="vk.com"><img src="img/vk.svg" alt="#" class="network"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="newsletter" id="letter">
                <div class="newsletter_txt">
                    <h2>Хочешь скидки до 15%?</h2>
                    <p class="ff_roman">Подпишись и получишь доступ к нашим сикдкам :)</p>
                    <?php


                    if (isset($_POST['subs'])) {
                        $email = $_POST['email'];

                        if (empty($email)) {
                            $error_email = '<p class="error">Введите почту</p>';
                        }

                        $sql = "SELECT count(*) FROM email WHERE email = '$email'";
                        $count_em = $link->query($sql)->fetchColumn();

                        if ($count_em > 0) {
                            echo '<script>document.location.href="index.php#letter"</script>';
                            echo '<p class="error">Вы уже подписаны на рассылку</p>';
                        } else {

                            if (empty($error_email)) {
                                $sql = "INSERT INTO email (email)
                            VALUES ('$email')";
                                $link->query($sql);
                                echo '<script>document.location.href="index.php#letter"</script>';
                                echo '<p class="error">Вы успешно подписались на рассылку!</p>';
                                session_start();
                                $_SESSION['subscribed'] = true;
                            }
                        }
                    }
                    ?>
                    <form class="forma_sub" method="POST">
                        <input type="text" name="email" class="ff_roman fsz_min" placeholder="Введите почту">
                        <input type="submit" class="btn_full montserrat fsz_min" value="Подписаться" name="subs">
                    </form>
                    <?= $error_email ?>
                </div>
                <img src="img/newsletter.png" alt="#" class="letter_img">
            </div>
        </div>
    </section>
    <?php include('incl/footer.php'); ?>
</body>

</html>