<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $hak_akses_list = $gs->hak_akses_list();
?>
<html>
<head>
</head>
<style>
    .flyitem:hover{
        filter: brightness(140%);
        transition: 0.2s;
    
    }
    
    #dialogoverlay{
        display: none;
        opacity: .8;
        position: fixed;
        top: 0px;
        left: 0px;
        background: #FFF;
        width: 100%;
        z-index: 10;
    }
    #dialogbox{
        display: none;
        position: fixed;
        background: #000;
        border-radius:7px; 
        width:550px;
        z-index: 10;
    }
    #dialogbox > div{ 
        background:#FFF; margin:8px; 
    }
    #dialogbox > div > #dialogboxhead{ 
        background: #666;
        font-size:19px; 
        padding:10px; 
        color:#CCC; 
    }
    #dialogbox > div > #dialogboxbody{ 
        background:#333;
        padding:20px;
        color:#FFF;
    }
    #dialogbox > div > #dialogboxfoot{ 
        background: #666;
        padding:10px;
        text-align:right;
    }

</style>
    <div class="clm-12 np">
        <div class="container-full" id="daftarproduk">
            <h1>List Hak Akses</h1>
            <input type="hidden" id="totalcheck" value="0"/>
            <table class="table table-lite" style="margin-top:10px">
                <?php if($hak_akses_list != null) : ?>
                <thead>
                    <td></td>
                    <td>No</td>
                    <td>Nama Akses</td>
                    <td>Keterangan</td>
                    <td></td>
                    <td></td>
                </thead>
                
                <?php $no=1; foreach ($hak_akses_list as  $hak_akses) : ?>
                <tr>
                    <td><input type="checkbox" value="<?php echo $hak_akses['id_akses'] ?>" name="hak_akses[]" onclick="checkboxes()"></td>
                    <td><?php echo $no; $no++ ?></td>
                    <td style="width:200px"><?php echo $hak_akses['nama_akses'] ?></td>
                    <td><?php echo $hak_akses['keterangan'] ?></td>
                    <td>
                        <div class="clm-6 np-y" style="padding-right:0px;">
                            <a href="submit.php?hak-akses-edit=<?php echo $hak_akses['id_akses'] ?>"><button class="btn btn-orange">Edit</button></a>
                        </div>
                        <div class="clm-6 np-y">
                            <a href="submit.php?hak-akses-delete=<?php echo $hak_akses['id_akses'] ?>"><button class="btn btn-red">Hapus</button></a>
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
    <div class="fly-right">
       =
        <a id="deletemultiple">
            <img src="assets/img/remove.png" id="icondeletemultiple" class="flyitem" style="width:65px; height:65px; filter:grayscale(100%); cursor:not-allowed">
        </a>
        <a href="?page=hak-akses&&subpage=hak-akses-detail">
            <img src="assets/img/add_blue.png" class="flyitem" style="width:65px; height:65px;">
        </a>
    </div>
<script>

function checkboxes(){
    var produk = document.getElementsByTagName('input');
    var i;
    var count = 0;
    for(i = 0; i < produk.length; i++){
        if(produk[i].checked == true){
            count++;
        }
        document.getElementById('totalcheck').value = count;
    }
    if(document.getElementById('totalcheck').value != 0){
        document.getElementById('deletemultiple').setAttribute("onClick", "deletemultiproduk()");
        document.getElementById('icondeletemultiple').style.filter = "";
        document.getElementById('icondeletemultiple').style.cursor = "pointer";
    }else{
        document.getElementById('deletemultiple').setAttribute("onClick", "");
        document.getElementById('icondeletemultiple').style.filter = "grayscale(100%)";
        document.getElementById('icondeletemultiple').style.cursor = "not-allowed";
    }
}

function refreshlist(){
    var xmlhttp = new XMLHttpRequest();
    var list = document.getElementById('daftarproduk');
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            list.innerHTML = this.response;
        }
    }
    xmlhttp.open("GET", "submit.php?refreshdaftarbarang");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function deletemultiproduk(){
    var produk = document.getElementsByTagName('input');
    var xmlhttp = new XMLHttpRequest();
    var i;
    var data = "idproduk=";
        for(i = 0; i < produk.length; i++){
            if(produk[i].checked == true){
                data += produk[i].value + "|";
            }
        }
    
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            refreshlist();
        }
    }
    
    xmlhttp.open("POST", "submit.php?deletemultiproduk");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
    
    document.getElementById('icondeletemultiple').style.filter = "grayscale(100%)";
    document.getElementById('icondeletemultiple').style.cursor = "not-allowed";
}
    
function tampilUbahStok(a){
    var stok = document.getElementById('stok'+a);
    var stokinput = document.getElementById('stokinput'+a);
    var x;
    if(stokinput.style.display == 'none'){
        stokinput.style.display = 'block';
        stok.style.display = 'none';
    }else{
        simpanUbahStok(a);
        stokinput.style.display = 'none';
        stok.style.display = 'block';
    }
}

    
function simpanUbahStok(a){
    var xmlhttp = new XMLHttpRequest();
    var stokinput = document.getElementById('stokinput'+a).value;
    var data = "stok="+stokinput+"&target="+a;
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            refreshlist();
        }
    }
    
    xmlhttp.open("POST", "submit.php?ubahstok");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
    
}
</script>
</html>