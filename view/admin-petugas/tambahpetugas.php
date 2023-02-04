<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $kategoriproduk = $gs->cmbBoxKategori();
    $kodeproduk = $gs->randomGen(5);
?>
<html>
<head>
</head>
<body>

                <h1>Tambah Petugas</h1>
                <form action="submit.php" enctype="multipart/form-data" method="post">
                    <?php date("Y-m-d h:i:sa") ?>
                    <table class="table">
                        <tr>
                            <td>No Identitas</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="noidentitas" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td>Nama Petugas</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="namapetugas" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="username" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="password" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="email"/></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="notelepon" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;">Alamat</td>
                            <td style="vertical-align:top;">:</td>
                            <td>
                                <textarea class="input" name="alamat" autocomplete="off"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:right">
                                <input type="submit" name="tambahpetugas" class="btn btn-green" style="width:100px;" value="Tambah">
                                <input type="button" class="btn btn-red" style="width:100px;" value="cancel" onclick="history.back()">
                            </td>
                        </tr>
                    </table>
                </form>
 
    <!--
    <div class="fly-right">
        <a href="#">
            <div class="tooltip" style="border-radius: 50%;">
                <span class="tooltiptext">Tambah Barang</span>
                <img src="../../assets/img/add_blue.png" style="width:80px; height:80px;" class="tooltip">
            </div>
        </a>
    </div>
-->
</body>

</html>