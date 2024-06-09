<?php
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
    <div class="btn_block">
        <a href="" class="btn_circle"><img src="img/ar_up.png" alt="#" class="ar_up"></a>
    </div>
    <?php include('incl/header.php'); ?>
    <!-- секция статья отзывы -->
    <section>
        <div class="container">
            <?php
            if (isset($_GET['id'])) {
                $get_id = $_GET['id'];
                $sql = "SELECT * FROM article WHERE id = '$get_id'";
                $result = $link->query($sql);
                $article = $result->fetch();
            }
            ?>
            <div class="arcticle">
                <h2><?= $article['title'] ?></h2>
                <p class="ff_roman">Дата: <?= $article['date'] ?></p>
                <img src="<?= $article['photo'] ?>" alt="#" class="article_img">
                <p class="ff_roman"><?= $article['all_txt'] ?></p>

                <?php
                if (isset($_SESSION['USER']) && $USER['role'] == 1) {
                    $id_user = $USER['id'];
                ?>
                    <?php
                    if (isset($_POST['add_rev'])) {
                        $text = $_POST['text'];
                        $rating = $_POST['rating'];
                        $id_user = $USER['id'];

                        if (empty($text)) {
                            $error_text = '<p class="error">Введите отзыв</p>';
                        }
                        if (empty($rating)) {
                            $error_rating = '<p class="error">Выберите рейтинг</p>';
                        }

                        if (empty($error_text) && empty($error_rating)) {
                            $sql_user = "SELECT name, surname, photo FROM users WHERE id = '$id_user'";
                            $result_user = $link->query($sql_user);
                            $user = $result_user->fetch();

                            $sql3 = "SELECT * FROM reviews WHERE id_user = '$id_user'";
                            $result3 = $link->query($sql3);
                            $addrev = $result3->fetch();

                            if (empty($addrev)) {
                                $sql = "INSERT INTO `reviews`(text, rating, id_user, photo, name, surname) 
            VALUES ('$text', '$rating', '$id_user', '" . $user['photo'] . "', '" . $user['name'] . "','" . $user['surname'] . "')";
                                $link->query($sql);
                                echo '<script>document.location.href="article.php"</script>';
                            } else {
                                echo '<p class="error">Вы уже написали отзыв</p>';
                            }
                        }
                    }
                    ?>

                    <!-- add review -->
                    <form method="POST" class="forma_reviews" name="add_rev" enctype="multipart/form-data">
                        <h3>Оставьте отзыв о статье</h3>
                        <textarea placeholder="Введите отзыв" class="ff_roman fsz_min" name="text" id="about" cols="30" rows="4"></textarea>
                        <?php if (isset($error_text))
                            echo $error_text ?>
                        <select name="rating" class="ff_roman fsz_min" id="rating" value="<?= $rating ?>">
                            <option class="ff_roman fsz_min" value="0">Оставьте рейтинг статьи (от 1 до 5)</option>
                            <?php
                            $sql = "SELECT * FROM rating";
                            $rat = $link->query($sql);
                            foreach ($rat as $rats) { ?>
                                <option value="<?= $rats['id'] ?>">
                                    <?= $rats['rating'] ?>
                                </option>
                            <? }
                            ?>
                        </select>
                        <?php if (isset($error_rating))
                            echo $error_rating ?>
                        <div class="btn_block">
                            <input type="submit" name="add_rev" value="Добавить отзыв" class="btn_full montserrat fsz_min">
                        </div>
                    </form>
                    <!-- add review -->
                <? } ?>
                <section>
                    <?php
                    $sql = "SELECT * FROM `reviews`";
                    $revs = $link->query($sql);
                    ?>
                    <h3>Все отзывы</h3>
                    <div class="reviews">
                        <?php foreach ($revs as $rev) { ?>
                            <div class="review">
                                <div class="head_review">
                                    <img src="<?= $rev['photo'] ?>" alt="#" class="icon_user_rev">
                                    <div class="head_txt_review">
                                        <p class="montserrat fsz_min"><?= $rev['name'] ?> <?= $rev['surname'] ?></p>
                                        <div class="rate">
                                            <img src="img/star.svg" alt="#">
                                            <p class="montserrat fsz_min"><?= $rev['rating'] ?> из 5</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="ff_roman fsz_min"><?= $rev['text'] ?></p>
                            </div>
                        <? } ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- секция статья отзывы-->
    <section>
        <?php
        $id_user = $USER['id'];
        $sql = "SELECT * FROM cart WHERE id_user ='$id_user'";
        $result = $link->query($sql);
        $tovars_count = $result->rowCount();
        ?>
        <div class="container">
            <div class="profile_catalog">
                <h2>Корзина</h2>
                <?php
                if ($tovars_count == 0) {
                    echo '<br><br><p class="error">В вашей корзине ничего нет.</p><br><br><br>';
                } ?>
                <div class="catalog">
                    <?php if (isset($_SESSION['USER']) && $USER['role'] == 1) { ?>
                        <?php
                        $id_user = $USER['id'];
                        $sql = "SELECT * FROM cart WHERE id_user = '$id_user'";
                        $my_carts = $link->query($sql)->fetchAll(2);
                        $id_cart = $my_cart['id'];
                        ?>
                        <? foreach ($my_carts as $my_cart) {
                            $id_tovar = $my_cart['id_tovar'];
                            $sql = "SELECT * FROM tovars WHERE id ='$id_tovar'";
                            $tovar_in_cart = $link->query($sql)->fetch();
                            $category_id = $tovar_in_cart['category'];

                            $full_cost = $full_cost + $tovar_in_cart['price'];
                        ?>
                            <div class="card" onclick="location.href='card.php?id=<?php echo $tovar_in_cart['id'] ?>';">
                                <div class="catalog_img">
                                    <img src="<?= $tovar_in_cart['photo'] ?>" alt="#" class="card_img">
                                    <div class="basket_del"><a href="basket.php?delete_cart=<?= $tovar_in_cart['id'] ?>"><img src="img/cart_delete.svg" alt="#" class="heart"></a></div>
                                </div>
                                <p class="ff_roman fsz_min"><?= $category['category'] ?></p>
                                <p class="montserrat fsz_min"><?= $tovar_in_cart['name'] ?></p>
                                <p class="ff_roman fsz_min"><?= $tovar_in_cart['price'] ?> ₽</p>
                                <div class="btn_block btn_cart"><a href="order.php?id=<?= $tovar_in_cart['id'] ?>" class="btn_full">Заказать</a></div>
                            </div>
                        <? } ?>
                </div>
            </div>
            <div class="full_cost">
                <p>ИТОГО: <span class="ff_roman">
                        <? if (isset($full_cost)) {
                            echo $full_cost;
                        } else {
                            echo '0';
                        } ?> ₽
                    </span></p>
            </div>
        <? } ?>
        </div>
    </section>
    <?php include('incl/footer.php'); ?>
