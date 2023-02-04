<?php
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION)) { 
    session_start(); 
}

class gamestore {
    function callasset(){
        echo "<link rel='stylesheet' href='assets/css/style.css'>";
    }
    function callconnection(){
        require_once "koneksi.php";
    }
    function callsession(){
        if(empty($_SESSION['user'])){
            header("location:view/admin-login/login.php");
        }
    }
    function callmodel(){
        return require_once ("model/gamestore/model.php");
    }
   
    function proseslogin($data){
        $this->callmodel();
        
        $model = new model;
        
        $username = $data['username'];
        $password = $data['password'];
        
        $authUser = $model->selectWhere("user", "username = '$username' and password = '$password'");
        if($authUser == true){
            $_SESSION['user'] = $authUser[0]['username'];
            $user = $authUser[0]['username'];
            $date = date("y-m-d h:i:s");
            $model->insert("log", "'','$user login','$date', '$user'");
            return "berhasil";
        }
        else {
            return "gagal";
        }
    }
    
    function jumlahbarang(){
        $this->callmodel();
        $model = new model;
        
        return $model->select("produk");
    }
    
    function jumlahtransaksiaktif(){
        $this->callmodel();
        $model = new model;
        
        return $model->selectWhere("transaksi", "status_transaksi = 'Menunggu Pembayaran...' and status_transaksi = 'Sedang Diproses...'");
    }
    
    function daftarbarang(){
        $this->callmodel();
        $model = new model;
        
        $daftarbarang = $model->select2Table("produk", "kategori", "produk.kategori_produk = kategori.id_kategori");
        return $daftarbarang;
    }
    
    function hak_akses_list(){
        $this->callmodel();
        $model = new model;
        
        $hak_akses_list = $model->select("hak_akses");
        return $hak_akses_list;
    }
    
    function tambahproduk($data){
        $this->callmodel();
        $model = new model;
        
        $kodeproduk = $data['kodeproduk'];
        $namaproduk = $data['namaproduk'];
        $kategoriproduk = $data['kategoriproduk'];
        $tanggaladdproduk = date("y-m-d");
        $hargaproduk = $data['hargaproduk'];
        $deskripsiproduk = $data['deskripsiproduk'];
        $stokproduk = $data['stokproduk'];
        $coverproduk = $data['namacoverproduk'];
        $tmpcoverproduk = $data['tmpcoverproduk'];
        $gambarproduk = $data['namagambarproduk'];
        $tmpgambarproduk = $data['tmpgambarproduk'];
        $jumlahgambar = count($gambarproduk);
        /*
        return $tambahproduk = $model->insert("produk", "'','$namaproduk', '$kategoriproduk', '$tanggaladdproduk', '$hargaproduk', '$deskripsiproduk', '$stokproduk', '$coverproduk'.jpg");
        */
        $tambahproduk = $model->insert("produk","'$kodeproduk','$namaproduk','$kategoriproduk','$tanggaladdproduk','$hargaproduk','$deskripsiproduk','$stokproduk','$namaproduk.jpg'");
        
        $tempdir = "data/data-produk/".$kodeproduk."/";
        
        if(!file_exists($tempdir)){
            mkdir($tempdir);
        }
        
        $cover = $tempdir.$kodeproduk."-cover.jpg";
        $defaultcover = "assets/img/no-img-icon.png";
        
        if($coverproduk != null){
            move_uploaded_file($tmpcoverproduk, $cover);
        }else{
            copy($defaultcover, $cover);
        }
        
        for($x=0; $x<$jumlahgambar; $x++){
            if($gambarproduk[$x] != null){
            $lastidgambar = $this->getLastIdGambar();
            $id = $lastidgambar['AUTO_INCREMENT'];
            $tambahgambarproduk = $model->insert("produk_image","'','$kodeproduk','image$id'");
            
            $tempdir = "data/data-produk/".$kodeproduk."/";
            if(!file_exists($tempdir)){
                mkdir($tempdir);
            }
            
            $gambar = $tempdir.$kodeproduk."-image".$id.".jpg";
            move_uploaded_file($tmpgambarproduk[$x], $gambar);
            }
        }
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        $model->insert("log", "'','$user menambahkan $namaproduk di daftar barang','$date', '$user'");
    }
    
    function tampiledit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data;
        
