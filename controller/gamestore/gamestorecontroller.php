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
   
    // HAK AKSES
    function hak_akses_list(){
        $this->callmodel();
        $model = new model;
        
        $hak_akses_list = $model->select("hak_akses");
        return $hak_akses_list;
    }
    
    function hak_akses_detail($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data;
        
        $hakAksesDetail = $model->selectWhere("hak_akses", "id_akses = '$data'");
        return $hakAksesDetail;
    }

    function hak_akses_add_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $nama_akses = $data['nama_akses'];
        $keterangan = $data['keterangan'];
        
        $model->insert("hak_akses", "null, '$nama_akses', '$keterangan'");
    }

    function hak_akses_edit_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_akses = $data['id_akses'];
        $nama_akses = $data['nama_akses'];
        $keterangan = $data['keterangan'];
        
        $model->updateWhere("hak_akses", "nama_akses = '$nama_akses', keterangan = '$keterangan'", "id_akses = '$id_akses'");
    }
    
    function hak_akses_delete_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_akses = $data['id_akses'];
        
        $delete = $model->delete("hak_akses", "id_akses = '$id_akses'");
        return $delete;
    }

    // PENGGUNA
    function pengguna_list(){
        $this->callmodel();
        $model = new model;
        
        $pengguna_list = $model->select("pengguna");
        return $pengguna_list;
    }
    
    function pengguna_detail($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data;
        
        $penggunaDetail = $model->selectWhere("pengguna", "id_pengguna = '$data'");
        return $penggunaDetail;
    }

    function pengguna_add_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $nama_pengguna = $data['nama_pengguna'];
        $password = $data['password'];
        $nama_depan = $data['nama_depan'];
        $nama_belakang = $data['nama_belakang'];
        $no_hp = $data['no_hp'];
        $alamat = $data['alamat'];
        $id_akses = $data['id_akses'];
        
        $model->insert("pengguna", "null, '$nama_pengguna', '$password', '$nama_depan', '$nama_belakang', '$no_hp', '$alamat', '$id_akses'");
    }

    function pengguna_edit_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_pengguna = $data['id_pengguna'];
        $nama_pengguna = $data['nama_pengguna'];
        $password = $data['password'];
        $nama_depan = $data['nama_depan'];
        $nama_belakang = $data['nama_belakang'];
        $no_hp = $data['no_hp'];
        $alamat = $data['alamat'];
        $id_akses = $data['id_akses'];
        
        $model->updateWhere("pengguna", "nama_pengguna = '$nama_pengguna', password = '$password', nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', no_hp = '$no_hp', alamat = '$alamat', id_akses = '$id_akses'", "id_pengguna = '$id_pengguna'");
    }
    
    function pengguna_delete_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_pengguna = $data['id_pengguna'];
        
        $delete = $model->delete("pengguna", "id_pengguna = '$id_pengguna'");
        return $delete;
    }
    
    // BARANG
    function barang_list(){
        $this->callmodel();
        $model = new model;
        
        $barang_list = $model->select("barang");
        return $barang_list;
    }
    
    function barang_detail($data){
        $this->callmodel();
        
        $model = new model;
        
        $id = $data;
        
        $barangDetail = $model->selectWhere("barang", "id_barang = '$data'");
        return $barangDetail;
    }

    function barang_add_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $nama_barang = $data['nama_barang'];
        $keterangan = $data['keterangan'];
        $satuan = $data['satuan'];
        
        $model->insert("barang", "null, '$nama_barang', '$keterangan', '$satuan', null");
    }

    function barang_edit_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_barang = $data['id_barang'];
        $nama_barang = $data['nama_barang'];
        $keterangan = $data['keterangan'];
        $satuan = $data['satuan'];
        
        $model->updateWhere("barang", "nama_barang = '$nama_barang', keterangan = '$keterangan', satuan = '$satuan'", "id_barang = '$id_barang'");
    }
    
    function barang_delete_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_barang = $data['id_barang'];
        
        $delete = $model->delete("barang", "id_barang = '$id_barang'");
        return $delete;
    }
}

?>