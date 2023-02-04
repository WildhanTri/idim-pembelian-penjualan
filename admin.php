<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    define('BASE_URL', 'http://localhost/gamestore');
?>
<html>
<head>
    <title>homeadmin</title>
</head>
<body>
   
    <div class="clm-12 np" >
        <?php include "view/adder/sidebar-admin.php" ?>
        <div class="clm-10 np">
            <div class="container-full" >
                <?php
                    include 'contentadmin.php';
                ?>
            </div>
        </div>
    </div>
</body>

</html>