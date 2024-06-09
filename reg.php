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
    include('incl/head.php');
    if (isset($_SESSION['USER'])) {
        echo '<script>document.location.href="profile.php"</script>';
    } else { ?>
        <?php
        if (isset($_POST['reg'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            $cash_pass = md5($pass1);

            if (empty($name)) {
                $error_name .= '<p class="error">Введите имя</p>';
            }
            if (empty($surname)) {
                $error_surname .= '<p class="error">Введите фамилию</p>';
            }
            $sql = "SELECT count(*) FROM users WHERE email = '$email'";
            $count = $link->query($sql)->fetchColumn();
            if (empty($email)) {
                $error_email = '<p class="error">Введите email!</p>';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = '<p class="error">Неправильный формат почты!</p>';
            } else if ($count == 1) {
                $error_email = '<p class="error">Вы уже зарегестрированы, <a href="signin.php">Войдите!</a></p>';
            }
            if (empty($pass1)) {
                $error_pass1 = '<p class="error">Введите пароль</p>';
            }
            if (empty($pass2)) {
                $error_pass2 .= '<p class="error">Повторите пароль</p>';
            } else if (isset($pass1) && isset($pass2)) {
                if ($pass1 != $pass2) {
                    $error_pass = '<p class="error">Пароли не совпадают</p>';
                }
            }
            if (
                empty($error_name) && empty($error_email) && empty($error_surname) && empty($error_pass1)
                && empty($error_pass2) && empty($error_pass)
            ) {
                $sql = "INSERT INTO users (name, email, surname, password, role, photo)
                                VALUES ('$name','$email','$surname', '$cash_pass', '1', 'img/avatar.svg')";
                $result = $link->query($sql);
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = $link->query($sql)->fetch();
                $_SESSION['USER'] = $result['id'];
                echo '<script>document.location.href="profile.php"</script>';
            }
        }
        ?>
        <section>
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data" class="forma">
                    <h2>Регистрация</h2>
                    <?= $error ?>
                    <p class="ff_roman fsz_min">Создайте аккаунт, порадуйте кожу, потому что Вы этого заслуживаете!</p>
                    <input type="text" placeholder="Имя" name="name" value="<?= $name ?>" class=" ff_roman fsz_min" id="username" required>
                    <?= $error_name ?>
                    <input type="text" placeholder="Фамилия" name="surname" value="<?= $surname ?>" class=" ff_roman fsz_min">
                    <?= $error_surname ?>
                    <input type="text" placeholder="Почта" name="email" value="<?= $email ?>" class=" ff_roman fsz_min">
                    <?= $error_email ?>
                    <input type="password" placeholder="Пароль" name="pass1" value="" class=" ff_roman fsz_min">
                    <?= $error_pass1 ?>
                    <?= $error_pass ?>
                    <input type="password" placeholder="Повторите пароль" name="pass2" value="" class=" ff_roman fsz_min">
                    <?= $error_pass2 ?>
                    <input type="submit" value="Создать аккаунт" name="reg" class="btn_full montserrat fsz_min">
                    <hr>
                    <p class="montserrat fsz_min">Уже есть аккаунт? <a href="signin.php" class="ff_roman fsz_min error">Войдите</a></p>
                </form>
        </section>
    <? } ?>
    <?php include('incl/footer.php'); ?>
</body>

</html>