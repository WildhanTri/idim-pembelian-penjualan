<?php
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION)) { 
    session_start(); 
}

require_once "controller/base_controller.php";

class BarangController {

    private $id_barang;
    private $nama_barang;
    private $keterangan;
    private $satuan;
    private $id_pengguna;

    function set_id_barang($id_barang)
    {
        $this->id_barang = $id_barang;
    }

    function set_nama_barang($nama_barang)
    {
        $this->nama_barang = $nama_barang;
    }

    function set_keterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }

    function set_satuan($satuan)
    {
        $this->satuan = $satuan;
    }

    function set_id_pengguna($id_pengguna)
    {
        $this->id_pengguna = $id_pengguna;
    }

    function get_id_barang()
    {
        return this->id_barang;
    }

    function get_nama_barang()
    {
        return this->nama_barang;
    }

    function get_keterangan()
    {
        return this->keterangan;
    }

    function get_satuan()
    {
        return this->satuan;
    }

    function get_id_pengguna()
    {
        return this->id_pengguna;
    }

    function callasset(){
        $baseController = new BaseController();
        $baseController->callasset();
    }
    function callconnection(){
        $baseController = new BaseController();
        $baseController->callconnection();
    }
    function callsession(){
        $baseController = new BaseController();
        $baseController->callsession();
    }
    function callmodel(){
        $baseController = new BaseController();
        $baseController->callmodel();
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