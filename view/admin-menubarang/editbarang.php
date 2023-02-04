<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $produk = $gs->tampilEdit($_GET['id']);
    $produkgambar = $gs->tampilGambarProdukEdit($_GET['id']);
    $kategoriproduk = $gs->cmbBoxKategori();
    $lastidgambar = $gs->getLastIdGambar();

    $jumlahgambar = count($produkgambar);
?>
<html>
<head>
</head>
<body>
                <div class="clm-12" style="border-bottom:1px solid black;">
                    <h1><?php echo $produk[0]['nama_produk'] ?><?php echo $lastidgambar["AUTO_INCREMENT"] ?></h1>
                </div>
                <form action="submit.php" method="post" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td colspan="3">
                                Added On : <?php echo $produk[0]['date_added'] ?> &nbsp;&nbsp;&nbsp;&nbsp; Last Update On : <?php echo $produk[0]['date_added'] ?>
                                <input type="hidden" name="idproduk" value="<?php echo $produk[0]['id_produk'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="namaproduk" value="<?php echo $produk[0]['nama_produk'] ?>" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <select name="kategoriproduk" class="input">
                                    <?php foreach($kategoriproduk as $kategori) : ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>"<?php if($kategori['id_kategori'] == $produk[0]['kategori_produk']){ echo "selected"; } ?>><?php echo $kategori['nama_kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Harga Produk</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="hargaproduk" value="<?php echo $produk[0]['harga_produk'] ?>" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;">Deskripsi Produk</td>
                            <td style="vertical-align:top;">:</td>
                            <td>
                                <textarea class="input" name="deskripsiproduk" value="<?php echo $produk[0]['deskripsi_produk'] ?>" autocomplete="off"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Produk</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="stokproduk" value="<?php echo $produk[0]['stok_produk'] ?>" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Cover Produk</td>
                            <td>:</td>
                            <td><input type="file" value="<?php echo $produk[0]['cover_produk'] ?>" name="coverproduk" id="coverproduk" style="display:none" onchange="putImage()" /><img id="blah" src="<?php echo "data/data-produk/".$produk[0]['id_produk']."/".$produk[0]['id_produk']."-cover.jpg" ?>" style="max-width:300px; max-height:500px;"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><label for="coverproduk" class="input" style="cursor:pointer">Pilih Cover...</label></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Additional Images</td>
                            <td style="vertical-align:top">:</td>
                            <td style="width:660;    float:left" id="additionalimages">
                                 
                                <?php $a=0; foreach($produkgambar as $data) : ?>
                                <div style="float:left; height:200px; position:sticky" class="bodyimg">
                                    <img src="assets/img/x.png" style="cursor:pointer; height:50; width:50; position:absolute; top:0; right:0; float:left" class="deletegambar" id="<?php echo $a ?>" onclick="deletegambar(this)">
                                    <label for="images<?php echo $a ?>" class="imageslabel">
                                        <img src="data/data-produk/<?php echo $data['id_produk'] ?>/<?php echo $data['id_produk'] ?>-image<?php echo $data['id_image'] ?>.jpg" style="border:1px solid #b5b5b5; cursor:pointer; height:200; width:200" id="imgimages<?php echo $a ?>" class="imagestarget">
                                    </label>
                                    <input type="file" style="display:none" class="images" id="images<?php echo $a ?>" onchange="addimages(this); showImage(this)" name="gambarproduk[]" />
                                    
                                </div>
                                <input type="hidden" name="oldgambarproduk[]" class="oldgambarproduk" value="<?php echo $data['id_image'] ?>"> 
                                <?php $a++; endforeach ?>
                                <div style="float:left; height:200px; position:sticky" class="bodyimg">
                                    <label for="images<?php echo $jumlahgambar ?>" class="imageslabel">
                                        <img src="assets/img/no-img-icon.png" style="border:1px solid #b5b5b5; cursor:pointer; height:200; width:200" id="imgimages<?php echo $jumlahgambar ?>" class="imagestarget">
                                    </label>
                                    <input type="file" style="display:none" class="images" id="images<?php echo $jumlahgambar ?>" onchange="addimages(this); showImage(this)" name="gambarproduk[]" />
                                </div>
                            </td>
                            
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:right">
                                <input type="submit" name="submiteditproduk" class="btn btn-green" style="width:100px;" value="Done">
                                <input type="button" class="btn btn-red" style="width:100px;" value="cancel">
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
<script>
    function addimages(img){
        var i;
        var images = img.id;
        var target = document.getElementById("img"+images);
        
        if(target.src == "http://localhost/gamestore/assets/img/no-img-icon.png"){
        var additionalimages = document.getElementById('additionalimages');
        var newphoto = document.getElementById('newphoto');
        /*var newadditionalimages = "<div style='float:left; height:200px; position:sticky' class='bodyimg'>"
                                    +"<label for='' class='imageslabel'>"
                                    +"<img src='assets/img/no-img-icon.png' style='border:1px solid #b5b5b5; cursor:pointer; width:200; height:200' class='imagestarget'>"
                                    +"</label>"
                                    +"<input type='file' style='display:none' class='images' onchange='addimages(this);showImage(this)'' name='gambarproduk[]' />"
                                    +"</div>";*/
        var div = document.createElement("div");    
        div.setAttribute("style","float:left; height:200px; position:sticky");    
        div.setAttribute("class","bodyimg");
            
        var label = document.createElement("label");    
        label.setAttribute("for"," ");    
        label.setAttribute("class","imageslabel");
            
        var img = document.createElement("img");    
        img.setAttribute("src","assets/img/no-img-icon.png");    
        img.setAttribute("style","border:1px solid #b5b5b5; cursor:pointer; width:200; height:200");
        img.setAttribute("class","imagestarget");
            
        var input = document.createElement("input");    
        input.setAttribute("type","file");    
        input.setAttribute("onchange","addimages(this); showImage(this)");
        input.setAttribute("class","images");
        input.setAttribute("style","display:none");
        input.setAttribute("name","gambarproduk[]");
        
        div.appendChild(label);
        div.appendChild(input);
            
        label.appendChild(img);
        additionalimages.appendChild(div);
        
        var imageslabel = document.getElementsByClassName('imageslabel');
        var imagestarget = document.getElementsByClassName('imagestarget');
        var images = document.getElementsByClassName('images');
        var bodyimg = document.getElementsByClassName('bodyimg');
        var panjangbodyimg = bodyimg.length - 2;
        
        for(i = 0; i < imageslabel.length; i++){
            imageslabel[i].setAttribute("for", "images"+i);
            imagestarget[i].setAttribute("id", "imgimages"+i);
            images[i].id = 'images'+i;
        }
        var x_icon = document.createElement("img");    
        x_icon.setAttribute("src","assets/img/x.png");   
        x_icon.setAttribute("style","cursor:pointer; height:50; width:50; position:absolute; top:0; right:0; float:left");   
        x_icon.setAttribute("class","deletegambar");   
        x_icon.setAttribute("onclick","deletegambar(this)");   
        x_icon.setAttribute("id",panjangbodyimg);
        bodyimg[panjangbodyimg].insertBefore(x_icon, bodyimg[panjangbodyimg].childNodes[0]);
            
        }
    }
   
    function deletegambar(a){
        var imageslabel = document.getElementsByClassName('imageslabel');
        var imagestarget = document.getElementsByClassName('imagestarget');
        var images = document.getElementsByClassName('images');
        var bodyimg = document.getElementsByClassName('bodyimg');
        var deletegambar = document.getElementsByClassName('deletegambar');
        var oldgambarproduk = document.getElementsByClassName('oldgambarproduk');
        console.log(oldgambarproduk[a.id]);
        oldgambarproduk[a.id].setAttribute("name", "deleteoldgambarproduk[]");
        oldgambarproduk[a.id].setAttribute("class", "deleteoldgambarproduk");
        
        
        bodyimg[a.id].remove();
        for(i = 0; i < bodyimg.length; i++){
            imageslabel[i].setAttribute("for", "images"+i);
            imagestarget[i].setAttribute("id", "imgimages"+i);
            images[i].id = 'images'+i;
            
        }
        for(i = 0; i < deletegambar.length; i++){
            deletegambar[i].setAttribute("id", i);
        }
    }
    
    function showImage(img){
        var images = img.id;
        var target = document.getElementById("img"+images);
        var fr = new FileReader();
        fr.onload = function(){
            target.src = fr.result;
        }
        fr.readAsDataURL(img.files[0]);
    }
    
    function showImageCover(src, target) {
        var fr = new FileReader();

         fr.onload = function(){
             target.src = fr.result;
         }
        fr.readAsDataURL(src.files[0]);

    }
    function putImage() {
        var src = document.getElementById("coverproduk");
        var target = document.getElementById("blah");
        showImageCover(src, target);
    }
</script>
</html>