<?php
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION)) { 
    session_start(); 
}

require_once "controller/base_controller.php";

class PenjualanController {
    private $id_penjualan;
    private $jumlah_penjualan;
    private $harga_jual;
    private $id_barang;

    function set_id_penjualan($id_penjualan) {
        $this->id_penjualan = $id_penjualan;
    }

    function set_jumlah_penjualan($jumlah_penjualan) {
        $this->jumlah_penjualan = $jumlah_penjualan;
    }

    function set_harga_jual($harga_jual) {
        $this->harga_jual = $harga_jual;
    }

    function set_id_barang($id_barang) {
        $this->id_barang = $id_barang;
    }

    function get_id_penjualan() {
        return $this->id_penjualan;
    }

    function get_jumlah_penjualan() {
        return $this->jumlah_penjualan;
    }

    function get_harga_jual() {
        return $this->harga_jual;
    }

    function get_id_barang() {
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
   
    function penjualan_list(){
        $this->callmodel();
        $model = new model;
        
        $penjualan_list = $model->select("penjualan");
        return $penjualan_list;
    }
    
    function penjualan_detail($data){
        $this->callmodel();
        
        $model = new model;
        
        $penjualan_detail = $model->selectWhere("penjualan", "id_penjualan = '$data'");
        return $penjualan_detail;
    }

    function penjualan_add_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $jumlah_penjualan = $data['jumlah_penjualan'];
        $harga_jual = $data['harga_jual'];
        $id_barang = $data['id_barang'];
        $id_pelanggan = $data['id_pelanggan'];
        
        $model->insert("penjualan", "null, '$jumlah_penjualan', '$harga_jual', '$id_barang', '$id_pelanggan'");
    }

    function penjualan_edit_submit($data){
        $this->callmodel();
        
        $model = new model;

        $id_penjualan = $data['id_penjualan'];
        $jumlah_penjualan = $data['jumlah_penjualan'];
        $harga_jual = $data['harga_jual'];
        $id_barang = $data['id_barang'];
        $id_pelanggan = $data['id_pelanggan'];
        
        $model->updateWhere("penjualan", "jumlah_penjualan = '$jumlah_penjualan', harga_jual = '$harga_jual', id_barang = '$id_barang', id_pelanggan = '$id_pelanggan'", "id_penjualan = '$id_penjualan'");
    }
    
    function penjualan_delete_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_penjualan = $data['id_penjualan'];
        
        $delete = $model->delete("penjualan", "id_penjualan = '$id_penjualan'");
        return $delete;
    }
}

?>