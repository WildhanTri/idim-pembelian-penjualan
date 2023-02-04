<?php
require "controller/gamestore/gamestorecontroller.php";

if(isset($_POST['tambahproduk'])){
    $data = array(
            'kodeproduk' => $_POST['kodeproduk'],
            'namaproduk' => $_POST['namaproduk'],
            'kategoriproduk' => $_POST['kategoriproduk'],
            'hargaproduk' => $_POST['hargaproduk'],
            'deskripsiproduk' => $_POST['deskripsiproduk'],
            'stokproduk' => $_POST['stokproduk'],
            'namacoverproduk' => $_FILES['coverproduk']['name'],
            'tmpcoverproduk' => $_FILES['coverproduk']['tmp_name'],
            'namagambarproduk' => $_FILES['gambarproduk']['name'],
            'tmpgambarproduk' => $_FILES['gambarproduk']['tmp_name'],
    );
            
    $gamestore = new gamestore;
    $gamestore->tambahproduk($data);
    
    echo "<script>alert('Tambah Produk Berhasil'); location.href='admin.php?page=menubarang&&subpage=daftarbarang'</script>";
}

if(isset($_GET['hak-akses-edit'])){
    $id = $_GET['editproduk'];
    echo "<script> location.href='admin.php?page=menubarang&&subpage=editbarang&&id=".$id."'</script>";
}


if(isset($_POST['hak-akses-add'])){
    $data = array(
            'kodeproduk' => $_POST['kodeproduk'],
            'namaproduk' => $_POST['namaproduk'],
            'kategoriproduk' => $_POST['kategoriproduk'],
            'hargaproduk' => $_POST['hargaproduk'],
            'deskripsiproduk' => $_POST['deskripsiproduk'],
            'stokproduk' => $_POST['stokproduk'],
            'namacoverproduk' => $_FILES['coverproduk']['name'],
            'tmpcoverproduk' => $_FILES['coverproduk']['tmp_name'],
            'namagambarproduk' => $_FILES['gambarproduk']['name'],
            'tmpgambarproduk' => $_FILES['gambarproduk']['tmp_name'],
    );
            
    $gamestore = new gamestore;
    $gamestore->tambahproduk($data);
    
    echo "<script>alert('Tambah Produk Berhasil'); location.href='admin.php?page=menubarang&&subpage=daftarbarang'</script>";
}

if(isset($_GET['edithakakses'])){
    $id = $_GET['edithakakses'];
    echo "<script> location.href='admin.php?page=menubarang&&subpage=editbarang&&id=".$id."'</script>";
}

if(isset($_POST['submiteditproduk'])){
    $gamestore = new gamestore;
    $idgambar = $gamestore->cb1();
    $data = array(
            'idproduk' => $_POST['idproduk'],
            'namaproduk' => $_POST['namaproduk'],
            'kategoriproduk' => $_POST['kategoriproduk'],
            'hargaproduk' => $_POST['hargaproduk'],
            'deskripsiproduk' => $_POST['deskripsiproduk'],
            'stokproduk' => $_POST['stokproduk'],
            'coverproduk' => $_FILES['coverproduk']['name'],
            'tmpcoverproduk' => $_FILES['coverproduk']['tmp_name'],
            'gambarproduk' => $_FILES['gambarproduk']['name'],
            'tmpgambarproduk' => $_FILES['gambarproduk']['tmp_name'],
            
    );
    if(isset($_POST['oldgambarproduk'])){
        $data['oldgambarproduk'] = $_POST['oldgambarproduk'];
    }
    if(isset($_POST['deleteoldgambarproduk'])){
        $data['deleteoldgambarproduk'] = $_POST['deleteoldgambarproduk'];
    }
    
    $gamestore->proseseditproduk($data);
    
    echo "<script> location.href='admin.php?page=menubarang&&subpage=editbarang&&id=".$data['idproduk']."'</script>";
}

if(isset($_GET['refreshdaftarbarang'])){
    $gamestore= new gamestore;
    $daftarbarang = $gamestore->daftarbarang();
    
    ?>
        <h1>Daftar Barang</h1>
            <p style="margin-top:10px;">* Klik 2x stok produk untuk mengubah stok</p>
            <input type="hidden" id="totalcheck" value="0"/>
            <table class="table table-lite" style="margin-top:10px">
                <?php if($daftarbarang != null) : ?>
                <thead>
                    <td></td>
                    <td>No</td>
                    <td>Nama Produk</td>
                    <td>Kategori Produk</td>
                    <td>Date added</td>
                    <td>Harga Produk</td>
                    <td>Stok Produk</td>
                    <td></td>
                </thead>
                
                <?php $no=1; foreach ($daftarbarang as  $barang) : ?>
                <tr>
                    <td><input type="checkbox" value="<?php echo $barang['id_produk'] ?>" name="produk[]" onclick="checkboxes()"></td>
                    <td><?php echo $no; $no++ ?></td>
                    <td style="width:200px"><?php echo $barang['nama_produk'] ?></td>
                    <td><?php echo $barang['nama_kategori'] ?></td>
                    <td><?php echo $barang['date_added'] ?></td>
                    <td><?php echo $barang['harga_produk'] ?></td>
                    <td ondblclick="tampilUbahStok('<?php echo $barang['id_produk'] ?>')" style="width:50px; text-align:center">
                        <p id="stok<?php echo $barang['id_produk'] ?>"><?php echo $barang['stok_produk'] ?></p>
                        <input type="text" value="<?php echo $barang['stok_produk'] ?>" id="stokinput<?php echo $barang['id_produk'] ?>" class="input" style="display:none">
                    </td>
                    <td>
                        <div class="clm-6 np-y" style="padding-right:0px;">
                            <a href="submit.php?editproduk=<?php echo $barang['id_produk'] ?>"><button class="btn btn-green">Edit</button></a>
                        </div>
                        <div class="clm-6 np-y">
                            <a href="submit.php?deleteproduk=<?php echo $barang['id_produk'] ?>"><button class="btn btn-red">Hapus</button></a>
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
    <?php
}

