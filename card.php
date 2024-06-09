<?php
include('incl/connect.php');
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
    <?php include('incl/header.php'); ?>
    <?php
    if (isset($_GET['id'])) {
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM tovars WHERE id = '$get_id'";
        $result = $link->query($sql);
        $tovar = $result->fetch();
    }
    ?>
    <section>
        <div class="container">
            <div class="main_catalog">
                <div class="product">
                    <img src="<?= $tovar['photo'] ?>" alt="#" class="product_img">
                    <?php
                    $category_id = $tovar['category'];
                    $sql = "SELECT * FROM tovar_category WHERE id = '$category_id'";
                    $result = $link->query($sql);
                    $category = $result->fetch();
                    ?>
                    <div class="product_txt">
                        <h2><?= $tovar['name'] ?></h2>
                        <div class="accordions">
                            <div class="accordion">
                                <div class="accor_header">
                                    <p class="montserrat">ОПИСАНИЕ</p>
                                    <div class="more"></div>
                                </div>
                                <div class="accor_body">
                                    <p class="ff_roman fsz_min"><?= $tovar['description'] ?></p>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accor_header">
                                    <p class="montserrat">ПРИМЕНЕНИЕ</p>
                                    <div class="more"></div>
                                </div>
                                <div class="accor_body">
                                    <p class="ff_roman fsz_min"><?= $tovar['application'] ?></p>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accor_header">
                                    <p class="montserrat">СОСТАВ</p>
                                    <div class="more"></div>
                                </div>
                                <div class="accor_body">
                                    <p class="ff_roman fsz_min"><?= $tovar['composition'] ?></p>
                                </div>
                            </div>
                        </div>
                        <p class="ff_roman fsz_min">Категория: <?= $category['category'] ?></p>
                        <p class="ff_roman fsz_min">Цена: <?= $tovar['price'] ?> ₽</p>
                        <?php
                        if (isset($_SESSION['USER']) && $USER['role'] == 1) { ?>
                            <div class="product_btn">
                                <a href="<?= "card.php?add_cart&id=" . $_GET['id'] ?>" class="btn_full montserrat fsz_min">В корзину</a>
                                <a href="<?= "card.php?add_favour&id=" . $_GET['id'] ?>">
                                    <svg width="24" height="24" class="heart_svg product_svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.7286 18.5172L14.7281 18.5176C14.2047 18.9311 13.7221 19.3064 13.2525 19.5808C12.7827 19.8554 12.3731 20 12 20C11.627 20 11.2175 19.8552 10.7475 19.5806C10.2778 19.306 9.79514 18.931 9.27148 18.5183C8.98456 18.292 8.69091 18.0656 8.39426 17.8369C7.13929 16.8694 5.83068 15.8606 4.75159 14.6456C3.43455 13.1627 2.5 11.4124 2.5 9.13699C2.5 6.89254 3.76857 4.99736 5.52034 4.19675C7.24056 3.41056 9.51761 3.64311 11.6397 5.84866L12 6.2231L12.3603 5.8487C14.4823 3.64365 16.7594 3.41129 18.4796 4.19761C20.2314 4.99835 21.5 6.89354 21.5 9.13799C21.5 11.4129 20.5657 13.1632 19.2488 14.646C18.1679 15.863 16.8565 16.8732 15.5992 17.8416C15.3048 18.0684 15.0134 18.2929 14.7286 18.5172Z" stroke="#414C53" />
                                    </svg>
                                </a>
                                <!-- <a href=""><img src="img/heart.svg" alt="#" class="product_svg"></a> -->
                            </div>
                            <?php
                            if (isset($_GET['add_cart'])) {
                                $id_tovar = $tovar['id'];
                                $id_user = $USER['id'];
                                $sql = "INSERT INTO cart (id_tovar, id_user)
                                        VALUES ('$id_tovar', '$id_user')";
                                $link->query($sql);
                                $id = $_GET['id'];
                                echo "<script>document.location.href=\"card.php?id=$id\"</script>";
                            }
                            ?>
                            <?php
                            if (isset($_GET['add_favour'])) {
                                $id_tovar = $tovar['id'];
                                $id_user = $USER['id'];
                                $sql = "INSERT INTO favour (id_tovar, id_user)
                                        VALUES ('$id_tovar', '$id_user')";
                                $link->query($sql);
                                $id = $_GET['id'];
                                echo "<script>document.location.href=\"card.php?id=$id\"</script>";
                            }
                            ?>
                        <? } elseif (isset($_SESSION['USER']) && $USER['role'] == 2) { ?>
                        <?
                        } else { ?>
                            <div class="product_btn">
                                <a href="signin.php" class="btn_full montserrat fsz_min">В корзину</a>
                                <a href="signin.php">
                                    <svg width="24" height="24" class="heart_svg product_svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.7286 18.5172L14.7281 18.5176C14.2047 18.9311 13.7221 19.3064 13.2525 19.5808C12.7827 19.8554 12.3731 20 12 20C11.627 20 11.2175 19.8552 10.7475 19.5806C10.2778 19.306 9.79514 18.931 9.27148 18.5183C8.98456 18.292 8.69091 18.0656 8.39426 17.8369C7.13929 16.8694 5.83068 15.8606 4.75159 14.6456C3.43455 13.1627 2.5 11.4124 2.5 9.13699C2.5 6.89254 3.76857 4.99736 5.52034 4.19675C7.24056 3.41056 9.51761 3.64311 11.6397 5.84866L12 6.2231L12.3603 5.8487C14.4823 3.64365 16.7594 3.41129 18.4796 4.19761C20.2314 4.99835 21.5 6.89354 21.5 9.13799C21.5 11.4129 20.5657 13.1632 19.2488 14.646C18.1679 15.863 16.8565 16.8732 15.5992 17.8416C15.3048 18.0684 15.0134 18.2929 14.7286 18.5172Z" stroke="#414C53" />
                                    </svg>
                                </a>
                            </div>
                        <? }
                        ?>
                        <?php if (isset($_SESSION['USER']) && $USER['role'] == 2) { ?>
                            <div class="product_btn">
                                <a href="edit.php?id=<?= $get_id ?>"><img src="img/edit.svg" alt="#" class="product_svg"></a>
                                <a href="delete.php?id=<?= $get_id ?>"><img src="img/delete.svg" alt="#" class="product_svg"></a>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('incl/footer.php'); ?>
</body>

</html>