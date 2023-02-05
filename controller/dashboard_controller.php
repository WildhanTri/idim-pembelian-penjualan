<?php
date_default_timezone_set("Asia/Jakarta");
if (!isset($_SESSION)) {
    session_start();
}

require_once "controller/base_controller.php";

class DashboardController
{
    function callasset()
    {
        $baseController = new BaseController();
        $baseController->callasset();
    }
    function get_dasboard()
    {
        require "koneksi.php";
        $dashboard = mysqli_query($connect, "Select barang.nama_barang, 
        (SUM(penjualan.jumlah_penjualan * penjualan.harga_jual) - SUM(pembelian.jumlah_pembelian * pembelian.harga_beli)) AS keuntungan, 
        (SUM(pembelian.jumlah_pembelian) - SUM(penjualan.jumlah_penjualan)) AS stok,
        (SUM(pembelian.jumlah_pembelian)) AS jumlah_pembelian,
        (SUM(penjualan.jumlah_penjualan)) AS jumlah_penjualan
        FROM 
        barang 
        JOIN pembelian ON barang.id_barang= pembelian.id_barang 
        JOIN penjualan ON pembelian.id_barang = penjualan.id_barang 
        GROUP BY barang.id_barang;");
        return $dashboard;
    }
}