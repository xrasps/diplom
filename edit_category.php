<?php
include('incl/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Категории</title>
</head>

<body>
    <?php include('incl/header.php'); ?>
    <!-- категории -->
    <?php
    if (isset($_SESSION['USER']) && $USER['role'] == 2) { ?>
        <div class="container">
            <?php
            $cat_id = $_GET['id'];
            $sql = "SELECT * FROM tovar_category WHERE id = '$cat_id'";
            $result = $link->query($sql);
            $category = $result->fetch();
            ?>
            <?php
            if (isset($_POST['edit_category'])) {
                $category = $_POST['category'];
                if (empty($category)) {
                    $error_categoryTabEdit = 'ошибка';
                }
                if (empty($error_categoryTabEdit)) {
                    $sql = "UPDATE tovar_category SET category = '$category'
                                                WHERE id = '$cat_id'";
                    $link->query($sql);
                    echo '<script>document.location.href="profile.php"</script>';
                }
            }
            ?>
            <form method="POST" class="forma_categ_edit ">
                <input type="text" placeholder="Название категории" name="category" value="<?= $category ?>" class=" ff_roman fsz_min">
                <?= $error_categoryTabEdit ?>
                <input type="submit" value="Изменить" name="edit_category" class="btn_full ff_roman">
            </form>
        </div>
    <? } else {
        echo '<script>document.location.href="sign_in.php"</script>';
    }
    ?>
    <?php include('incl/footer.php'); ?>
</body>

</html>