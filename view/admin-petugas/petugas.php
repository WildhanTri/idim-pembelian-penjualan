<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $daftarpetugas = $gs->daftarpetugas();
?>
<html>
<head>
</head>
<style>

</style>
    <div class="clm-12 np">
        <div class="container-full" id="daftarproduk">
            <div class="clm-10">
                <h1>Daftar Petugas</h1>
            </div>
            <div class="clm-2">
                <?php if($_SESSION['user'] == 'admin')  : ?>
                <a href="?page=petugas&&subpage=tambahpetugas"><input type="button" value="Tambah Petugas" class="btn btn-green" /></a>\
                <?php endif ?>
            </div>
            <table class="table table-lite" style="margin-top:10px">
                <?php if($daftarpetugas != null) : ?>
                <thead>
                    <td>No Identitas</td>
                    <td>Nama Lengkap</td>
                    <td>Username</td>
                    <?php if($_SESSION['user'] == 'admin') : ?>
                    <td>Password</td>
                    <?php endif ?>
                    <td>Email</td>
                    <td>No Telepon</td>
                    <td></td>
                </thead>
                <?php foreach($daftarpetugas as $data) : ?>
                <tr>
                    <td><?php echo $data['no_identitas'] ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <?php if($_SESSION['user'] == 'admin') : ?>
                    <?php
                            $leng = strlen($data['password']);
                            $pw = "";
                            for($i=0; $i<$leng; $i++){
                                $pw .= "●";
                            }
                    ?>
                    
                    <td ondblclick="revealPassword('<?php echo $data['password'] ?>','<?php echo $pw ?>', '<?php echo $data['no_identitas'] ?>')" id="pw<?php echo $data['no_identitas'] ?>" style="width:120px">
                        <?php
                            echo $pw;
                        ?>
                    </td>
                    <?php endif ?>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['no_telepon'] ?></td>
                    <td>
                        <?php if($_SESSION['user'] == 'admin') : ?>
                        <div class="clm-6" style="padding-right:0">
                            <a href="?page=petugas&&subpage=detailpetugas&&idpetugas=<?php echo $data['no_identitas'] ?>"><button class="btn btn-blue">Detail</button></a>
                        </div>
                        <div class="clm-6">
                            <a href="submit.php?pecatpetugas=<?php echo $data['no_identitas'] ?>"><button class="btn btn-red">Pecat</button></a>
                        </div>
                        <?php else : ?>
                        <div class="clm-12" style="padding-right:0">
                            <a href="?page=petugas&&subpage=detailpetugas&&idpetugas=<?php echo $data['no_identitas'] ?>"><button class="btn btn-blue">Detail</button></a>
                        </div>
                        <?php endif ?>
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