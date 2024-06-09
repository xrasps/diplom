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
    <!-- basket -->

    <div class="container">
        <?php
        if (isset($_SESSION['USER']) && $USER['role'] == 1) { ?>
            <div class="profile_catalog">
                
                <? if (isset($_GET['del_ok'])) {

                    $id_korz = $_GET['id_korz'];

                    $us_id = $USER['id'];
                    $sql = "SELECT * FROM favour WHERE id='$id_korz' AND id_user = '$us_id'";
                    $res = $link->query($sql);
                    $korz = $res->fetch();

                        $id_korz = $_GET['id_korz'];
                        $sql = "DELETE FROM favour WHERE id='$id_korz'";
                        $link->query($sql);
                        echo '<script>document.location.href = "favourites.php"</script>';
                    
                } ?>
                <h2>Избранное</h2>
                <div class="catalog basket_margin">
                    <?php
                    $us_id = $USER['id'];
                    $sql = "SELECT * FROM `tovars`";
                    $result = $link->query($sql);
                    $tovar = $result->fetchAll(2);

                    $sql = "SELECT * FROM favour WHERE id_user = '$us_id'";
                    $my_korz = $link->query($sql)->fetchAll(2);

                    if ($tovar['id'] == $my_korz['id_tovar']) {
                        foreach ($my_korz as $my_korzi) {
                            $id_tovar = $my_korzi['id_tovar'];
                            $sql = "SELECT * FROM tovars WHERE id ='$id_tovar'";
                            $tovar_in_korz = $link->query($sql)->fetch();
                            $id_korz = $my_korzi['id'];
                            $id_tovar_tovar = $tovar_in_korz['id'];

                            $sql = "SELECT * FROM favour WHERE id_user = '$us_id' AND id_tovar='$id_tovar_tovar'";
                            $korz = $link->query($sql)->fetch(); ?>
                            <div class="card" onclick="location.href='card.php?id=<?php echo $tovar['id'] ?>';">
                                <div class="catalog_img">
                                    <img src="<?= $tovar_in_korz['photo'] ?>" alt="#" class="card_img">
                                    <a href="favourites.php?id_korz=<?= $id_korz ?>&del_ok"><svg width="24" height="24" class="heart_svg_nofull heart" viewBox="0 0 24 24" fill="#414c53" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.7286 18.5172L14.7281 18.5176C14.2047 18.9311 13.7221 19.3064 13.2525 19.5808C12.7827 19.8554 12.3731 20 12 20C11.627 20 11.2175 19.8552 10.7475 19.5806C10.2778 19.306 9.79514 18.931 9.27148 18.5183C8.98456 18.292 8.69091 18.0656 8.39426 17.8369C7.13929 16.8694 5.83068 15.8606 4.75159 14.6456C3.43455 13.1627 2.5 11.4124 2.5 9.13699C2.5 6.89254 3.76857 4.99736 5.52034 4.19675C7.24056 3.41056 9.51761 3.64311 11.6397 5.84866L12 6.2231L12.3603 5.8487C14.4823 3.64365 16.7594 3.41129 18.4796 4.19761C20.2314 4.99835 21.5 6.89354 21.5 9.13799C21.5 11.4129 20.5657 13.1632 19.2488 14.646C18.1679 15.863 16.8565 16.8732 15.5992 17.8416C15.3048 18.0684 15.0134 18.2929 14.7286 18.5172Z" stroke="#414C53" />
                                        </svg></a>
                                </div>
                                <p class="montserrat fsz_min"><?= $tovar_in_korz['name'] ?></p>
                                <p class="ff_roman fsz_min"><?= $tovar_in_korz['price'] ?> ₽</p>
                            </div>
                    <? }
                    } ?>
                </div>
            </div>
        <? } ?>
    </div>
    <?php include('incl/footer.php'); ?>
</body>

</html>