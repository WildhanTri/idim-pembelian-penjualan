<?php
date_default_timezone_set("Asia/Jakarta");
if(!isset($_SESSION)) { 
    session_start(); 
}

require_once "controller/base_controller.php";

class PelangganController {
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
   
    function pelanggan_list(){
        $this->callmodel();
        $model = new model;
        
        $pelanggan_list = $model->select("pelanggan");
        return $pelanggan_list;
    }
    
    function pelanggan_detail($data){
        $this->callmodel();
        
        $model = new model;
        
        $pelanggan_detail = $model->selectWhere("pelanggan", "id_pelanggan = '$data'");
        return $pelanggan_detail;
    }

    function pelanggan_add_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $nama_pelanggan = $data['nama_pelanggan'];
        $alamat_pelanggan = $data['alamat_pelanggan'];
        $no_hp_pelanggan = $data['no_hp_pelanggan'];
        
        $model->insert("pelanggan", "null, '$nama_pelanggan', '$alamat_pelanggan', '$no_hp_pelanggan'");
    }

    function pelanggan_edit_submit($data){
        $this->callmodel();
        
        $model = new model;

        $id_pelanggan = $data['id_pelanggan'];
        $nama_pelanggan = $data['nama_pelanggan'];
        $alamat_pelanggan = $data['alamat_pelanggan'];
        $no_hp_pelanggan = $data['no_hp_pelanggan'];
        
        $model->updateWhere("pelanggan", "nama_pelanggan = '$nama_pelanggan', alamat_pelanggan = '$alamat_pelanggan', no_hp_pelanggan = '$no_hp_pelanggan'", "id_pelanggan = '$id_pelanggan'");
    }
    
    function pelanggan_delete_submit($data){
        $this->callmodel();
        
        $model = new model;
        
        $id_pelanggan = $data['id_pelanggan'];
        
        $delete = $model->delete("pelanggan", "id_pelanggan = '$id_pelanggan'");
        return $delete;
    }
}

?>