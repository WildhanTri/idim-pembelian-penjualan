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

// HAK AKSES
if(isset($_POST['hak-akses-add-submit'])){
    $gamestore = new gamestore;
    $data = array(
            'nama_akses' => $_POST['nama_akses'],
            'keterangan' => $_POST['keterangan'],
    );
    
    $gamestore->hak_akses_add_submit($data);
    
    echo "<script>alert('Tambah Hak Akses Berhasil'); location.href='admin.php?page=hak-akses&&subpage=hak-akses-list'</script>";
}

if(isset($_GET['hak-akses-edit'])){
    $id = $_GET['hak-akses-edit'];
    echo "<script> location.href='admin.php?page=hak-akses&subpage=hak-akses-detail&id=".$id."'</script>";
}

if(isset($_POST['hak-akses-edit-submit'])){
    $gamestore = new gamestore;
    $data = array(
            'id_akses' => $_POST['id_akses'],
            'nama_akses' => $_POST['nama_akses'],
            'keterangan' => $_POST['keterangan'],
    );
    
    $gamestore->hak_akses_edit_submit($data);
    
    echo "<script>alert('Edit Hak Akses Berhasil');  location.href='admin.php?page=hak-akses&&subpage=hak-akses-list'</script>";
}

if(isset($_GET['hak-akses-delete'])){
    $data = array(
        'id_akses' => $_GET['hak-akses-delete']
    );
    $gamestore= new gamestore;
    $gamestore->hak_akses_delete_submit($data);
    echo "<script>alert('Delete Hak Akses Berhasil');  location.href='admin.php?page=hak-akses&&subpage=hak-akses-list'</script>";
}

// PENGGUNA
if(isset($_POST['pengguna-add-submit'])){
    $gamestore = new gamestore;
    $data = array(
            'nama_pengguna' => $_POST['nama_pengguna'],
            'password' => $_POST['password'],
            'nama_depan' => $_POST['nama_depan'],
            'nama_belakang' => $_POST['nama_belakang'],
            'no_hp' => $_POST['no_hp'],
            'alamat' => $_POST['alamat'],
            'id_akses' => $_POST['id_akses'],
    );
    
    $gamestore->pengguna_add_submit($data);
    
    echo "<script>alert('Tambah Pengguna Berhasil'); location.href='admin.php?page=pengguna&&subpage=pengguna-list'</script>";
}

if(isset($_GET['pengguna-edit'])){
    $id = $_GET['pengguna-edit'];
    echo "<script> location.href='admin.php?page=pengguna&subpage=pengguna-detail&id=".$id."'</script>";
}

if(isset($_POST['pengguna-edit-submit'])){
    $gamestore = new gamestore;
    $data = array(
            'id_pengguna' => $_POST['id_pengguna'],
            'nama_pengguna' => $_POST['nama_pengguna'],
            'password' => $_POST['password'],
            'nama_depan' => $_POST['nama_depan'],
            'nama_belakang' => $_POST['nama_belakang'],
            'no_hp' => $_POST['no_hp'],
            'alamat' => $_POST['alamat'],
            'id_akses' => $_POST['id_akses'],
    );
    
    $gamestore->pengguna_edit_submit($data);
    
    echo "<script>alert('Edit Pengguna Berhasil');  location.href='admin.php?page=pengguna&&subpage=pengguna-list'</script>";
}

if(isset($_GET['pengguna-delete'])){
    $data = array(
        'id_pengguna' => $_GET['pengguna-delete']
    );
    $gamestore= new gamestore;
    $gamestore->pengguna_delete_submit($data);
    echo "<script>alert('Delete Pengguna Berhasil');  location.href='admin.php?page=pengguna&&subpage=pengguna-list'</script>";
}

// BARANG
if(isset($_POST['barang-add-submit'])){
    $gamestore = new gamestore;
    $data = array(
            'nama_barang' => $_POST['nama_barang'],
            'keterangan' => $_POST['keterangan'],
            'satuan' => $_POST['satuan']
    );
    
    $gamestore->barang_add_submit($data);
    
    echo "<script>alert('Tambah Barang Berhasil'); location.href='admin.php?page=barang&&subpage=barang-list'</script>";
}

if(isset($_GET['barang-edit'])){
    $id = $_GET['barang-edit'];
    echo "<script> location.href='admin.php?page=barang&subpage=barang-detail&id=".$id."'</script>";
}

if(isset($_POST['barang-edit-submit'])){
    $gamestore = new gamestore;
    $data = array(
            'id_barang' => $_POST['id_barang'],
            'nama_barang' => $_POST['nama_barang'],
            'keterangan' => $_POST['keterangan'],
            'satuan' => $_POST['satuan']
    );
    
    $gamestore->barang_edit_submit($data);
    
    echo "<script>alert('Edit Barang Berhasil');  location.href='admin.php?page=barang&&subpage=barang-list'</script>";
}

if(isset($_GET['barang-delete'])){
    $data = array(
        'id_barang' => $_GET['barang-delete']
    );
    $gamestore= new gamestore;
    $gamestore->barang_delete_submit($data);
    echo "<script>alert('Delete Barang Berhasil');  location.href='admin.php?page=barang&&subpage=barang-list'</script>";
}

?>