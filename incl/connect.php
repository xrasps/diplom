<?php
    try{
        $link = new PDO ("mysql:host=localhost;dbname=diplom", 'root' ,'');
    }catch(PDOException $e){
        echo $e;
    }
?>