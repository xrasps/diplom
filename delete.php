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
        <div class="container">
            <form method="POST" class="forma">
                <h2>ХОТИТЕ УДАЛИТЬ?</h2>
                <?php
                if (isset($_GET['id'])) {
                    $get_id = $_GET['id'];
                    $sql = "SELECT * FROM tovars WHERE id = '$get_id'";
                    $result = $link->query($sql);
                    $tovar = $result->fetch();
                }
                ?>
                <div class="delete">
                    <a href="delete.php?id=<?= $get_id ?>&del_ok" class="btn_full fsz_min montserrat">Да</a>
                    <a href="card.php?id=<?= $get_id ?>" class="btn_border fsz_min montserrat">Отменить</a>
                </div>
                <?php
                if (isset($_GET['del_ok'])) {
                    $sql = "DELETE FROM tovars WHERE id = '$get_id'";
                    $link->query($sql);
                    echo '<script>document.location.href="catalog.php"</script>';
                }
                ?>
            </form>
        </div>
    <? } else {
        echo '<script>document.location.href="index.php"</script>';
    }
    ?>
    <?php include('incl/footer.php'); ?>
</body>

</html>