        $tampilEdit = $model->selectWhere("produk", "id_produk = '$data'");
        return $tampilEdit;
    }
    function getLastIdGambar(){
        $this->callmodel();
        $model = new model;
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "information_schema";
        
        $connect = mysqli_connect($servername, $username, $password, $dbname);
        $getLastId = $connect->query("select * from TABLES where TABLE_SCHEMA = 'gamestore' and TABLE_NAME = 'produk_image'");
        return mysqli_fetch_assoc($getLastId);
        
    }
    function tampilGambarProdukEdit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data;
        
        $tampilEdit = $model->selectWhere("produk_image", "id_produk = '$data'");
        return $tampilEdit;
    }
    
    function cb1() {
        $this->callmodel();
        $model = new model;
        
        return $model->select("produk_image");
    }
    
    function proseseditproduk($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data['idproduk'];
        $nama = $data['namaproduk'];
        $kategori = $data['kategoriproduk'];
        $harga = $data['hargaproduk'];
        $deskripsi = $data['deskripsiproduk'];
        $stok = $data['stokproduk'];
        $coverproduk = $data['coverproduk'];
        $tmpcoverproduk = $data['tmpcoverproduk'];
        $gambarproduk = $data['gambarproduk'];
        $tmpgambarproduk = $data['tmpgambarproduk'];
        $jumlahgambar = count($gambarproduk);
        if(isset($data['oldgambarproduk'])){
            $oldgambarproduk = $data['oldgambarproduk'];
        }
        
        $produklama = $model->selectWhere("produk", "id_produk = '$id'");
        
        $namalama = $produklama[0]['nama_produk'];
        
        $tampilEdit = $model->updateWhere("produk", "nama_produk = '$nama', kategori_produk = '$kategori', harga_produk = '$harga', deskripsi_produk = '$deskripsi', stok_produk = '$stok', cover_produk = '$nama.jpg'", "id_produk = '$id'");
        
        $tempdir = "data/data-produk/".$id."/";
        
        if(!file_exists($tempdir)){
            mkdir($tempdir);
        }
        
        $cover = $tempdir.$id."-cover.jpg";
        
        if($coverproduk != null){
            move_uploaded_file($tmpcoverproduk, $cover);
        }
        
        if(isset($data['deleteoldgambarproduk'])){
            $deletegambarproduk = $data['deleteoldgambarproduk'];
            $jumlahgambardelete = count($deletegambarproduk);
            for($x=0; $x<$jumlahgambardelete; $x++){
                unlink($_SERVER['DOCUMENT_ROOT']  ."/gamestore/data/data-produk/".$id."/".$id."-image".$deletegambarproduk[$x].".jpg");
                $model->delete("produk_image","id_image = '$deletegambarproduk[$x]'");
            }
        }
        
        for($x=0; $x<$jumlahgambar; $x++){
            
            if(isset($oldgambarproduk[$x])){
                if($gambarproduk[$x] != null){
                    $gambar = $tempdir.$id."-image".$oldgambarproduk[$x].".jpg";
                    move_uploaded_file($tmpgambarproduk[$x], $gambar);
                }
            }
            else{
                
                if($gambarproduk[$x] != null){
                $lastidgambar = $this->getLastIdGambar();
                $idgambar = $lastidgambar['AUTO_INCREMENT'];
                $tambahgambarproduk = $model->insert("produk_image","'', '$id','image$idgambar'");
                $tempdir = "data/data-produk/".$id."/";
                if(!file_exists($tempdir)){
                    mkdir($tempdir);
                }
                
                $gambar = $tempdir.$id."-image".$idgambar.".jpg";
                move_uploaded_file($tmpgambarproduk[$x], $gambar);
                }
            }
            
        }
        
        if($nama != $namalama){
            $user = $_SESSION['user'];
            $date = date("y-m-d h:i:s");
            $model->insert("log", "'','Data Produk $namalama telah diubah ke $nama','$date', '$user'");
        }
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        $model->insert("log", "'','Nama Produk $nama telah diubah oleh $user','$date', '$user'");
    }
    
    function prosesubahstokproduk($data){
        $this->callmodel();
        
        $model = new model;
        
        $idproduk = $data['idproduk'];
        $stok = $data['stok'];
        
        $produk = $model->selectWhere("produk", "id_produk='$idproduk'");
        $stokproduklama = $produk[0]['stok_produk'];
         
        $tampilEdit = $model->updateWhere("produk", "stok_produk = '$stok'", "id_produk = '$idproduk'");
        
        $produk = $model->selectWhere("produk", "id_produk='$idproduk'");
        $stokprodukbaru = $produk[0]['stok_produk'];
        
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        if($stokproduklama != stokprodukbaru){
            $model->insert("log", "'','$user mengubah stok $namaproduk dari $stokproduklama ke $stokprodukbaru ','$date', '$user'");
        }
        return $tampilEdit;
    }
    
    function prosesdeleteproduk($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data['idproduk'];
        $produk = $model->selectWhere("produk", "id_produk = '$id'");
        
        $kodeproduk = $produk[0]['id_produk'];
        $namaproduk = $produk[0]['nama_produk'];
        array_map('unlink', glob($_SERVER['DOCUMENT_ROOT']  ."/gamestore/data/data-produk/".$kodeproduk."/*.*"));
        rmdir($_SERVER['DOCUMENT_ROOT'] .'/gamestore/data/data-produk/'.$kodeproduk.'/');
        
        $delete = $model->delete("produk", "id_produk = '$id'");
        
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        $model->insert("log", "'','Data Produk $namaproduk($kodeproduk) telah dihapus oleh $user','$date', '$user'");
        
        return $delete;
    }
    
    function prosesdeletemultiproduk($data){
        $this->callmodel();
        
        $model = new model;
        $jumlahdata = count($data);
        for($x = 0; $x < $jumlahdata; $x++){
            $produk = $model->selectWhere("produk", "id_produk = '$data[$x]'");
        
            $kodeproduk = $produk[0]['id_produk'];
            array_map('unlink', glob($_SERVER['DOCUMENT_ROOT']  ."/gamestore/data/data-produk/".$kodeproduk."/*.*"));
            rmdir($_SERVER['DOCUMENT_ROOT'] .'/gamestore/data/data-produk/'.$kodeproduk.'/');
        
            $delete = $model->delete("produk", "id_produk = '$data[$x]'");
            $user = $_SESSION['user'];
            $date = date("y-m-d h:i:s");
            $model->insert("log", "'','Data Produk $namaproduk($kodeproduk) telah dihapus oleh $user','$date', '$user'");
        }
        
        
        
    }
    
    function cmbBoxKategori(){
        $this->callmodel();
        $model = new model;
        
        $cmbBoxKategori = $model->select("kategori");
        return $cmbBoxKategori;
    }
    
    function randomGen($panjang){
        $this->callmodel();
        
        $model = new model;
        $produk = $model->select("produk");
        
        startGen:
        
        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
        $string = '';
        for($x=0; $x<$panjang; $x++){
            $pos = rand(0, strlen($karakter)-1);
            $string .= $karakter{$pos};
        }
        
        if($produk != null){
            foreach($produk as $data){
                if($data['id_produk'] == $string){
                    goto startGen;
                }
            }
        }
        
        return $string;
        
    }
    
    function daftarpetugas(){
        $this->callmodel();
        $model = new model;
        
        $daftarpetugas = $model->selectWhere("user", "no_identitas != 1");
        return $daftarpetugas;
    }
    
    function tambahpetugas($data){
        $this->callmodel();
        $model = new model;
        
        $noidentitas = $data['noidentitas'];
        $namapetugas = $data['namapetugas'];
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $notelepon = $data['notelepon'];
        $alamat = $data['alamat'];
        
        $tambahproduk = $model->insert("user","'$noidentitas','$namapetugas','$username','$password','$email','$notelepon','$alamat'");
        
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        $model->insert("log", "'','Petugas $namapetugas telah ditambahkan $user','$date', '$user'");
        
    }
    
    function tampileditpetugas($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data;
        
        $tampilEdit = $model->selectWhere("user", "no_identitas = '$data'");
        return $tampilEdit;
    }
    
    function proseseditpetugas($data){
        $noidentitaslama = $data['noidentitaslama'];
        $noidentitasbaru = $data['noidentitasbaru'];
        $namalengkap = $data['namalengkap'];
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $telepon = $data['notelepon'];
        $alamat = $data['alamat'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilProfile = $model->updateWhere("user", "no_identitas = '$noidentitasbaru', nama_lengkap = '$namalengkap', username = '$username', password = '$password', email = '$email', no_telepon = '$telepon', alamat = '$alamat'" , "no_identitas = '$noidentitaslama'");
        
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        $model->insert("log", "'','Data Petugas $namaproduk($kodeproduk) telah diubah oleh $user','$date', '$user'");
        
    }
    
    function daftartransaksi(){
        $this->callmodel();
        $model = new model;
        
        $daftartransaksi = $model->select2table("transaksi", "customer", "transaksi.id_customer = customer.id_customer");
        return $daftartransaksi;
    }
    
    function log(){
        $this->callmodel();
        $model = new model;
        
        $log = $model->selectOrderBy("log", "id_log desc");
        return $log;
    }
    
    function proseskonfirmasipembayaran($data){
        
        $idtransaksi = $data['idtransaksi'];
        
        $this->callmodel();
        
        $model = new model;
        $prosesPembayaran = $model->updateWhere("transaksi", "status = 'Transaksi Berhasil'", "id_transaksi = '$idtransaksi' ");
        
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        $model->insert("log", "'','Transaksi $idtransaksi telah dikonfirmasi oleh $user','$date', '$user'");
        
    }
    
    function allLog(){
        $this->callmodel();
        
        $model = new model;
        $log = $model->selectOrderBy("log", "id_log desc");
        ?>
            
            <?php foreach($log as $data) : ?>
                <div class="clm-12 logcontent" style="padding:5">
                    <div class="clm-12 shadow">
                        <table class="table" style="float:left; display:block">
                            <tr>
                                <td style="width:20%"><?php echo $data['tanggal_waktu_log'] ?></td>
                                <td style="width:75%"><?php echo $data['nama_log'] ?></td>
                                <td style="width:10%; text-align:right" ><?php echo $data['id_user'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>   
            <?php endforeach ?>

        <?php
    }
    
    function pecatpetugas($id){
        $this->callmodel();
        
        $model = new model;
        
        $petugas = $model->selectWhere("user", "no_identitas = '$id'");
        $namapetugas = $petugas[0]['nama_lengkap'];
        $usernamepetugas = $petugas[0]['username'];
        
        $model->delete("user", "no_identitas = '$id'");
        
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        $model->insert("log", "'','Petugas $namapetugas($usernamepetugas) telah dipecat','$date', '$user'");
    }
    
    function myLog(){
        $this->callmodel();
        
        $model = new model;
        $user = $_SESSION['user'];
        $log = $model->selectWhere("log", "id_user = '$user' order by id_log desc");
        ?>
            <?php foreach($log as $data) : ?>
                <div class="clm-12 logcontent" style="padding:5">
                    <div class="clm-12 shadow">
                        <table class="table" style="float:left; display:block">
                            <tr>
                                <td style="width:20%"><?php echo $data['tanggal_waktu_log'] ?></td>
                                <td style="width:75%"><?php echo $data['nama_log'] ?></td>
                                <td style="width:10%; text-align:right" ><?php echo $data['id_user'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>   
            <?php endforeach ?>

        <?php
    }
    
    function prosestambahkategori($data){
        $this->callmodel();
        
        $model = new model;
        
        $namakategori = $data['namakategori'];
        $model->insert("kategori", "'', '$namakategori'");
    }
    
    function prosesdeletekategori($data){
        $this->callmodel();
        
        $model = new model;
        
        $idkategori = $data['idkategori'];
        $model->delete("kategori", "id_kategori = '$idkategori'");
    }
    
    function prosesubahkategori($data){
        $this->callmodel();
        
        $model = new model;
        
        $idkategori = $data['idkategori'];
        $namakategori = $data['namakategori'];
        
        $produk = $model->selectWhere("kategori", "id_kategori='$idkategori'");
        $kategorilama = $produk[0]['kategori_nama'];
         
        $tampilEdit = $model->updateWhere("kategori", "nama_kategori = '$namakategori'", "id_kategori = '$idkategori'");
        
        $produk = $model->selectWhere("kategori", "id_kategori='$idkategori'");
        $kategoribaru = $produk[0]['kategori_nama'];
        
        $user = $_SESSION['user'];
        $date = date("y-m-d h:i:s");
        if($stokproduklama != stokprodukbaru){
            $model->insert("log", "'','$user mengubah kategori $kategorilama ke $namakategori','$date', '$user'");
        }
        return $tampilEdit;
    }
    

//////user//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    
    function register($data){
        $this->callmodel();
        $model = new model;
        
        $namadepan = $data['namadepan'];
        $namabelakang = $data['namabelakang'];
        $namalengkap = $namadepan." ".$namabelakang;
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        
        $model->insert("customer", "'','$namalengkap', '$username', '$password', '$email', '', '' ");
        $customer = $model->selectOrderBy("customer", "id_customer desc limit 1");
        $idcustomer = $customer[0]['id_customer'];
        
        $model->insert("customer_nama", "'$idcustomer','$namadepan', '$namabelakang'");
        
    }
    
    function proseslogincustomer($data){
        $this->callmodel();
        $model = new model;
        
        $username = $data['username'];
        $password = $data['password'];
        
        $authUser = $model->selectWhere("customer", "username_customer = '$username' and password_customer = '$password'");
        if($authUser == true){
            $_SESSION['usercustomer'] = $authUser[0]['id_customer']."-".$authUser[0]['username_customer'];
            $_SESSION['usercustomer_id'] = $authUser[0]['id_customer'];
            $_SESSION['usercustomer_username'] = $authUser[0]['username_customer'];
            return "berhasil";
        }
        else {
            return "gagal";
        }
    }
    
    function daftarProdukAll(){
        $this->callmodel();
        $model = new model;
        return $dataprodukgames = $model->select("produk");
    }
    
    function searchProduk($search){
        $this->callmodel();
        $model = new model;
        
        $searchhasil = $model->selectWhere("produk", "nama_produk='$search'");
        
        if($searchhasil != null) :
        foreach($searchhasil as $data) :
        ?>
        <?php $a = $data['id_produk']; ?> 
            <div class="clm-3" style="height:510px;">
               <div class="clm-12" style="background-color:#282828; height:100%;">
                   <div class="clm-12" style="background:url('data/data-produk/<?php echo $data['id_produk']; ?>/<?php echo $data['id_produk'] ?>-cover.jpg'); background-size:100% 100%; height:300px">
                                        
                   </div>
                   <div class="clm-12" style="height:70px;">
                       <p><?php echo $data['nama_produk'] ?></p>
                       <p>Stocks : Avaiable</p>
                   </div>
                   <div class="clm-12 np-y">
                       <?php 
                            $price = "Rp. ".number_format($data['harga_produk'],2,",","."); 
                       ?>
                       <?php if(isset($_SESSION['usercustomer'])) : ?>
                       <div class="clm-12 np" id="<?php echo "buttontocart".$a ?>" style="">
                           <button class="btn btn-green produkbutton" id="<?php echo "produk".$a; ?>" onmousemove="addtocard('<?php echo $a; ?>')" onmouseout="showprice('<?php echo $a; ?>', '<?php echo $price ?>')" onclick="showaddtocart('<?php echo $a ?>')"><?php echo "Rp. ".number_format($data['harga_produk'],2,",",".") ?></button>
                       </div>
                       <div class="clm-12 np-y" id="<?php echo "addtocart".$a ?>" style="display:none">
                           <form method="post">
                               <div class="clm-2 np-x" style="text-align:right; padding-right:5px">
                                   <button type="button" onclick="backtobutton('<?php echo $a ?>')" class="btn"  style="background-    color:#cb4d4d; border-color:white; color:white; padding:5">X</button>
                               </div>
                               <div class="clm-4 np-x" style="text-align:center; padding:15px 0px; font-size:15">
                                   <p style="font-size:12">Quantity :</p>
                               </div>
                               <div class="clm-2 np-x">
                                   <input type="hidden" class="input" name="idproduk" id="idproduk<?php echo $data['id_produk'] ?>" value="<?php echo $data['id_produk'] ?>">
                                   <input type="text" class="input" style="" name="quantity" id="quantity<?php echo $data['id_produk'] ?>" value="1">
                               </div>
                               <div class="clm-4 np-x" style="padding-left:5px;">
                                   <input type="button" class="btn" value="add" name="addtocart" style="padding:5 10" onclick="sendtocart('<?php echo $data['id_produk'] ?>');">
                               </div>
                           </form>
                       </div>
                       <?php else : ?>
                       <div class="clm-12 np" id="<?php echo "buttontocart".$a ?>" style="">
                           <button class="btn btn-green produkbutton" id="<?php echo "produk".$a; ?>" onmousemove="todologin('<?php echo $a; ?>')" onmouseout="showprice('<?php echo $a; ?>', '<?php echo $price ?>')" onclick="showtodologin()"><?php echo "Rp. ".number_format($data['harga_produk'],2,",",".") ?></button>
                       </div>
                       <?php endif ?>
                   </div>
                   <div class="clm-12">
                       <a href="?page=shop&&subpage=detailproduk&&produk=<?php echo $data['id_produk'] ?>"><button class="btn" style="background-color:#1e1e1e; border-color:white; color:white">Detail</button></a>
                   </div>
                </div>
            </div>
        <?php 
            endforeach;
            else :
        ?>
        <div class="clm-12" style="height:510px; text-align:center">
            <p>Pencarian "<?php echo $search ?>" tidak ditemukan</p>       
        </div>
        <?php endif ?>
    <?php
    }
    
    function resetCatalog(){
        $this->callmodel();
        $model = new model;
        
        $catalog = $model->select("produk");
        
        foreach($catalog as $data) :
        ?>
        <?php $a = $data['id_produk']; ?> 
            <div class="clm-3" style="height:510px;">
               <div class="clm-12" style="background-color:#282828; height:100%;">
                   <div class="clm-12" style="background:url('data/data-produk/<?php echo $data['id_produk']; ?>/<?php echo $data['id_produk'] ?>-cover.jpg'); background-size:100% 100%; height:300px">
                                        
                   </div>
                   <div class="clm-12" style="height:70px;">
                       <p><?php echo $data['nama_produk'] ?></p>
                       <p>Stocks : Avaiable</p>
                   </div>
                   <div class="clm-12 np-y">
                       <?php 
                            $price = "Rp. ".number_format($data['harga_produk'],2,",","."); 
                       ?>
                       <?php if(isset($_SESSION['usercustomer'])) : ?>
                       <div class="clm-12 np" id="<?php echo "buttontocart".$a ?>" style="">
                           <button class="btn btn-green produkbutton" id="<?php echo "produk".$a; ?>" onmousemove="addtocard('<?php echo $a; ?>')" onmouseout="showprice('<?php echo $a; ?>', '<?php echo $price ?>')" onclick="showaddtocart('<?php echo $a ?>')"><?php echo "Rp. ".number_format($data['harga_produk'],2,",",".") ?></button>
                       </div>
                       <div class="clm-12 np-y" id="<?php echo "addtocart".$a ?>" style="display:none">
                           <form method="post">
                               <div class="clm-2 np-x" style="text-align:right; padding-right:5px">
                                   <button type="button" onclick="backtobutton('<?php echo $a ?>')" class="btn"  style="background-    color:#cb4d4d; border-color:white; color:white; padding:5">X</button>
                               </div>
                               <div class="clm-4 np-x" style="text-align:center; padding:15px 0px; font-size:15">
                                   <p style="font-size:12">Quantity :</p>
                               </div>
                               <div class="clm-2 np-x">
                                   <input type="hidden" class="input" name="idproduk" id="idproduk<?php echo $data['id_produk'] ?>" value="<?php echo $data['id_produk'] ?>">
                                   <input type="text" class="input" style="" name="quantity" id="quantity<?php echo $data['id_produk'] ?>" value="1">
                               </div>
                               <div class="clm-4 np-x" style="padding-left:5px;">
                                   <input type="button" class="btn" value="add" name="addtocart" style="padding:5 10" onclick="sendtocart('<?php echo $data['id_produk'] ?>');">
                               </div>
                           </form>
                       </div>
                       <?php else : ?>
                       <div class="clm-12 np" id="<?php echo "buttontocart".$a ?>" style="">
                           <button class="btn btn-green produkbutton" id="<?php echo "produk".$a; ?>" onmousemove="todologin('<?php echo $a; ?>')" onmouseout="showprice('<?php echo $a; ?>', '<?php echo $price ?>')" onclick="showtodologin()"><?php echo "Rp. ".number_format($data['harga_produk'],2,",",".") ?></button>
                       </div>
                       <?php endif ?>
                   </div>
                   <div class="clm-12">
                       <a href="?page=shop&&subpage=detailproduk&&produk=<?php echo $data['id_produk'] ?>"><button class="btn" style="background-color:#1e1e1e; border-color:white; color:white">Detail</button></a>
                   </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php
    }
    
    function selectKategori($kategori){
        $this->callmodel();
        $model = new model;
        
        $kategoriProduk = $model->selectWhere("produk", "kategori_produk='$kategori'");
        
        if($kategoriProduk != null) :
        foreach($kategoriProduk as $data) :
        ?>
        <?php $a = $data['id_produk']; ?> 
            <div class="clm-3" style="height:510px;">
               <div class="clm-12" style="background-color:#282828; height:100%;">
                   <div class="clm-12" style="background:url('data/data-produk/<?php echo $data['id_produk']; ?>/<?php echo $data['id_produk'] ?>-cover.jpg'); background-size:100% 100%; height:300px">
                                        
                   </div>
                   <div class="clm-12" style="height:70px;">
                       <p><?php echo $data['nama_produk'] ?></p>
                       <p>Stocks : Avaiable</p>
                   </div>
                   <div class="clm-12 np-y">
                       <?php 
                            $price = "Rp. ".number_format($data['harga_produk'],2,",","."); 
                       ?>
                       <?php if(isset($_SESSION['usercustomer'])) : ?>
                       <div class="clm-12 np" id="<?php echo "buttontocart".$a ?>" style="">
                           <button class="btn btn-green produkbutton" id="<?php echo "produk".$a; ?>" onmousemove="addtocard('<?php echo $a; ?>')" onmouseout="showprice('<?php echo $a; ?>', '<?php echo $price ?>')" onclick="showaddtocart('<?php echo $a ?>')"><?php echo "Rp. ".number_format($data['harga_produk'],2,",",".") ?></button>
                       </div>
                       <div class="clm-12 np-y" id="<?php echo "addtocart".$a ?>" style="display:none">
                           <form method="post">
                               <div class="clm-2 np-x" style="text-align:right; padding-right:5px">
                                   <button type="button" onclick="backtobutton('<?php echo $a ?>')" class="btn"  style="background-    color:#cb4d4d; border-color:white; color:white; padding:5">X</button>
                               </div>
                               <div class="clm-4 np-x" style="text-align:center; padding:15px 0px; font-size:15">
                                   <p style="font-size:12">Quantity :</p>
                               </div>
                               <div class="clm-2 np-x">
                                   <input type="hidden" class="input" name="idproduk" id="idproduk<?php echo $data['id_produk'] ?>" value="<?php echo $data['id_produk'] ?>">
                                   <input type="text" class="input" style="" name="quantity" id="quantity<?php echo $data['id_produk'] ?>" value="1">
                               </div>
                               <div class="clm-4 np-x" style="padding-left:5px;">
                                   <input type="button" class="btn" value="add" name="addtocart" style="padding:5 10" onclick="sendtocart('<?php echo $data['id_produk'] ?>');">
                               </div>
                           </form>
                       </div>
                       <?php else : ?>
                       <div class="clm-12 np" id="<?php echo "buttontocart".$a ?>" style="">
                           <button class="btn btn-green produkbutton" id="<?php echo "produk".$a; ?>" onmousemove="todologin('<?php echo $a; ?>')" onmouseout="showprice('<?php echo $a; ?>', '<?php echo $price ?>')" onclick="showtodologin()"><?php echo "Rp. ".number_format($data['harga_produk'],2,",",".") ?></button>
                       </div>
                       <?php endif ?>
                   </div>
                   <div class="clm-12">
                       <a href="?page=shop&&subpage=detailproduk&&produk=<?php echo $data['id_produk'] ?>"><button class="btn" style="background-color:#1e1e1e; border-color:white; color:white">Detail</button></a>
                   </div>
                </div>
            </div>
        <?php 
            endforeach;
            else :
        ?>
        <div class="clm-12" style="height:510px; text-align:center">
            <p>Kategori Kosong.</p>       
        </div>
        <?php endif ?>
    <?php
    }
    
    function tampilaccountsettings($data){
        $this->callmodel();
        
        $model = new model;
        $id = $data;
        $tampilProfile = $model->select2TableWhere("customer", "customer_nama", "customer.id_customer = customer_nama.id_customer", "customer.id_customer = '$id'");
        return $tampilProfile;
    }
    
    function proseseditaccountsettings($data){
        $idcustomer = $data['idcustomer'];
        $namadepan = $data['namadepan'];
        $namabelakang = $data['namabelakang'];
        $namalengkap = $namadepan." ".$namabelakang;
        $email = $data['email'];
        $telepon = $data['telepon'];
        $alamat = $data['alamat'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilProfile = $model->updateWhere("customer", "nama_customer = '$namalengkap', email_customer = '$email', telepon_customer = '$telepon', alamat_customer = '$alamat'", "id_customer = '$idcustomer'");
        
    }
    
    function prosestambahkeranjang($data){
        $idproduk = $data['idproduk'];
        $quantity = $data['quantity'];
        $idcustomer = $_SESSION['usercustomer_id'];
        $tanggaladdproduk = date("y-m-d");
        
        $this->callmodel();
        
        $model = new model;
        
        $a = $model->selectWhere("customer_keranjang", "id_customer = '$idcustomer' and id_produk = '$idproduk' and status_transaksi = 'no'");
            
        $stokbaru = $a[0]['quantity'] + $quantity;
        if($a != null){
            $model->updateWhere("customer_keranjang", "quantity = '$stokbaru'", "id_customer = '$idcustomer' and id_produk = '$idproduk' and status_transaksi = 'no'");
        }
        else{
            $model->insert("customer_keranjang", "'','$idcustomer', '$idproduk', '$quantity', '$tanggaladdproduk', 'no'");   
        }
    }
    
    function tampilKeranjang(){
        $idcustomer = $_SESSION['usercustomer_id'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilKeranjang = $model->select3TableWhere("customer_keranjang", "customer", "produk", "customer_keranjang.id_customer = customer.id_customer", "customer_keranjang.id_produk = produk.id_produk", "customer_keranjang.id_customer = '$idcustomer' and customer_keranjang.status_transaksi = 'no'");
    
        return $tampilKeranjang;
    }
    
    function refreshKeranjang(){
        $idcustomer = $_SESSION['usercustomer_id'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilKeranjang = $model->select3TableWhere("customer_keranjang", "customer", "produk", "customer_keranjang.id_customer = customer.id_customer", "customer_keranjang.id_produk = produk.id_produk", "customer_keranjang.id_customer = '$idcustomer' and customer_keranjang.status_transaksi = 'no'");
        ?>
        <div class="clm-12 np" style="overflow-y:auto; height:250px">
            <?php $totalquantity = 0; $totalharga = 0 ?> 
            <?php foreach($tampilKeranjang as $keranjang) :?>
            <div class="clm-12" style="padding:3px 2px">
                <table class="table" style="color:white; background-color:#282828">
                    <tr>
                        <td rowspan="2" style="width:90px"><img src="data/data-produk/<?php echo $keranjang['id_produk']; ?>/<?php echo $keranjang['id_produk'] ?>-cover.jpg" style="height:100px; width:80px"></td>
                        <td style="width:70%"><?php echo $keranjang['nama_produk']?></td>
                        <td style="font-size:30">x<?php echo $keranjang['quantity'] ?></td>
                        <td style="width:10%"><button class="btn cancelcart" onclick="deleteCart('<?php echo $keranjang['id'] ?>')">X</button></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if($keranjang['quantity'] > 1) {
                                    echo "Rp. ".number_format($keranjang['harga_produk']*$keranjang['quantity'], 2,",",".")."<br>";
                                    echo "(Rp. ".number_format($keranjang['harga_produk'], 2,",",".")."/pcs)";
                                }else{
                                    echo "Rp. ".number_format($keranjang['harga_produk']*$keranjang['quantity'], 2,",",".");
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <?php $totalquantity = $totalquantity + $keranjang['quantity']; $totalharga = $totalharga + $keranjang['harga_produk']*$keranjang['quantity'] ?>
            <?php endforeach ?>
            
        </div>
         <div class="clm-12" style="height:50px">
            <div class="clm-1">
                <p style="font-size:20"><?php echo $totalquantity ?></p>
                <p style="font-size:15">Pcs</p>
            </div>
            <div class="clm-7">
                <p style="font-size:15">Total Price</p>
                <p style="font-size:20"><?php echo "Rp. ".number_format($totalharga, 2, ",",".") ?></p>
            </div>
             <div class="clm-4">
                 <a href="submit.php?prosespembelian"><button class="btn btn-green">Konfirmasi Pembelian</button></a>
            </div>
            <div class="clm-12">
                <a href="?page=home&&subpage=keranjang" style="color:white">>> Show Detail</a>
            </div>
         </div>
    <?php
    }
    
    function deleteCart($id){
        $this->callmodel();
        
        $model = new model;
        
        return $model->delete("customer_keranjang", "id = '$id'");
        
    }
    
    function prosespembelian($data){
        date_default_timezone_set("Asia/Jakarta");
        $idcustomer = $data['idcustomer'];
        $waktupembelian = date("y-m-d H:i:s");
        $deadlinetransaksi = date("y-m-d H:i:s", strtotime($waktupembelian)+"10800");
        
        $this->callmodel();
        
        $model = new model;
        $ambilkeranjang = $model->selectWhere("customer_keranjang", "id_customer = '$idcustomer' and status_transaksi = 'no' ");
        
        
        if($ambilkeranjang != null){
            $produk_di_keranjang = $model->selectWhere("customer_keranjang", "id_customer = '$idcustomer' and status_transaksi = 'no'");
            foreach($produk_di_keranjang as $data){
                $idproduk = $data['id_produk'];
                $quantity = $data['quantity'];
                $model->updateWhere("produk", "stok_produk = stok_produk-$quantity", "id_produk = '$idproduk'");
            }
            
            $model->insert("transaksi", "'','$idcustomer', '$waktupembelian', 'Menunggu Pembayaran...', '', '', ''");
            $transaksi = $model->selectOrderBy("transaksi", "id_transaksi desc limit 1");
            $id = $transaksi[0]['id_transaksi'];
            foreach($ambilkeranjang as $data) {
                $keranjang = $data['id'];
                $model->insert("transaksi_detail", "'','$id', '$keranjang'");
                $model->updateWhere("customer_keranjang", "status_transaksi = 'yes'", "id = '$keranjang'");
            }
            
            $model->createEvent("deadline_".$id, $deadlinetransaksi, "update transaksi set status = 'Gagal, Uang tidak dikirim' where id_transaksi = '$id'");
        }else{
            return "keranjang kosong";
        }
    }
    
    function tampilTransaksi(){
        $idcustomer = $_SESSION['usercustomer_id'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilTransaksi = $model->selectWhere("transaksi", "transaksi.id_customer = '$idcustomer'");
    
        return $tampilTransaksi;
    }
    
    function tampilTransaksiDetail(){
        $idtransaksi = $_GET['idtransaksi'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilTransaksiDetail = $model->selectWhere("transaksi","transaksi.id_transaksi = '$idtransaksi'");
    
        return $tampilTransaksiDetail;
    }
    function tampilTransaksiProdukDetail(){
        $idtransaksi = $_GET['idtransaksi'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilTransaksiDetail = $model->select3TableWhere("transaksi_detail", "customer_keranjang", "produk", "transaksi_detail.id_keranjang = customer_keranjang.id", "customer_keranjang.id_produk = produk.id_produk", "transaksi_detail.id_transaksi = '$idtransaksi'");
    
        return $tampilTransaksiDetail;
    }
    
    function prosespembayaran($data){
        
        $customer = $_SESSION['usercustomer'];
        $idtransaksi = $data['idtransaksi'];
        $atasnama = $data['atasnama'];
        $bank = $data['bank'];
        $tmpbuktitransfer = $data['tmpbuktitransfer'];
        
        $this->callmodel();
        $model = new model;
        
        $tampilTransaksiDetail = $model->select3TableWhere("transaksi_detail", "customer_keranjang", "produk", "transaksi_detail.id_keranjang = customer_keranjang.id", "customer_keranjang.id_produk = produk.id_produk", "transaksi_detail.id_transaksi = '$idtransaksi'");
        
        $JumlahTransfer = 0;
        
        foreach($tampilTransaksiDetail as $data) {
            $JumlahTransfer = $JumlahTransfer + $data['harga_produk'] * $data['quantity'];
        }
        
        $prosesPembayaran = $model->updateWhere("transaksi", "atasnama_transaksi = '$atasnama', bank_transaksi = '$bank', status = 'Sedang Diproses...', jumlah_transfer = '$JumlahTransfer'", "id_transaksi = '$idtransaksi' ");
        
        $tempdir = "data/data-customer/".$customer."/";
        
        if(!file_exists($tempdir)){
            mkdir($tempdir);
        }
        
        $buktitransaksi = $tempdir.$customer."-buktitransaksi-".$idtransaksi.".jpg";
        move_uploaded_file($tmpbuktitransfer, $buktitransaksi);
    }
    
    function tampilProdukDetail(){
        $idproduk = $_GET['produk'];
        
        $this->callmodel();
        
        $model = new model;
        $tampilProdukDetail = $model->select2TableWhere("produk", "kategori", "produk.kategori_produk = kategori.id_kategori", "produk.id_produk = '$idproduk'");
    
        return $tampilProdukDetail;
    }
    
    function tampilDaftarKategori(){
        $this->callmodel();
        
        $model = new model;
        $tampilDaftarKategori = $model->select("kategori");
        return $tampilDaftarKategori;
    }
}

?>