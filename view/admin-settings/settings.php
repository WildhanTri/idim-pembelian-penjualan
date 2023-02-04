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
            <h1>Settings</h1>
            
        </div>
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