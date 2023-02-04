<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
?>
<html>
    <head>
        <title>Home</title>
    </head>
    <style>
    </style>
    <?php
        include "view/adder/header.php";
    ?>
    <body>
        <?php include "content.php" ?>
        <?php include "view/adder/footer.php"; ?>
    </body>
    
</html>