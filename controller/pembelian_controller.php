<?php
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION)) { 
    session_start(); 
}

require_once "controller/base_controller.php";

class PembelianController {
    private $id_pembelian;
    private $jumlah_pembelian;
    private $harga_beli;
    private $id_barang;

    function set_id_pembelian ($id_pembelian) {
        $this->id_pembelian = $id_pembelian;
    }

    function set_jumlah_pembelian ($jumlah_pembelian) {
        $this->jumlah_pembelian = $jumlah_pembelian;
    }

    function set_harga_beli ($harga_beli) {
        $this->harga_beli = $harga_beli;
    }

    function set_id_barang ($id_barang) {
        $this->id_barang = $id_barang;
    }

    function get_id_pembelian () {
        return $this->id_pembelian;
    }

    function get_jumlah_pembelian () {
        return $this->jumlah_pembelian;
    }

    function get_harga_beli () {
        return $this->harga_beli;
    }

    function get_id_barang () {
        return $this->id_barang;
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
   
    function pembelian_list(){
        $this->callmodel();
        $model = new model;
        
        $penjualan_list = $model->select("pembelian");
        return $penjualan_list;
    }
    
    function pembelian_detail($data){
        $this->callmodel();
        
        $model = new model;
        
        $penjualan_detail = $model->selectWhere("pembelian", "id_pembelian = '$data'");
        return $penjualan_detail;
    }

    function pembelian_add_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $jumlah_pembelian = $data['jumlah_pembelian'];
        $harga_beli = $data['harga_beli'];
        $id_barang = $data['id_barang'];
        $id_supplier = $data['id_supplier'];
        
        $model->insert("pembelian", "null, '$jumlah_pembelian', '$harga_beli', '$id_barang', '$id_supplier'");
    }

    function pembelian_edit_submit($data){
        $this->callmodel();
        
        $model = new model;

        $id_pembelian = $data['id_pembelian'];
        $jumlah_pembelian = $data['jumlah_pembelian'];
        $harga_beli = $data['harga_beli'];
        $id_barang = $data['id_barang'];
        $id_supplier = $data['id_supplier'];
        
        $model->updateWhere("pembelian", "jumlah_pembelian = '$jumlah_pembelian', harga_beli = '$harga_beli', id_barang = '$id_barang', id_supplier = '$id_supplier'", "id_pembelian = '$id_pembelian'");
    }
    
    function pembelian_delete_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_pembelian = $data['id_pembelian'];
        
        $delete = $model->delete("pembelian", "id_pembelian = '$id_pembelian'");
        return $delete;
    }
}

?>