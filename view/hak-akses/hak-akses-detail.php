<?php
require_once "controller/gamestore/gamestorecontroller.php";
$gs = new gamestore();
$gs->callasset();

$hakAksesDetail = null;
if (isset($_GET['id'])) {
  $hakAksesDetail = $gs->hak_akses_detail($_GET['id']);
}
?>
<html>

<head>
</head>

<body>
  <div class="clm-12" style="border-bottom:1px solid black;">
    <h1><?php echo $hakAksesDetail != null ? "Edit Hak Akses" : "Tambah Hak Akses" ?></h1>
  </div>
  <form action="submit.php" method="post" enctype="multipart/form-data">
    <?php if ($hakAksesDetail) : ?>
      <input type="hidden" name="id_akses" value="<?php echo $hakAksesDetail[0]['id_akses'] ?>">
    <?php endif ?>
    <table class="table">
      <tr>
        <td>Nama Hak Akses</td>
        <td>:</td>
        <td><input type="text" class="input" name="nama_akses" value="<?php echo $hakAksesDetail != null ? $hakAksesDetail[0]['nama_akses'] : '' ?>" autocomplete="off" /></td>
      </tr>
      <tr>
        <td style="vertical-align:top;">Keterangan</td>
        <td style="vertical-align:top;">:</td>
        <td>
          <textarea class="input" name="keterangan" autocomplete="off"><?php echo $hakAksesDetail != null ? $hakAksesDetail[0]['keterangan'] : '' ?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:right">
          <?php if ($hakAksesDetail) : ?>
            <input type="submit" name="hak-akses-edit-submit" class="btn btn-green" style="width:100px;" value="Edit">
          <?php endif ?>
          <?php if ($hakAksesDetail == null) : ?>
            <input type="submit" name="hak-akses-add-submit" class="btn btn-green" style="width:100px;" value="Add">
          <?php endif ?>
          <input type="button" class="btn btn-red" style="width:100px;" value="cancel">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>