<?php
require "controller/hak_akses_controller.php";
require "controller/pengguna_controller.php";
require "controller/barang_controller.php";
require "controller/pembelian_controller.php";
require "controller/penjualan_controller.php";
require "controller/supplier_controller.php";
require "controller/customer_controller.php";

// HAK AKSES
if(isset($_POST['hak-akses-add-submit'])){
    $hakAksesController = new HakAksesController;
    $data = array(
            'nama_akses' => $_POST['nama_akses'],
            'keterangan' => $_POST['keterangan'],
    );
    
    $hakAksesController->hak_akses_add_submit($data);
    
    echo "<script>alert('Tambah Hak Akses Berhasil'); location.href='admin.php?page=hak-akses&&subpage=hak-akses-list'</script>";
}

if(isset($_GET['hak-akses-edit'])){
    $id = $_GET['hak-akses-edit'];
    echo "<script> location.href='admin.php?page=hak-akses&subpage=hak-akses-detail&id=".$id."'</script>";
}

if(isset($_POST['hak-akses-edit-submit'])){
    $hakAksesController = new HakAksesController;
    $data = array(
            'id_akses' => $_POST['id_akses'],
            'nama_akses' => $_POST['nama_akses'],
            'keterangan' => $_POST['keterangan'],
    );
    
    $hakAksesController->hak_akses_edit_submit($data);
    
    echo "<script>alert('Edit Hak Akses Berhasil');  location.href='admin.php?page=hak-akses&&subpage=hak-akses-list'</script>";
}

if(isset($_GET['hak-akses-delete'])){
    $data = array(
        'id_akses' => $_GET['hak-akses-delete']
    );
    $hakAksesController= new HakAksesController;
    $hakAksesController->hak_akses_delete_submit($data);
    echo "<script>alert('Delete Hak Akses Berhasil');  location.href='admin.php?page=hak-akses&&subpage=hak-akses-list'</script>";
}

// PENGGUNA
if(isset($_POST['pengguna-add-submit'])){
    $penggunaController = new PenggunaController;
    $data = array(
            'nama_pengguna' => $_POST['nama_pengguna'],
            'password' => $_POST['password'],
            'nama_depan' => $_POST['nama_depan'],
            'nama_belakang' => $_POST['nama_belakang'],
            'no_hp' => $_POST['no_hp'],
            'alamat' => $_POST['alamat'],
            'id_akses' => $_POST['id_akses'],
    );
    
    $penggunaController->pengguna_add_submit($data);
    
    echo "<script>alert('Tambah Pengguna Berhasil'); location.href='admin.php?page=pengguna&&subpage=pengguna-list'</script>";
}

if(isset($_GET['pengguna-edit'])){
    $id = $_GET['pengguna-edit'];
    echo "<script> location.href='admin.php?page=pengguna&subpage=pengguna-detail&id=".$id."'</script>";
}

if(isset($_POST['pengguna-edit-submit'])){
    $penggunaController = new PenggunaController;
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
    
    $penggunaController->pengguna_edit_submit($data);
    
    echo "<script>alert('Edit Pengguna Berhasil');  location.href='admin.php?page=pengguna&&subpage=pengguna-list'</script>";
}

if(isset($_GET['pengguna-delete'])){
    $data = array(
        'id_pengguna' => $_GET['pengguna-delete']
    );
    $penggunaController = new PenggunaController;
    $penggunaController->pengguna_delete_submit($data);
    echo "<script>alert('Delete Pengguna Berhasil');  location.href='admin.php?page=pengguna&&subpage=pengguna-list'</script>";
}

// BARANG
if(isset($_POST['barang-add-submit'])){
    $barangController = new BarangController;
    $data = array(
            'nama_barang' => $_POST['nama_barang'],
            'keterangan' => $_POST['keterangan'],
            'satuan' => $_POST['satuan']
    );
    
    $barangController->barang_add_submit($data);
    
    echo "<script>alert('Tambah Barang Berhasil'); location.href='admin.php?page=barang&&subpage=barang-list'</script>";
}

