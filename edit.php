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
    <?php include('incl/header.php'); ?>
    <?php
    if (isset($_SESSION['USER']) && $USER['role'] == 2) { ?>
        <?php
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM tovars WHERE id = '$get_id'";
        $result = $link->query($sql);
        $tovar = $result->fetch();
        ?>
        <?php
        if (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $application = $_POST['application'];
            $composition = $_POST['composition'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            if ($_FILES['photo']['size'] == 0) {
                $src = $tovar['photo'];
            } else {
                $x = md5(time());
                $src = 'img/' . $x . $_FILES['photo']['name'];
                unlink($tovar['photo']);
                move_uploaded_file($_FILES['photo']['tmp_name'], $src);
            }
            if (empty($name)) {
                $error_name = '<p class="error">Введите название</p>';
            }
            if (empty($src)) {
                $error_photo = '<p class="error">Загрузите фото</p>';
            }
            if (empty($price)) {
                $error_price = '<p class="error">Введите цену</p>';
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
            if (empty($category)) {
                $error_category = '<p class="error">Выберите категорию</p>';
            }
            if (
                empty($error_name) && empty($error_description) && empty($error_application) && empty($error_composition)  && empty($error_price)
                && empty($error_category)
            ) {
                $sql = "UPDATE tovars SET
                                    name = '$name',
                                    price = '$price',
                                    description = '$description',
                                    application = '$application',
                                    composition = '$composition',
                                    category = '$category',
                                    photo = '$src' WHERE id = '$get_id'";
                $link->query($sql);
                echo '<script>document.location.href="catalog.php"</script>';
            }
        }
        ?>
        <section>
            <div class="container">
                <form action="" method="POST" class="forma" enctype="multipart/form-data">
                    <h2>Редактировать</h2>
                    <div class="input-container">
                        <input class="ff_roman fsz_min input" name="name" value="<?= $tovar['name'] ?>" id="username" required>
                        <label class="ff_roman fsz_min label" for="username">Введите название</label>
                        <?= $error_name ?>
                    </div>
                    <div class="input-container">
                        <input type="text" class="ff_roman fsz_min input" name="price" value="<?= $tovar['price'] ?>" id="price" required>
                        <label class="ff_roman fsz_min label" for="price">Введите цену</label>
                        <?= $error_price ?>
                    </div>
                    <div class="input-container">
                        <input type="text" class="ff_roman fsz_min input" name="description" value="<?= $tovar['description'] ?>" id="description" required>
                        <label class="ff_roman fsz_min label" for="description">Введите описание</label>
                        <?= $error_description ?>
                    </div>
                    <div class="input-container">
                        <input type="text" class="ff_roman fsz_min input" name="application" value="<?= $tovar['application'] ?>" id="application" required>
                        <label class="ff_roman fsz_min label" for="application">Введите применение</label>
                        <?= $error_application ?>
                    </div>
                    <div class="input-container">
                        <input type="text" class="ff_roman fsz_min input" name="composition" value="<?= $tovar['composition'] ?>" id="composition" required>
                        <label class="ff_roman fsz_min label" for="composition">Введите состав</label>
                        <?= $error_composition ?>
                    </div>
                    <div class="input-container">
                        <select name="category" class="ff_roman fsz_min input" value="<?= $category ?>" id="category" required>
                            <option class="ff_roman fsz_min" value="0">Выберите категорию</option>
                            <?php
                            $sql = "SELECT * FROM tovar_category";
                            $res = $link->query($sql);
                            foreach ($res as $category) { ?>
                                <option value="<?= $category['id'] ?>" <?php
                                                                        if ($category['id'] == $tovar['category']) {
                                                                            echo 'selected';
                                                                        }
                                                                        ?>>
                                    <?= $category['category'] ?>
                                </option>
                            <? }
                            ?>
                        </select>
                        <label class="ff_roman fsz_min label" for="category">Выберите категорию</label>
                    </div>
                    <div class="input-container">
                        <input type="file" class="ff_roman fsz_min input" name="photo" id="photo" required>
                        <label class="ff_roman fsz_min label_file" for="photo">Выберите фото</label>
                        <?= $error_photo ?>
                    </div>
                    <input type="submit" value="Изменить" name="edit" class="btn_full ff_roman">
                </form>
        </section>
    <? } ?>
    <?php include('incl/footer.php'); ?>
</body>

</html>