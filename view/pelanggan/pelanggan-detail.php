<?php
require_once "controller/pelanggan_controller.php";
$pelangganController = new PelangganController();
$pelangganController->callasset();

$pelangganDetail = null;
if (isset($_GET['id'])) {
  $pelangganDetail = $pelangganController->pelanggan_detail($_GET['id']);
}
?>
<html>

<head>
</head>

<body>
  <div class="clm-12" style="border-bottom:1px solid black;">
    <h1><?php echo $pelangganDetail != null ? "Edit Pelanggan" : "Tambah Pelanggan" ?></h1>
  </div>
  <form action="submit.php" method="post" enctype="multipart/form-data">
    <?php if ($pelangganDetail) : ?>
      <input type="hidden" name="id_pelanggan" value="<?php echo $pelangganDetail[0]['id_pelanggan'] ?>">
    <?php endif ?>
    <table class="table">
      <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td><input type="text" class="input" name="nama_pelanggan" value="<?php echo $pelangganDetail != null ? $pelangganDetail[0]['nama_pelanggan'] : '' ?>" autocomplete="off" /></td>
      </tr>
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td><input type="text" class="input" name="no_hp_pelanggan" value="<?php echo $pelangganDetail != null ? $pelangganDetail[0]['no_hp_pelanggan'] : '' ?>" autocomplete="off" /></td>
      </tr>
      <tr>
        <td style="vertical-align:top;">Alamat Pelanggan</td>
        <td style="vertical-align:top;">:</td>
        <td>
          <textarea class="input" name="alamat_pelanggan" autocomplete="off"><?php echo $pelangganDetail != null ? $pelangganDetail[0]['alamat_pelanggan'] : '' ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:right">
          <?php if ($pelangganDetail) : ?>
            <input type="submit" name="pelanggan-edit-submit" class="btn btn-success" style="width:100px;" value="Edit">
          <?php endif ?>
          <?php if ($pelangganDetail == null) : ?>
            <input type="submit" name="pelanggan-add-submit" class="btn btn-success" style="width:100px;" value="Add">
          <?php endif ?>
          <a href="?page=pelanggan&&subpage=pelanggan-list"><input type="button" class="btn btn-danger" style="width:100px;" value="Cancel"></a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>