if(isset($_GET['barang-edit'])){
    $id = $_GET['barang-edit'];
    echo "<script> location.href='admin.php?page=barang&subpage=barang-detail&id=".$id."'</script>";
}

if(isset($_POST['barang-edit-submit'])){
    $barangController = new BarangController;
    $data = array(
            'id_barang' => $_POST['id_barang'],
            'nama_barang' => $_POST['nama_barang'],
            'keterangan' => $_POST['keterangan'],
            'satuan' => $_POST['satuan']
    );
    
    $barangController->barang_edit_submit($data);
    
    echo "<script>alert('Edit Barang Berhasil');  location.href='admin.php?page=barang&&subpage=barang-list'</script>";
}

if(isset($_GET['barang-delete'])){
    $data = array(
        'id_barang' => $_GET['barang-delete']
    );
    $barangController = new BarangController;
    $barangController->barang_delete_submit($data);
    echo "<script>alert('Delete Barang Berhasil');  location.href='admin.php?page=barang&&subpage=barang-list'</script>";
}

// PEMBELIAN
if(isset($_POST['pembelian-add-submit'])){
    $pembelianController = new PembelianController;
    $data = array(
            'jumlah_pembelian' => $_POST['jumlah_pembelian'],
            'harga_beli' => $_POST['harga_beli'],
            'id_barang' => $_POST['id_barang'],
            'id_supplier' => $_POST['id_supplier']
    );
    
    $pembelianController->pembelian_add_submit($data);
    
    echo "<script>alert('Tambah Pembelian Berhasil'); location.href='admin.php?page=pembelian&&subpage=pembelian-list'</script>";
}

if(isset($_GET['pembelian-edit'])){
    $id = $_GET['pembelian-edit'];
    echo "<script> location.href='admin.php?page=pembelian&subpage=pembelian-detail&id=".$id."'</script>";
}

if(isset($_POST['pembelian-edit-submit'])){
    $pembelianController = new PembelianController;
    $data = array(
        'id_pembelian' => $_POST['id_pembelian'],
        'jumlah_pembelian' => $_POST['jumlah_pembelian'],
        'harga_beli' => $_POST['harga_beli'],
        'id_barang' => $_POST['id_barang'],
        'id_supplier' => $_POST['id_supplier']
    );
    
    $pembelianController->pembelian_edit($data);
    
    echo "<script>alert('Edit Pembelian Berhasil');  location.href='admin.php?page=pembelian&&subpage=pembelian-list'</script>";
}

if(isset($_GET['pembelian-delete'])){
    $data = array(
        'id_pembelian' => $_GET['pembelian-delete']
    );
    $pembelianController = new PembelianController;
    $pembelianController->pembelian_delete_submit($data);
    echo "<script>alert('Delete Pembelian Berhasil');  location.href='admin.php?page=pembelian&&subpage=pembelian-list'</script>";
}

// PENJUALAN
if(isset($_POST['penjualan-add-submit'])){
    $penjualanController = new PenjualanController;
    $data = array(
            'jumlah_penjualan' => $_POST['jumlah_penjualan'],
            'harga_jual' => $_POST['harga_jual'],
            'id_barang' => $_POST['id_barang'],
            'id_customer' => $_POST['id_customer']
    );
    
    $penjualanController->penjualan_add_submit($data);
    
    echo "<script>alert('Tambah Penjualan Berhasil'); location.href='admin.php?page=penjualan&&subpage=penjualan-list'</script>";
}

if(isset($_GET['penjualan-edit'])){
    $id = $_GET['penjualan-edit'];
    echo "<script> location.href='admin.php?page=penjualan&subpage=penjualan-detail&id=".$id."'</script>";
}

