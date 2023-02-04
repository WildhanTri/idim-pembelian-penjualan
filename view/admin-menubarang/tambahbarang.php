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

                <h1>Tambah Barang</h1>
                <form action="submit.php" enctype="multipart/form-data" method="post">
                    <?php date("Y-m-d h:i:sa") ?>
                    <table class="table">
                        <tr>
                            <td>Kode Produk</td>
                            <td>:</td>
                            <td style="width:800px"><input type="text" class="input" name="kodeproduk" value="<?php echo $kodeproduk ?>"/></td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="namaproduk" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <select name="kategoriproduk" class="input">
                                    <?php foreach($kategoriproduk as $kategori) : ?>
                                    <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['nama_kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Harga Produk</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="hargaproduk" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top;">Deskripsi Produk</td>
                            <td style="vertical-align:top;">:</td>
                            <td>
                                <textarea class="input" name="deskripsiproduk" autocomplete="off"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Produk</td>
                            <td>:</td>
                            <td><input type="text" class="input" name="stokproduk" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td>Cover Produk</td>
                            <td>:</td>
                            <td><input type="file" class="input" name="coverproduk" /></td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">Additional Images</td>
                            <td style="vertical-align:top">:</td>
                            <td style="width:660;    float:left" id="additionalimages">
                                <div style="float:left; height:200px; position:sticky" class="bodyimg">
                                    <label for="images0" class="imageslabel">
                                        <img src="assets/img/no-img-icon.png" style="border:1px solid #b5b5b5; cursor:pointer; height:200; width:200" id="imgimages0" class="imagestarget">
                                    </label>
                                    <input type="file" style="display:none" class="images" id="images0" onchange="addimages(this); showImage(this)" name="gambarproduk[]" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:right">
                                <input type="submit" name="tambahproduk" class="btn btn-green" style="width:100px;" value="Tambah">
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
        var deletegambar = document.getElementsByClassName('deletegambar');;
        
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
</script>
</html>