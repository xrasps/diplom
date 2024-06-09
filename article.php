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
    <?php include('incl/footer.php'); ?>
</body>

</html>