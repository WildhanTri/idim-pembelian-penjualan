<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $daftartransaksi = $gs->daftartransaksi();
?>
<html>
<head>
</head>
<style>

</style>
    <div class="clm-12 np">
        <div class="container-full" id="daftarproduk">
            <div class="clm-12">
                <h1>Daftar Transaksi</h1>
            </div>
            <table class="table table-lite" style="margin-top:10px">
                <?php if($daftartransaksi != null) : ?>
                <thead>
                    <td>Id Transaksi</td>
                    <td>Nama Customer</td>
                    <td>Waktu</td>
                    <td>Status</td>
                    <td></td>
                </thead>
                <?php foreach($daftartransaksi as $data) : ?>
                <tr>
                    <td><?php echo $data['id_transaksi'] ?></td>
                    <td><?php echo $data['nama_customer'] ?></td>
                    <td><?php echo $data['waktu_transaksi'] ?></td>
                    <td><?php echo $data['status'] ?></td>
                    <td>
                        <div class="clm-12" style="padding-right:0">
                            <button class="btn btn-blue" onclick="showdetail('<?php echo $data['id_transaksi'] ?>')">Detail</button>
                        </div>
                    </td>
                </tr>
                
                <?php endforeach ?>
                <?php else : ?>
                <tr>
                    <td colspan="7" style="text-align:center">Tidak Ada Data.</td>
                </tr>
                <?php endif ?>
            </table>
        </div>
    </div>
    <?php foreach($daftartransaksi as $data) : ?>
    <div class="clm-12" style="position:fixed; background:rgba(0,0,0,0.8); left:0; top:0; height:100%; padding-top:70px; display:none" id="detailtransaksi<?php echo $data['id_transaksi'] ?>">
        <div class="clm-1">
        </div>
        <div class="clm-10 np" style="background:white">
            <div class="clm-12" style="background:#53d0e3; color:white">
                <div class="clm-11 np">
                    <h4>Detail Transaksi</h4>
                </div>
                <div class="clm-1 np">
                    <button class="btn np" style="background:none; border:0px; color:white" onclick="hidedetail(<?php echo $data['id_transaksi'] ?>)"><h2>x</h2></button>
                </div>
            </div>
            <div class="clm-12">
                <div class="clm-8" style="">
                    <table class="table">
                        <tr>
                            <td>Id Transaksi</td>
                            <td>:</td>
                            <td><?php echo $data['id_transaksi'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>:</td>
                            <td><?php echo $data['nama_customer'] ?></td>
                        </tr>
                        <tr>
                            <td>Waktu Transaksi</td>
                            <td>:</td>
                            <td><?php echo $data['waktu_transaksi'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $data['status'] ?></td>
                        </tr>
                        <tr>
                            <td>Transfer Atas Nama</td>
                            <td>:</td>
                            <td><?php echo $data['atasnama_transaksi'] ?></td>
                        </tr>
                        <tr>
                            <td>Bank</td>
                            <td>:</td>
                            <td><?php echo $data['bank_transaksi'] ?></td>
                        </tr>
                        <tr>
                            <td>Bank</td>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($data['jumlah_transfer'], 2, ',', '.') ?></td>
                        </tr>
                        <?php if($data['status'] == "Sedang Diproses...") : ?>
                        <tr>
                            <td colspan="3">
                                <a href="submit.php?konfirmasipembayaran=<?php echo $data['id_transaksi'] ?>"><button class="btn btn-green">Konfirmasi</button></a>
                                <button class="btn btn-red">Cancel</button>
                            </td>
                        </tr>
                        <?php endif ?>
                    </table>
                </div>
                <div class="clm-4">
                    <h3>Bukti Pembayaran</h3>
                    <img id="blah" src="<?php echo "data/data-customer/".$data['id_customer']."-".$data['username_customer']."/".$data['id_customer']."-".$data['username_customer']."-buktitransaksi-".$data['id_transaksi'] ?>.jpg" style="max-width:300px; max-height:500px;"/>
                </div>
            </div>
        </div>
        <div class="clm-1">
        </div>
    </div>
    <?php endforeach ?>
<script>

function revealPassword(pw, hiddenpw, id){
    var tdpw = document.getElementById('pw'+id);
    
    if(tdpw.innerHTML != pw){
        tdpw.innerHTML = pw;
    }else{
        tdpw.innerHTML = hiddenpw; 
    }
}
    
function showdetail(id){
    var detailtransaksi = document.getElementById('detailtransaksi'+id);
    detailtransaksi.style.display = "block";
}
    
function hidedetail(id){
    var detailtransaksi = document.getElementById('detailtransaksi'+id);
    detailtransaksi.style.display = "none";
}
    
</script>
</html>