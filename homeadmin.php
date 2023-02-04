<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $gs->callsession();
    define('BASE_URL', 'http://localhost/gamestore');
?>
<html>
<head>
    <title>homeadmin</title>
</head>
<body>
    <?php include "../adder/header-admin.php" ?>
    <div class="clm-12 np" style="padding-top:50px;">
        <?php include "../adder/sidebar-admin.php" ?>
        <div class="clm-10 np">
            <div class="container-full" style="height:2000px;">
                <?php
                    include 'contentadmin.php';
                ?>
            </div>
        </div>
    </div>
</body>

</html>