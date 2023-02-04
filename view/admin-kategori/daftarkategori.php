<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $daftarkategori = $gs->tampilDaftarKategori();
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
        <div class="container-full" id="daftarkategori">
            <h1>Daftar Kategori</h1>
            <p style="margin-top:10px;">* Klik 2x nama kategori untuk mengubah nama</p>
            <input type="hidden" id="totalcheck" value="0"/>
            <table class="table table-lite" style="margin-top:10px">
                <?php if($daftarkategori != null) : ?>
                <thead>
                    <td>No</td>
                    <td>Nama Kategori</td>
                    <td></td>
                </thead>
                
                <?php $no=1; foreach ($daftarkategori as  $data) : ?>
                <tr>
                    <td><?php echo $no; $no++ ?></td>
                    <td style="width:700px" ondblclick="tampilUbahKategori('<?php echo $data['id_kategori'] ?>')">
                        <p id="kategori<?php echo $data['id_kategori'] ?>"><?php echo $data['nama_kategori'] ?></p>
                        <input type="text" value="<?php echo $data['nama_kategori'] ?>" id="kategoriinput<?php echo $data['id_kategori'] ?>" class="input" style="display:none">
                    </td>
                    <td>
                        
                        <div class="clm-6 np-y">
                            <a href="submit.php?deletekategori=<?php echo $data['id_kategori'] ?>"><button class="btn btn-red">Hapus</button></a>
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
    
    <div class="clm-12" style="position:fixed; background:rgba(0,0,0,0.8); left:0; top:0; height:100%; padding-top:70px; display:none" id="formtambah">
        <div class="clm-2">
        </div>
        <div class="clm-8 np" style="background:white">
            <div class="clm-12" style="background:#53d0e3; color:white">
                <div class="clm-11 np">
                    <h4>Tambah Kategori</h4>
                </div>
                <div class="clm-1 np">
                    <button class="btn np" style="background:none; border:0px; color:white" onclick="hideformtambah()"><h2>x</h2></button>
                </div>
            </div>
            <div class="clm-12">
                <form action="submit.php" enctype="multipart/form-data" method="post">
                    <table class="table">
                        <tr>
                            <td>Nama Kategori</td>
                            <td>:</td>
                            <td style="width:600px"><input type="text" class="input" name="namakategori" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:right">
                                <input type="submit" name="tambahkategori" class="btn btn-green" style="width:100px;" value="Tambah">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="clm-2">
        </div>
    </div>
    
    <div class="fly-right">
        <a onclick="showformtambah()">
            <img src="assets/img/add_blue.png" class="flyitem" style="width:65px; height:65px;">
        </a>
    </div>
<script>

function refreshlist(){
    var xmlhttp = new XMLHttpRequest();
    var list = document.getElementById('daftarkategori');
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            list.innerHTML = this.response;
        }
    }
    xmlhttp.open("GET", "submit.php?refreshdaftarkategori");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}
    
function tampilUbahKategori(a){
    var kategori = document.getElementById('kategori'+a);
    var kategoriinput = document.getElementById('kategoriinput'+a);
    var x;
    if(kategoriinput.style.display == 'none'){
        kategoriinput.style.display = 'block';
        kategori.style.display = 'none';
    }else{
        simpanUbahKategori(a);
        kategoriinput.style.display = 'none';
        kategori.style.display = 'block';
    }
}

    
function simpanUbahKategori(a){
    var xmlhttp = new XMLHttpRequest();
    var kategoriinput = document.getElementById('kategoriinput'+a).value;
    var data = "kategori="+kategoriinput+"&target="+a;
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            refreshlist();
        }
    }
    
    xmlhttp.open("POST", "submit.php?ubahkategori");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
    
}
    
function showformtambah(){
    var formtambah = document.getElementById('formtambah');
    formtambah.style.display = "block";
}
    
function hideformtambah(){
    var formtambah = document.getElementById('formtambah');
    formtambah.style.display = "none";
}
</script>
</html>