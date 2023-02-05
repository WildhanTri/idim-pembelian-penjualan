<?php
require_once "controller/pembelian_controller.php";
$pembelianController = new PembelianController();
$pembelianController->callasset();

$pembelianDetail = null;
if (isset($_GET['id'])) {
  $pembelianDetail = $pembelianController->pembelian_detail($_GET['id']);
}
?>
<html>

<head>
</head>

<body>
  <div class="clm-12" style="border-bottom:1px solid black;">
    <h1><?php echo $pembelianDetail != null ? "Edit Pembelian" : "Tambah Pembelian" ?></h1>
  </div>
  <form action="submit.php" method="post" enctype="multipart/form-data">
    <?php if ($pembelianDetail) : ?>
      <input type="hidden" name="id_pembelian" value="<?php echo $pembelianDetail[0]['id_pembelian'] ?>">
    <?php endif ?>
    <table class="table">
      <tr>
        <td>Nama Pembelian</td>
        <td>:</td>
        <td><input type="text" class="input" name="nama_pembelian" value="<?php echo $pembelianDetail != null ? $pembelianDetail[0]['nama_pembelian'] : '' ?>" autocomplete="off" /></td>
      </tr>
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td><input type="text" class="input" name="no_hp_pembelian" value="<?php echo $pembelianDetail != null ? $pembelianDetail[0]['no_hp_pembelian'] : '' ?>" autocomplete="off" /></td>
      </tr>
      <tr>
        <td style="vertical-align:top;">Alamat Pembelian</td>
        <td style="vertical-align:top;">:</td>
        <td>
          <textarea class="input" name="alamat_pembelian" autocomplete="off"><?php echo $pembelianDetail != null ? $pembelianDetail[0]['alamat_pembelian'] : '' ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:right">
          <?php if ($pembelianDetail) : ?>
            <input type="submit" name="pembelian-edit-submit" class="btn btn-success" style="width:100px;" value="Edit">
          <?php endif ?>
          <?php if ($pembelianDetail == null) : ?>
            <input type="submit" name="pembelian-add-submit" class="btn btn-success" style="width:100px;" value="Add">
          <?php endif ?>
          <a href="?page=pembelian&&subpage=pembelian-list"><input type="button" class="btn btn-danger" style="width:100px;" value="Cancel"></a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>