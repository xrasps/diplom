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
    <?php
    if (isset($_SESSION['USER'])) { ?>
        <?php
        if ($USER['role'] == 1) { ?>
            <section>
                <div class="container">
                    <div class="profile_catalog">
                        <h2>Личный кабинет</h2>
                        <div class="profil_user_block">
                            <div class="profil_user">
                                <div class="profile_photo">
                                    <img src="<?= $USER['photo'] ?>" alt="#" class="icon_user">
                                    <div class="panel_txt">
                                        <p class="montserrat"><?= $USER['name'] ?> <?= $USER['surname'] ?></p>
                                        <p class="ff_roman fsz_min"><?= $USER['email'] ?></p>
                                        <div class="btn_block"><a href="?do=exit" class="btn_full montserrat fsz_min">Выйти</a></div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_POST['add_photo'])) {
                                    if ($_FILES['photo']['size'] == 0) {
                                        $photo = "img/avatar.svg";
                                    } else {
                                        $x = md5(time());
                                        $photo = 'img/' . $x . $_FILES['photo']['name'];
                                        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
                                    }

                                    $insert_news_sql = "UPDATE users SET
                        photo ='$photo' WHERE id = '$user_id' ";
                                    $link->query($insert_news_sql);
                                    echo '<script>document.location.href="profile.php"</script>';
                                }
                                ?>
                                <br><br>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="input-container">
                                        <input id="files" type="file" accept="image/*" name="photo" class="input ff_roman fsz_min" required>
                                        <label class="ff_roman fsz_min label_file" for="files">Измените фото профиля</label>
                                        <?= $error_photo ?>
                                    </div>
                                    <input type="submit" class="montserrat fsz_min btn_full" value="Изменить" name="add_photo">
                                </form>
                            </div>
                            <div class="profil_user">
                                <?php
                                if (isset($_POST['unsubscribe'])) {
                                    $email = $_POST['email'];
                                    $sql = "DELETE FROM email WHERE email='$email'";
                                    $link->query($sql);
                                    echo '<br><br><p class="error">Вы успешно отписались от рассылки!</p>';
                                }
                                ?>
                                <form method="POST" class="forma_sub_profile">
                                    <h3>Отписка от рассылки</h3>
                                    <input type="text" placeholder="Введите почту" name="email" class="montserrat fsz_min">
                                    <input type="submit" class="montserrat fsz_min btn_full" value="Отписаться" name="unsubscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                    <h2 class="profile_title">Мои заказы</h2>
                    <?php
                    $userr_id = $USER['id'];
                    $sql_in_order = "SELECT * FROM orders WHERE id_user = '$userr_id'";
                    $result = $link->query($sql_in_order);
                    $order = $result->fetchAll(2);
                    ?>
                    <? foreach ($order as $orders) { ?>
                        <div class="decoration_tov">
                            <?php
                            $id_status = $orders['id_status'];
                            $sql = "SELECT * FROM `status` WHERE id='$id_status'";
                            $result = $link->query($sql);
                            $status = $result->fetch();
                            ?>
                            <div class="info_my_orders">
                                <p class="ff_roman fsz_min">Заказ № <?= $orders['id'] ?></p>
                                <p class="ff_roman fsz_min">Статус: <?= $status['name'] ?></p>
                            </div>
                            <div class="catalog">
                                <?php
                                $id_orders = $orders['id'];
                                $sql = "SELECT * FROM order_tovar WHERE id_order=$id_orders";
                                $result = $link->query($sql);
                                $order_tovar = $result->fetchAll(2);
                                ?>
                                <? foreach ($order_tovar as $tovars) {
                                    $count = $tovars['count'];

                                    $id_tovar_order = $tovars['id_tovar'];

                                    $sql = "SELECT * FROM tovars WHERE id= '$id_tovar_order'";
                                    $result = $link->query($sql);
                                    $tovar = $result->fetchAll(2);

                                    foreach ($tovar as $tovars) {
                                        $id_tovars = $tovars['id']; ?>
                                        <div class="card" onclick="location.href='card.php?id=<?php echo $tovars['id'] ?>';">
                                            <div class="catalog_img">
                                                <img src="<?= $tovars['photo'] ?>" alt="#" class="card_img">
                                            </div>
                                            <p class="montserrat fsz_min"><?= $tovars['name'] ?></p>
                                            <p class="ff_roman fsz_min">Кол-во: <?= $count ?> шт.</p>
                                            <p class="ff_roman fsz_min"><?= $tovars['price'] ?> ₽</p>
                                        </div>
                                <? }
                                } ?>
                            </div>
                        </div>
                    <? } ?>
                </div>
                </div>
            </section>
        <? } elseif ($USER['role'] == 2) { ?>
            <section>
                <div class="container">
                    <div class="main_catalog">
                        <div class="profil_admin">
                            <img src="<?= $USER['photo'] ?>" alt="#" class="icon_user">
                            <div class="panel_txt">
                                <p class="montserrat"><?= $USER['name'] ?> <?= $USER['surname'] ?></p>
                                <div class="btn_block"><a href="?do=exit" class="btn_full montserrat fsz_min">Выйти</a></div>
                            </div>
                        </div>
                        <h2>Панель администратора</h2>
                        <div class="panel">
                            <div class="tabs">
                                <div class="tabs__nav">
                                    <button class="tabs__button ff_roman" data-tab="tab_1">Добавить товар</button>
                                    <button class="tabs__button ff_roman" data-tab="tab_2">Заказы пользователей</button>
                                    <button class="tabs__button ff_roman" data-tab="tab_3">Категории</button>
                                </div>
                                <div class="tabs__content">
                                    <div class="tabs__item" id="tab_1">
                                        <?php
                                        if (isset($_POST['add'])) {
                                            $name = $_POST['name'];
                                            $price = $_POST['price'];
                                            $description = $_POST['description'];
                                            $application = $_POST['application'];
                                            $composition = $_POST['composition'];
                                            $category = $_POST['category'];

                                            if ($_FILES['photo']['size'] == 0) {
                                                $src = "img/card.png";
                                                $error_photo = '<p class="error">Загрузите фото</p>';
                                            } else {
                                                $x = md5(time());
                                                $src = 'img/' . $x . $_FILES['photo']['name'];
                                                move_uploaded_file($_FILES['photo']['tmp_name'], $src);
                                            }

                                            if (empty($name)) {
                                                $error_name = '<p class="error">Введите название!</p>';
                                            }
                                            if (empty($opisanie)) {
                                                $error_opisanie = '<p class="error">Введите описание!</p>';
                                            }
                                            if (empty($price)) {
                                                $error_price = '<p class="error">Введите цену!</p>';
                                            }
                                            if (empty($category)) {
                                                $error_category = '<p class="error">Выберите категорию!</p>';
                                            }
                                            if (empty($description)) {
                                                $error_description = '<p class="error">Введите описание</p>';
                                            }
                                            if (empty($application)) {
                                                $error_application = '<p class="error">Введите применение</p>';
                                            }
                                            if (empty($composition)) {
                                                $error_composition = '<p class="error">Введите состав</p>';
                                            }

                                            if (
                                                empty($error_name) && empty($error_description) && empty($error_application) && empty($error_composition) && empty($error_price)  && empty($error_photo)
                                                && empty($error_category)
                                            ) {
                                                $sql = "INSERT INTO tovars (name, price, description, application, composition, category, photo)
                                VALUES ('$name', '$price','$description', '$application', '$composition','$category', '$src')";
                                                $link->query($sql);
                                                echo '<script>document.location.href="catalog.php"</script>';
                                            }
                                        }
                                        ?>
                                        <section>
                                            <div class="container">
                                                <form action="" class="forma" method="POST" enctype="multipart/form-data">
                                                    <input type="text" placeholder="Название" name="name" class=" ff_roman fsz_min" value="<?= $name ?>">
                                                    <?= $error_name ?>
                                                    <input type="text" placeholder="Цена" name="price" class=" ff_roman fsz_min" value="<?= $price ?>">
                                                    <?= $error_price ?>
                                                    <textarea placeholder="Введите описание" name="description" class=" ff_roman fsz_min"><?= $description ?></textarea>
                                                    <?= $error_description ?>
                                                    <textarea placeholder="Введите применение" name="application" class=" ff_roman fsz_min"><?= $application ?></textarea>
                                                    <?= $error_application ?>
                                                    <textarea placeholder="Введите состав" name="composition" class=" ff_roman fsz_min"><?= $composition ?></textarea>
                                                    <?= $error_composition ?>
                                                    <select name="category" class="ff_roman fsz_min" value="<?= $category ?>">
                                                        <option value="0">Выберите категорию</option>
                                                        <?php
                                                        $sql = "SELECT * FROM tovar_category";
                                                        $res = $link->query($sql);
                                                        foreach ($res as $cat) { ?>
                                                            <option value="<?= $cat['id'] ?>">
                                                                <?= $cat['category'] ?>
                                                            </option>
                                                        <? }
                                                        ?>
                                                    </select>
                                                    <?= $error_category ?>
                                                    <input type="file" name="photo" placeholder="Фото" class="ff_roman fsz_min" value="<?= $photo ?>">
                                                    <?= $error_img ?>
                                                    <input type="submit" value="Добавить" name="add" class="btn_full montserrat fsz_min">
                                                </form>
                                        </section>
                                    </div>
                                    <div class="tabs__item" id="tab_2">
                                        <?php
                                        if (isset($_GET['s1'])) {
                                            $get_s1 = $_GET['s1'];
                                            $sql = "UPDATE orders SET id_status = '1' WHERE id = '$get_s1'";
                                            $link->query($sql);
                                            echo '<script>document.location.href="profile.php"</script>';
                                        }
                                        if (isset($_GET['s2'])) {
                                            $get_s2 = $_GET['s2'];
                                            $sql = "UPDATE orders SET id_status = '2' WHERE id = '$get_s2'";
                                            $link->query($sql);
                                            echo '<script>document.location.href="profile.php"</script>';
                                        }
                                        if (isset($_GET['s3'])) {
                                            $get_s3 = $_GET['s3'];
                                            $sql = "UPDATE orders SET id_status = '3' WHERE id = '$get_s3'";
                                            $link->query($sql);
                                            echo '<script>document.location.href="profile.php"</script>';
                                        }
                                        ?>
                                        <div class="decoration_tov">
                                            <?php
                                            $sql = "SELECT * FROM orders";
                                            $result = $link->query($sql);

                                            foreach ($result as $zakaz) {
                                                $id_user = $zakaz['id_user'];
                                                $sql = "SELECT*FROM users WHERE id='$id_user' ";
                                                $result = $link->query($sql);
                                                $user = $result->fetch();
                                            ?>
                                                <?php
                                                $id_status = $zakaz['id_status'];
                                                $sql = "SELECT * FROM `status` WHERE id='$id_status'";
                                                $result = $link->query($sql);
                                                $status = $result->fetch();
                                                ?>
                                                <div class="decoration_catalog">
                                                    <div class="info_my_orders">
                                                        <p class="ff_roman fsz_min">Заказчик: <?= $user['email'] ?></p>
                                                        <p class="ff_roman fsz_min">Заказ № <?= $zakaz['id'] ?></p>
                                                        <?php
                                                        if ($zakaz['id_status'] == 0) { ?>
                                                            <div class="card_btn">
                                                                <div class="btn_block"><a href="?s1=<?= $zakaz['id'] ?>" class="btn_full_white montserrat fsz_min">В доставку</a></div>
                                                                <div class="btn_block"><a href="?s3=<?= $zakaz['id'] ?>" class="btn_border_white montserrat fsz_min">Отклонить</a></div>
                                                            </div>
                                                        <? } else if ($zakaz['id_status'] == 1) { ?>
                                                            <div class="card_btn">
                                                                <div class="btn_block"><a href="?s2=<?= $zakaz['id'] ?>" class="btn_full_white montserrat fsz_min">Выдать</a></div>
                                                            </div>
                                                        <? }
                                                        ?>
                                                    </div>
                                                    <div class="catalog">
                                                        <?php
                                                        $id_orders = $zakaz['id'];
                                                        $sql = "SELECT * FROM order_tovar WHERE id_order=$id_orders";
                                                        $result = $link->query($sql);
                                                        $order_tovar = $result->fetchAll(2);
                                                        ?>
                                                        <?php
                                                        foreach ($order_tovar as $tovars) {
                                                            $count = $tovars['count'];
                                                            $id_tovar_order = $tovars['id_tovar'];
                                                            $sql = "SELECT * FROM tovars WHERE id= '$id_tovar_order'";
                                                            $result = $link->query($sql);
                                                            $tovar = $result->fetchAll(2);

                                                            foreach ($tovar as $tovars) {
                                                                $id_tovars = $tovars['id']; ?>
                                                                <div class="card" onclick="location.href='card.php?id=<?php echo $tovars['id'] ?>';">
                                                                    <div class="catalog_img">
                                                                        <img src="<?= $tovars['photo'] ?>" alt="#" class="card_img">
                                                                    </div>
                                                                    <p class="montserrat fsz_min"><?= $tovars['name'] ?></p>
                                                                    <p class="ff_roman fsz_min">Кол-во: <?= $count ?> шт.</p>
                                                                    <p class="ff_roman fsz_min"><?= $tovars['price'] ?> ₽</p>
                                                                </div>

                                                        <? }
                                                        }
                                                        ?>
                                                    </div>


                                                </div>
                                            <? }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="tabs__item" id="tab_3">
                                        <?php
                                        $cat_id = $_GET['id'];
                                        $sql = "SELECT * FROM tovar_category";
                                        $category_tab = $link->query($sql)->fetchAll();
                                        ?>
                                        <?php
                                        if (isset($_POST['add_category'])) {
                                            $category = $_POST['category'];

                                            if (empty($category)) {
                                                $error_categoryTab = 'ошибка';
                                            }

                                            if (empty($error_categoryTab)) {
                                                $sql = "INSERT INTO tovar_category (category)
                        VALUES ('$category')";
                                                $link->query($sql);
                                                echo '<script>document.location.href="profile.php"</script>';
                                            }
                                        }
                                        ?>
                                        <form action="" method="POST" class="forma_categ">
                                            <input type="text" placeholder="Название категории" name="category" value="<?= $category ?>" class=" ff_roman fsz_min">
                                            <?= $error_categoryTab ?>
                                            <input type="submit" value="Добавить" name="add_category" class="btn_full montserrat fsz_min">
                                        </form>
                                        <div class="main_category">
                                            <div class="panel_category">
                                                <p class="montserrat ">Название</p>
                                                <p class="montserrat ">Управление</p>
                                            </div>
                                            <? foreach ($category_tab as $cat_tab) { ?>
                                                <div class="admin_category">
                                                    <p class="ff_roman "><?= $cat_tab['category'] ?></p>
                                                    <div class="manage">
                                                        <a href="edit_category.php?id=<?= $cat_tab['id'] ?>"><img src="img/edit.svg" alt="#" class="product_svg"></a>
                                                        <a href="profile.php?id=<?= $cat_tab['id'] ?>&delete_category"><img src="img/delete.svg" alt="#" class="product_svg"></a>
                                                        <?php
                                                        if (isset($_GET['delete_category'])) {
                                                            $sql = "DELETE FROM tovar_category WHERE id = '$cat_id'";
                                                            $link->query($sql);
                                                            echo '<script>document.location.href="profile.php"</script>';
                                                        } ?>
                                                    </div>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?
        }
    } else {
        echo '<script>document.location.href="signin.php"</script>';
    }  ?>
    <?php include('incl/footer.php'); ?>
</body>

</html>