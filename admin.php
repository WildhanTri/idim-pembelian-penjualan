<?php
require_once "controller/base_controller.php";
$baseController = new BaseController();
$baseController->callasset();
define('BASE_URL', 'http://localhost/tp4idim');
?>
<html>

<head>
    <title>Aplikasi Demo</title>
</head>

<body>

    <div class="clm-12 np">
        <?php include "view/adder/sidebar-admin.php" ?>
        <div class="clm-10 np">
            <div class="container-full">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    $subpage = $_GET['subpage'];
                    $file = "view/$page/$subpage.php";

                    if (!file_exists($file)) {
                        include("view/$page/$subpage.php");
                    } else {
                        include($file);
                    }
                } else {
                    include("view/home/dashboard.php");
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>