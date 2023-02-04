<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $detailpetugas = $gs->tampileditpetugas($_GET['idpetugas']);
?>
<html>
<head>
</head>
<style>

</style>
    <div class="clm-12 np">
        <div class="container-full" id="daftarproduk">
            <div class="clm-10">
                <h1>Detail Petugas</h1>
            </div>
            <div class="clm-2">
                
            </div>
            <div class="clm-12">
                <h2>Profil Petugas</h2><br>
                <form action="submit.php?idpetugas=<?php echo $_GET['idpetugas'] ?>" method="post">
                <table class="table">
                    <tr>
                        <td>No Identitas</td>
                        <td>:</td>
                        <td>
                            <?php if($_SESSION['user'] == 'admin') : ?>
                            <input type="text" class="input" name="noidentitas" value="<?php echo $detailpetugas[0]['no_identitas'] ?>" autocomplete="off" />
                            <?php else : ?>
                            <?php echo $detailpetugas[0]['no_identitas'] ?>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                         
                        <td>Nama Petugas</td>
                        <td>:</td>
                        <td>
                            <?php if($_SESSION['user'] == 'admin') : ?>
                            <input type="text" class="input" name="namapetugas" value="<?php echo $detailpetugas[0]['nama_lengkap'] ?>"  autocomplete="off"/>
                            <?php else : ?>
                            <?php echo $detailpetugas[0]['nama_lengkap'] ?>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td>
                            <?php if($_SESSION['user'] == 'admin') : ?>
                            <input type="text" class="input" name="username" value="<?php echo $detailpetugas[0]['username'] ?>"  autocomplete="off"/>
                            <?php else : ?>
                            <?php echo $detailpetugas[0]['username'] ?>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php if($_SESSION['user'] == 'admin') : ?>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td>
                            
                            <input type="text" class="input" name="password" value="<?php echo $detailpetugas[0]['password'] ?>"  autocomplete="off"/>
                        </td>
                    </tr>
                    <?php endif ?>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            <?php if($_SESSION['user'] == 'admin') : ?>
                            <input type="text" class="input" name="email" value="<?php echo $detailpetugas[0]['email'] ?>" autocomplete="off"/>
                            <?php else : ?>
                            <?php echo $detailpetugas[0]['email'] ?>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>:</td>
                        <td>
                            <?php if($_SESSION['user'] == 'admin') : ?>
                            <input type="text" class="input" name="notelepon" value="<?php echo $detailpetugas[0]['no_telepon'] ?>"  autocomplete="off"/>
                            <?php else : ?>
                            <?php echo $detailpetugas[0]['no_telepon'] ?>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">Alamat</td>
                        <td style="vertical-align:top;">:</td>
                        <td>
                            <?php if($_SESSION['user'] == 'admin') : ?> 
                            <textarea class="input" name="alamat" autocomplete="off" style="white-space:nowrap">
                                    <?php echo $detailpetugas[0]['alamat'] ?>
                            </textarea>
                            <?php else : ?>
                            <?php echo $detailpetugas[0]['alamat'] ?>
                            <?php endif ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align:right">
                            <?php if($_SESSION['user'] == 'admin') : ?> 
                            <input type="submit" name="submiteditpetugas" class="btn btn-green" style="width:100px;" value="Simpan">
                            <input type="button" class="btn btn-red" style="width:100px;" value="cancel" onclick="history.back()">
                            <?php else : ?>
                            <input type="button" class="btn btn-blue" style="width:100px;" value="back" onclick="history.back()">
                            <?php endif ?>
                        </td>
                    </tr>
                </table>
                </form>
                <!--
                <h2>Kontrol Aplikasi</h2><br>
                
                <table class="table table-lite">
                    <tr>
                        <td style="background-color:#264f6d; color:white"><h3>Daftar Barang</h3></td>
                        <td style="background-color:#264f6d; color:white; width:179"><input type="checkbox" class="input" /></td>  
                    </tr>
                    <tr>
                        <td>Lihat Barang</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                    <tr>
                        <td>Memasukan Barang</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                    <tr>
                        <td>Edit Barang</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                    <tr>
                        <td>Hapus Barang</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                </table>
                
                <table class="table table-lite">
                    <tr>
                        <td style="background-color:#264f6d; color:white"><h3>Transaksi</h3></td>
                        <td style="background-color:#264f6d; color:white; width:179"><input type="checkbox" class="input" /></td>  
                    </tr>
                    <tr>
                        <td>Lihat Transaksi</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                    <tr>
                        <td>Konfirmasi Transaksi</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                    <tr>
                        <td>Pembatalan Transaksi</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                </table>
                
                <table class="table table-lite">
                    <tr>
                        <td style="background-color:#264f6d; color:white"><h3>Petugas</h3></td>
                        <td style="background-color:#264f6d; color:white; width:179"><input type="checkbox" class="input" /></td>  
                    </tr>
                    <tr>
                        <td>Tambah Petugas</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                    <tr>
                        <td>Pecat Petugas</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                    <tr>
                        <td>Edit Petugas</td>     
                        <td><input type="checkbox" class="input" /></td>    
                    </tr>
                </table>
                
                <input type="submit" class="btn btn-green" value="simpan"/>
-->
            </div>
        </div>
    </div>
<script>

function revealPassword(pw, hiddenpw, id){
    var tdpw = document.getElementById('pw'+id);
    
    if(tdpw.innerHTML != pw){
        tdpw.innerHTML = pw;
    }else{
        tdpw.innerHTML = hiddenpw; 
    }
}
    
</script>
</html>