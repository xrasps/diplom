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
    <!-- корзина -->

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
        $good = '<br><h3 class="green">Ваш заказ оформлен</h3>';
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
                <?php
                if ($res1 == 0) {
                    echo '<p class="error basket_margin">Корзина пуста...</p>';
                }
                if ($res1 != 0) {
                ?><br><br><br>
                    <form method="POST">
                        <input type="submit" class="btn_border montserrat fsz_min" value="Оформить заказ" name="order">
                    </form>
                    <br><br><br>
                    <?= $good ?>
                <? } ?>
            </div>
        </div>
        </section>
        <!-- корзина --> 

        <?php include('incl/footer.php'); ?>
</body>

</html>