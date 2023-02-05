<?php
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION)) { 
    session_start(); 
}

require_once "controller/base_controller.php";

class PembelianController {
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
        
        $penjualan_list = $model->select2Table("pembelian", "supplier", "pembelian.id_supplier = supplier.id_supplier");
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
        
        $model->insert("pembelian", "null, '$jumlah_pembelian', '$harga_beli', '$id_barang', '$id_supplier', NOW(), null");
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