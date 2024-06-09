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
    if (isset($_SESSION['USER'])) {
        echo '<script>document.location.href="profile.php"</script>';
    } else { ?>
        <?php
        if (isset($_POST['signin'])) {
            $email = $_POST['email'];
            $pass1 = $_POST['pass1'];
            $cash_pass = md5($pass1);
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $link->query($sql);
            $user_email = $result->fetch();
            if (empty($email)) {
                $error_email = '<p class="error">Введите email</p>';
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error_email = '<p class="error">Неправильный формат почты!</p>';
            } else if (empty($user_email)) {
                $error_email = '<p class="error">Вы не зарегестрированы, <a href="signup.php">зарегистрируйтесь!</a></p>';
            }
            $sql = "SELECT * FROM users WHERE email = '$email' AND password ='$cash_pass'";
            $result = $link->query($sql);
            $user2 = $result->fetch();
            if (empty($pass1)) {
                $error_pass1 = '<p class="error">Введите пароль</p>';
            } else if (empty($user2)) {
                $error_pass1 = '<p class="error">Неверный пароль</p>';
            }
            if (
                empty($error_email) && empty($error_pass1)
            ) {
                $_SESSION['USER'] = $user2['id'];
                echo '<script>document.location.href="profile.php"</script>';
            }
        }
        ?>
        <section>
            <div class="container">
                <form action="" method="POST" class="forma">
                    <h2>Войти</h2>
                    <p class="ff_roman fsz_min">Войдите для получения доступа к соверешению покупок</p>
                    <input type="text" placeholder="Почта" name="email" class=" ff_roman fsz_min">
                    <?= $error_email ?>
                    <input type="password" placeholder="Пароль" name="pass1" class=" ff_roman fsz_min">
                    <?= $error_pass1 ?>
                    <input type="submit" value="Войти" name="signin" class="btn_full ff_roman">
                    <hr>
                    <p class="montserrat fsz_min">Еще нет аккаунта? <a href="reg.php" class="ff_roman fsz_min error">Зарегестрируйтесь</a></p>
                </form>
        </section>
    <? } ?>
    <?php include('incl/footer.php'); ?>
</body>

</html>