</body>
<!-- old_basket page -->
<body>
    <div class="btn_block">
        <a href="" class="btn_circle"><img src="img/ar_up.png" alt="#" class="ar_up"></a>
    </div>
    <?php include('incl/header.php'); ?>
    <!-- basket -->
    <?php
    $us_id = $USER['id'];
    $sql = "SELECT * FROM cart WHERE id_user = '$us_id'";
    $my_korz = $link->query($sql)->fetchAll(2);

    if (isset($_POST['order'])) {
        $time = time();
        $us_id = $USER['id'];
        $sql_order = "INSERT INTO orders (`id_user`,`token`, `id_status`) VALUES ('$us_id','$time', '0')";
        $link->query($sql_order);

        $sql_in_order = "SELECT id FROM orders WHERE id_user='$us_id' AND token = '$time'";
        $result = $link->query($sql_in_order);
        $id_order = $result->fetch();
        $id_order = $id_order['id'];

        $sql_in_order2 = "SELECT * FROM cart WHERE id_user=$us_id";
        $result = $link->query($sql_in_order2);

        foreach ($result as $id_order2) {
            $id_tovar = $id_order2['id_tovar'];
            $count = $id_order2['count'];
            $sql_in_order_tovar = "INSERT INTO order_tovar (`id_order`, `id_tovar`,`count`) 
                            VALUES ('$id_order', '$id_tovar','$count')";
            $link->query($sql_in_order_tovar);
        }

        $sql = "DELETE FROM cart WHERE id_user='$us_id'";
        $link->query($sql);
        echo '<script>document.location.href="profile.php"</script>';
        $good = '<br><h2 class="ff_roman ">Ваш заказ оформлен</h2>';
    }

    if (isset($_GET['del_ok'])) {
        $id_korz = $_GET['id_korz'];
        $us_id = $USER['id'];
        $sql = "SELECT * FROM cart WHERE id='$id_korz' AND id_user = '$us_id'";
        $res = $link->query($sql);
        $korz = $res->fetch();
        if ($korz['count'] == 1) {
            $id_korz = $_GET['id_korz'];
            $sql = "DELETE FROM cart WHERE id='$id_korz'";
            $link->query($sql);
            echo '<script>document.location.href="basket.php"</script>';
        }
        $count = $korz['count'] - 1;
        $sql = "UPDATE cart SET 
                        `count`='$count' WHERE id='$id_korz' AND id_user='$us_id'";
        $link->query($sql);
        echo '<script>document.location.href="basket.php"</script>';
    }
    if (isset($_GET['plus'])) {
        $id_korz = $_GET['id_korz'];
        $us_id = $USER['id'];
        $sql = "SELECT * FROM cart WHERE id='$id_korz' AND id_user = '$us_id'";
        $res = $link->query($sql);
        $korz = $res->fetch();
        $count = $korz['count'] + 1;
        $sql = "UPDATE cart SET 
                        `count`='$count' WHERE id='$id_korz' AND id_user='$us_id'";
        $link->query($sql);
        echo '<script>document.location.href="basket.php"</script>';
    }

    $sql_count = "SELECT COUNT(*) AS `count` FROM cart WHERE id_user = '$us_id'";
    $res1 = $link->query($sql_count)->fetch()['count'];
    ?>
    <!-- basket -->
    <section>
        <div class="container">
            <div class="profile_catalog">
                <h2>Корзина</h2>
                <div class="catalog">
                    <?php
                    $us_id = $USER['id'];
                    $sql = "SELECT * FROM `tovars`";
                    $result = $link->query($sql);
                    $tovar = $result->fetchAll(2);

                    $sql = "SELECT * FROM cart WHERE id_user = '$us_id'";
                    $my_korz = $link->query($sql)->fetchAll(2);

                    if ($tovar['id'] == $my_korz['id_tovar']) {
                        foreach ($my_korz as $my_korzi) {
                            $id_tovar = $my_korzi['id_tovar'];
                            $sql = "SELECT * FROM tovars WHERE id ='$id_tovar'";
                            $tovar_in_korz = $link->query($sql)->fetch();
                            $id_korz = $my_korzi['id'];
                            $id_tovar_tovar = $tovar_in_korz['id'];
                            $sql = "SELECT * FROM cart WHERE id_user = '$us_id' AND id_tovar='$id_tovar_tovar'";
                            $korz = $link->query($sql)->fetch(); ?>
                            <div class="card" onclick="location.href='card.php?id=<?php echo $tovar_in_korz['id'] ?>';">
                                <div class="catalog_img">
                                    <img src="<?= $tovar_in_korz['photo'] ?>" alt="#" class="card_img">
                                </div>
                                <p class="ff_roman fsz_min"><?= $category['category'] ?></p>
                                <p class="montserrat fsz_min"><?= $tovar_in_korz['name'] ?></p>
                                <p class="ff_roman fsz_min"><?= $tovar_in_korz['price'] ?> ₽</p>
                                <div class="btns_plus-minus">
                                    <a href="basket.php?id_korz=<?= $id_korz ?>&del_ok" class="ff_roman">-</a>
                                    <p class="count_tovar ff_roman"><?= $korz['count'] ?></p>
                                    <a href="basket.php?id_korz=<?= $id_korz ?>&plus" class="ff_roman">+</a>
                                </div>
                            </div>
                    <? }
                    }
                    ?>
                </div>
            </div>
            <?php
            if ($res1 == 0) {
                echo '<br><br><p class="error basket_margin">Корзина пуста...</p>';
            } ?>
            <?php if ($res1 != 0) {
            ?><br><br>
                <form method="POST">
                    <input type="submit" class="btn_border montserrat fsz_min" value="Оформить заказ" name="order">
                </form>
                <br><br><br>
                <?= $good ?>
            <? } ?>
    </section>

    <?php include('incl/footer.php'); ?>
</body>
<!-- old_basket page -->
</html>