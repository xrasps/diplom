<?php
    session_start();
    include('incl/connect.php');
    
    if(isset($_SESSION['USER'])){
        $user_id= $_SESSION['USER'];
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
        $result = $link -> query($sql);
        $USER = $result -> fetch();
    }

    if(isset($_GET['do'])){
        if($_GET['do']=='exit'){
            unset($_SESSION['USER']);
            echo '<script>document.location.href="index.php"</script>';
        }
    }
?>