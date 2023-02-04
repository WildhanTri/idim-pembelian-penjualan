<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $jumlahbarang = count($gs->jumlahbarang());
?>
<html>
<head>
</head>
<style>
    
    .tab-section{
        width:100%; 
        height:200px;
        padding:15px;
        box-sizing: border-box;
    }
    
    .tab-title{
        font-size:25px;
        border-bottom: 1px solid white;
    }
    .tab-subtitle{
        font-size:55px;
        text-align: center;
        padding-top: 30px;
    }
</style>
    <div class="container-full">
        <div class="clm-4">
            <div class="tab-section" style="background-color:#23a4db; color:white;">
                <p class="tab-title">Jumlah Barang</p>
                <p class="tab-subtitle"><?php echo $jumlahbarang ?></p>
            </div>
        </div>
        <div class="clm-4">
            <div class="tab-section" style="background-color:#b6db23; color:white;">
                <p class="tab-title">Transaksi Aktif</p>
            </div>
        </div>
        <div class="clm-4">
            <div class="tab-section" style="background-color:#2cdb23; color:white;">
                <p class="tab-title">Pemasukan Terakhir</p>
            </div>
        </div>
    </div>
<script>

</script>
</html>