if(isset($_GET{'ubahstok'})){
    $data = array(
        'idproduk' => $_POST['target'],
        'stok' => $_POST['stok']
    );
    
    $gamestore = new gamestore;
    
    $gamestore->prosesubahstokproduk($data);
}

if(isset($_GET['deleteproduk'])){
    $data = array(
        'idproduk' => $_GET['deleteproduk']
    );
    $gamestore= new gamestore;
    $gamestore->prosesdeleteproduk($data);
    echo "<script> location.href='admin.php?page=menubarang&&subpage=daftarbarang'</script>";
}

if(isset($_GET['deletemultiproduk'])){
    $kumpulanidproduk = $_POST['idproduk'];
    $idproduk = rtrim($kumpulanidproduk, '|');
    $data = explode("|",$idproduk);
    
    $gamestore= new gamestore;
    $gamestore->prosesdeletemultiproduk($data);
}

if(isset($_POST['tambahpetugas'])){
    $data = array(
            'noidentitas' => $_POST['noidentitas'],
            'namapetugas' => $_POST['namapetugas'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'notelepon' => $_POST['notelepon'],
            'alamat' => $_POST['alamat']
    );
            
    $gamestore = new gamestore;
    $gamestore->tambahpetugas($data);
    
    echo "<script>alert('Tambah Petugas Berhasil'); location.href='admin.php?page=petugas&&subpage=petugas'</script>";
}

if(isset($_GET['editproduk'])){
    $id = $_GET['editproduk'];
    echo "<script> location.href='admin.php?page=menubarang&&subpage=editbarang&&id=".$id."'</script>";
}

if(isset($_POST['loginadmin'])){
    $data = array (
        'username' => $_POST['username'],
        'password' => $_POST['password'],
    );
    $gamestore = new gamestore;
    $login = $gamestore->proseslogin($data);
    
    if($login == "berhasil"){
        echo "<script> location.href='admin.php?page=home&&subpage=dashboard'</script>";
    }
    else {
        echo "<script> location.href='admin.php?page=login&&subpage=loginadmin'</script>";
    }
}

if(isset($_GET['logoutadmin'])){
    unset($_SESSION['user']);
    echo "<script> location.href='admin.php?page=login'</script>";
}

if(isset($_GET['konfirmasipembayaran'])){
    $data = array(
            'idtransaksi' => $_GET['konfirmasipembayaran'],
    );
    
    $gamestore = new gamestore;
    $gamestore->proseskonfirmasipembayaran($data);
    
    echo "<script> location.href='http://localhost/gamestore/admin.php?page=transaksi&&subpage=transaksi'</script>";
}

if(isset($_POST['submiteditpetugas'])){
    $data = array(
            'noidentitaslama' => $_GET['idpetugas'],
            'noidentitasbaru' => $_POST['noidentitas'],
            'namalengkap' => $_POST['namapetugas'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'notelepon' => $_POST['notelepon'],
            'alamat' => $_POST['alamat']
    );
    
    $gamestore = new gamestore;
    $gamestore->proseseditpetugas($data);
    
    echo "<script> location.href='http://localhost/gamestore/admin.php?page=petugas&&subpage=detailpetugas&&idpetugas=".$_POST['noidentitas']."'</script>";
}

if(isset($_GET['alllog'])){
    $gamestore = new gamestore;
    $gamestore->allLog();
}

if(isset($_GET['mylog'])){
    $gamestore = new gamestore;
    $gamestore->myLog();
}

if(isset($_GET['pecatpetugas'])){
    $id = $_GET['pecatpetugas'];
    $gamestore = new gamestore;
    $gamestore->pecatpetugas($id);
    
    echo "<script>location.href='http://localhost/gamestore/admin.php?page=petugas&&subpage=petugas'</script>";
}

if(isset($_GET{'ubahkategori'})){
    $data = array(
        'idkategori' => $_POST['target'],
        'namakategori' => $_POST['kategori']
    );
    
    $gamestore = new gamestore;
    
    $gamestore->prosesubahkategori($data);
}

if(isset($_GET['refreshdaftarkategori'])){
    $gamestore= new gamestore;
    $daftarkategori = $gamestore->tampilDaftarKategori();
    
    ?>
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
                            <a href="submit.php?deleteproduk=<?php echo $data['id_kategori'] ?>"><button class="btn btn-red">Hapus</button></a>
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
    <?php
}

if(isset($_POST['tambahkategori'])){
    $data = array(
            'namakategori' => $_POST['namakategori']
    );
            
    $gamestore = new gamestore;
    $gamestore->prosestambahkategori($data);
    
    echo "<script>alert('Tambah Kategori Berhasil'); location.href='admin.php?page=kategori&&subpage=daftarkategori'</script>";
}

if(isset($_GET['deletekategori'])){
    $data = array(
            'idkategori' => $_GET['deletekategori']
    );
            
    $gamestore = new gamestore;
    $gamestore->prosesdeletekategori($data);
    
    echo "<script>alert('Hapus Kategori Berhasil'); location.href='admin.php?page=kategori&&subpage=daftarkategori'</script>";
}

////////////////public////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['register'])){
    $data = array(
        "namadepan" => $_POST['namadepan'],
        "namabelakang" => $_POST['namabelakang'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "email" => $_POST['email']
    );
    
    $gamestore = new gamestore;
    
    $register = $gamestore->register($data);
    
    echo "<script>location.href='home.php?page=home&&subpage=home'</script>";
}

if(isset($_POST['logincustomer'])){
    $data = array(
        "username" => $_POST['username'],
        "password" => $_POST['password']
    );
    
    $gamestore = new gamestore;
    
    $login = $gamestore->proseslogincustomer($data);
    
    if($login == "berhasil"){
        echo "<script> location.href='home.php?page=home&&subpage=home'</script>";
    }
    else {
        echo "<script> alert('Username Atau Password Salah'); history.back()</script>";
    }
}

if(isset($_POST['submitaccountsettings'])){
    $data = array(
            'idcustomer' => $_POST['idcustomer'],
            'namadepan' => $_POST['namadepan'],
            'namabelakang' => $_POST['namabelakang'],
            'email' => $_POST['email'],
            'telepon' => $_POST['telepon'],
            'alamat' => $_POST['alamat']
    );
    
    $gamestore = new gamestore;
    $gamestore->proseseditaccountsettings($data);
    
    echo "<script> location.href='http://localhost/gamestore/home.php?page=accountsettings&&subpage=accountsettings'</script>";
}

if(isset($_GET['prosespembelian'])){
    $data = array(
            'idcustomer' => $_SESSION['usercustomer_id']
    );
    
    $gamestore = new gamestore;
    $prosespembelian = $gamestore->prosespembelian($data);
    
    
    if($prosespembelian != "keranjang kosong"){
        echo "<script> location.href='http://localhost/gamestore/home.php?page=shop&&subpage=catalog'</script>";
    }else{
        echo "<script> alert('keranjang kosong'); location.href='http://localhost/gamestore/home.php?page=shop&&subpage=catalog'</script>";
    }
    
}

if(isset($_GET['prosespembayaran'])){
    $data = array(
            'idtransaksi' => $_GET['prosespembayaran'],
            'atasnama' => $_POST['atasnama'],
            'bank' => $_POST['bank'],
            'tmpbuktitransfer' => $_FILES['buktitransfer']['tmp_name']
    );
    
    $gamestore = new gamestore;
    $gamestore->prosespembayaran($data);
    
    echo "<script> location.href='http://localhost/gamestore/home.php?page=home&&subpage=transaksi&&idtransaksi=".$_GET['prosespembayaran']."'</script>";
}

if(isset($_GET['sendtocart'])){
    $data = array(
            'idproduk' => $_POST['idproduk'],
            'quantity' => $_POST['quantity']
    );
    
    $gamestore = new gamestore;
    $gamestore->prosestambahkeranjang($data);
}

if(isset($_GET['refreshcart'])){
    $gamestore = new gamestore;
    $gamestore->refreshKeranjang();
}

if(isset($_GET['searchproduk'])){
    $gamestore = new gamestore;
    $gamestore->searchProduk($_GET['searchproduk']);
}

if(isset($_GET['resetcatalog'])){
    $gamestore = new gamestore;
    $gamestore->resetCatalog();
}

if(isset($_GET['selectkategori'])){
    $gamestore = new gamestore;
    $gamestore->selectkategori($_GET['selectkategori']);
}

if(isset($_GET['deletecart'])){
    $id = $_GET['deletecart'];
    
    $gamestore = new gamestore;
    $gamestore->deleteCart($id);
}


if(isset($_GET['logoutcustomer'])){
    unset($_SESSION['usercustomer']);
    unset($_SESSION['usercustomer_id']);
    unset($_SESSION['usercustomer_name']);
    echo "<script> location.href='home.php'</script>";
}
?>