if(isset($_POST['penjualan-edit-submit'])){
    $penjualanController = new PenjualanController;
    $data = array(
        'id_penjualan' => $_POST['id_penjualan'],
        'jumlah_penjualan' => $_POST['jumlah_penjualan'],
        'harga_jual' => $_POST['harga_jual'],
        'id_barang' => $_POST['id_barang'],
        'id_customer' => $_POST['id_customer']
    );
    
    $penjualanController->penjualan_edit_submit($data);
    
    echo "<script>alert('Edit Penjualan Berhasil');  location.href='admin.php?page=penjualan&&subpage=penjualan-list'</script>";
}

if(isset($_GET['penjualan-delete'])){
    $data = array(
        'id_penjualan' => $_GET['penjualan-delete']
    );
    $penjualanController = new PenjualanController;
    $penjualanController->penjualan_delete_submit($data);
    echo "<script>alert('Delete Penjualan Berhasil');  location.href='admin.php?page=penjualan&&subpage=penjualan-list'</script>";
}


// SUPPLIER
if (isset($_POST['supplier-add-submit'])) {
    $supplierController = new SupplierController;
    $data = array(
        'nama_supplier' => $_POST['nama_supplier'],
        'no_hp_supplier' => $_POST['no_hp_supplier'],
        'alamat_supplier' => $_POST['alamat_supplier']
    );

    $supplierController->supplier_add_submit($data);

    echo "<script>alert('Tambah Supplier Berhasil'); location.href='admin.php?page=supplier&&subpage=supplier-list'</script>";
}

if(isset($_GET['supplier-edit'])){
    $id = $_GET['supplier-edit'];
    echo "<script> location.href='admin.php?page=supplier&subpage=supplier-detail&id=".$id."'</script>";
}

if(isset($_POST['supplier-edit-submit'])){
    $supplierController = new SupplierController;
    $data = array(
        'id_supplier' => $_POST['id_supplier'],
        'nama_supplier' => $_POST['nama_supplier'],
        'no_hp_supplier' => $_POST['no_hp_supplier'],
        'alamat_supplier' => $_POST['alamat_supplier']
    );
    
    $supplierController->supplier_edit_submit($data);
    
    echo "<script>alert('Edit Supplier Berhasil');  location.href='admin.php?page=supplier&&subpage=supplier-list'</script>";
}

if(isset($_GET['supplier-delete'])){
    $data = array(
        'id_supplier' => $_GET['supplier-delete']
    );
    $supplierController = new SupplierController;
    $supplierController->supplier_delete_submit($data);
    echo "<script>alert('Delete Supplier Berhasil');  location.href='admin.php?page=supplier&&subpage=supplier-list'</script>";
}


// CUSTOMER
if (isset($_POST['customer-add-submit'])) {
    $customerController = new customerController;
    $data = array(
        'nama_customer' => $_POST['nama_customer'],
        'no_hp_customer' => $_POST['no_hp_customer'],
        'alamat_customer' => $_POST['alamat_customer']
    );

    $customerController->customer_add_submit($data);

    echo "<script>alert('Tambah Customer Berhasil'); location.href='admin.php?page=customer&&subpage=customer-list'</script>";
}

if(isset($_GET['customer-edit'])){
    $id = $_GET['customer-edit'];
    echo "<script> location.href='admin.php?page=customer&subpage=customer-detail&id=".$id."'</script>";
}

if(isset($_POST['customer-edit-submit'])){
    $customerController = new CustomerController;
    $data = array(
        'id_customer' => $_POST['id_customer'],
        'nama_customer' => $_POST['nama_customer'],
        'no_hp_customer' => $_POST['no_hp_customer'],
        'alamat_customer' => $_POST['alamat_customer']
    );
    
    $customerController->customer_edit_submit($data);
    
    echo "<script>alert('Edit Customer Berhasil');  location.href='admin.php?page=customer&&subpage=customer-list'</script>";
}

if(isset($_GET['customer-delete'])){
    $data = array(
        'id_customer' => $_GET['customer-delete']
    );
    $customerController = new CustomerController;
    $customerController->customer_delete_submit($data);
    echo "<script>alert('Delete Customer Berhasil');  location.href='admin.php?page=customer&&subpage=customer-list'</script>";
}