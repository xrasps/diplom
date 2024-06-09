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
    <section>
        <div class="container">
            <div class="main_catalog">
                <h2>Каталог</h2>
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
                <div class="sort">
                    <?php
                    $sql = "SELECT * FROM tovars";
                    $result = $link->query($sql);
                    $tovars_count = $result->rowCount();
                    ?>
                    <a href="catalog.php" class="ff_roman fsz_min txt_for_link">Все товары (<?= $tovars_count ?>)
                    </a>
                    <?php
                    $sql = "SELECT * FROM tovar_category";
                    $result = $link->query($sql);
                    foreach ($result as $category) {
                        $queryCategory = $category['id'];
                        $sql_count = "SELECT count(*) as`count` FROM tovars WHERE category ='$queryCategory'"; ?>
                        <a href="catalog.php?category=<?= $category['id'] ?>" class="txt_for_link ff_roman fsz_min">
                            <?= $category['category'] ?>
                        </a>
                    <? }
                    ?>
                </div>
                <form method="POST" class="looking_for">
                    <input type="text" placeholder="Введите..." class="search ff_roman fsz_min" name="text">
                    <input type="submit" value="Поиск" class="searching btn_full montserrat fsz_min" name="search">
                </form>
                <div class="catalog">
                    <?php
                    if (isset($_POST['search'])) {
                        $text = $_POST['text'];
                        $sql = "SELECT * FROM tovars WHERE name LIKE lower('%" . $text . "%')";
                        $result = $link->query($sql);

                        foreach ($result as $tovar) {
                            $category_id = $tovar['category'];
                            $sql = "SELECT * FROM tovar_category WHERE id ='$category_id'";
                            $result = $link->query($sql);
                            $category = $result->fetch(); ?>
                            <div class="card" onclick="location.href='card.php?id=<?php echo $tovar['id'] ?>';">
                                <div class="catalog_img">
                                    <img src="<?= $tovar['photo'] ?>" alt="#" class="card_img">
                                    <a href="<?= "catalog.php?add_favour&id=" . $_GET['id'] ?>"><svg width="24" height="24" class="heart_svg heart" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.7286 18.5172L14.7281 18.5176C14.2047 18.9311 13.7221 19.3064 13.2525 19.5808C12.7827 19.8554 12.3731 20 12 20C11.627 20 11.2175 19.8552 10.7475 19.5806C10.2778 19.306 9.79514 18.931 9.27148 18.5183C8.98456 18.292 8.69091 18.0656 8.39426 17.8369C7.13929 16.8694 5.83068 15.8606 4.75159 14.6456C3.43455 13.1627 2.5 11.4124 2.5 9.13699C2.5 6.89254 3.76857 4.99736 5.52034 4.19675C7.24056 3.41056 9.51761 3.64311 11.6397 5.84866L12 6.2231L12.3603 5.8487C14.4823 3.64365 16.7594 3.41129 18.4796 4.19761C20.2314 4.99835 21.5 6.89354 21.5 9.13799C21.5 11.4129 20.5657 13.1632 19.2488 14.646C18.1679 15.863 16.8565 16.8732 15.5992 17.8416C15.3048 18.0684 15.0134 18.2929 14.7286 18.5172Z" stroke="#414C53" />
                                        </svg></a>
                                </div>
                                <p class="ff_roman fsz_min"><?= $category['category'] ?></p>
                                <p class="montserrat fsz_min"><?= $tovar['name'] ?></p>
                                <p class="ff_roman fsz_min"><?= $tovar['price'] ?> ₽</p>
                            </div>
                        <? }
                    } else {
                        if (isset($_GET['category'])) {
                            $get_category = $_GET['category'];
                            $dop_sql = "WHERE category = '$get_category'";
                        } else {
                            $dop_sql = '';
                        }
                        $sql = "SELECT * FROM tovars $dop_sql";
                        $result = $link->query($sql);
                        $tovars = $result->fetchAll(2);
                        foreach ($tovars as $tovar) {
                            $category_id = $tovar['category'];
                            $sql = "SELECT * FROM tovar_category WHERE id ='$category_id'";
                            $result = $link->query($sql);
                            $category = $result->fetch();
                        ?>
                            <div class="card" onclick="location.href='card.php?id=<?php echo $tovar['id'] ?>';">
                                <div class="catalog_img">
                                    <img src="<?= $tovar['photo'] ?>" alt="#" class="card_img">
                                    <a href="<?= "catalog.php?add_favour&id=" . $_GET['id'] ?>">
                                        <svg width="24" height="24" class="heart_svg heart" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.7286 18.5172L14.7281 18.5176C14.2047 18.9311 13.7221 19.3064 13.2525 19.5808C12.7827 19.8554 12.3731 20 12 20C11.627 20 11.2175 19.8552 10.7475 19.5806C10.2778 19.306 9.79514 18.931 9.27148 18.5183C8.98456 18.292 8.69091 18.0656 8.39426 17.8369C7.13929 16.8694 5.83068 15.8606 4.75159 14.6456C3.43455 13.1627 2.5 11.4124 2.5 9.13699C2.5 6.89254 3.76857 4.99736 5.52034 4.19675C7.24056 3.41056 9.51761 3.64311 11.6397 5.84866L12 6.2231L12.3603 5.8487C14.4823 3.64365 16.7594 3.41129 18.4796 4.19761C20.2314 4.99835 21.5 6.89354 21.5 9.13799C21.5 11.4129 20.5657 13.1632 19.2488 14.646C18.1679 15.863 16.8565 16.8732 15.5992 17.8416C15.3048 18.0684 15.0134 18.2929 14.7286 18.5172Z" stroke="#414C53" />
                                        </svg>
                                    </a>
                                </div>
                                <p class="ff_roman fsz_min"><?= $category['category'] ?></p>
                                <p class="montserrat fsz_min"><?= $tovar['name'] ?></p>
                                <p class="ff_roman fsz_min"><?= $tovar['price'] ?> ₽</p>
                            </div>
                    <? }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php include('incl/footer.php'); ?>
</body>

</html>