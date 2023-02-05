<?php
require_once "controller/pengguna_controller.php";
$penggunaController = new PenggunaController();
$penggunaController->callasset();
$pengguna_list = $penggunaController->pengguna_list();
?>
<html>

<head>
</head>
<div class="clm-12 np">
  <div class="container-full" id="daftarproduk">
    <h1>List Pengguna</h1>
    <input type="hidden" id="totalcheck" value="0" />
    <table class="table table-bordered" style="margin-top:10px">
      <?php if ($pengguna_list != null) : ?>
        <thead>
          <td></td>
          <td>No</td>
          <td>Nama Pengguna</td>
          <td>Nama Depan</td>
          <td>Nama Belakang</td>
          <td>No HP</td>
          <td>Alamat</td>
          <td></td>
        </thead>

        <?php $no = 1;
        foreach ($pengguna_list as  $pengguna) : ?>
          <tr>
            <td><input type="checkbox" value="<?php echo $pengguna['id_pengguna'] ?>" name="pengguna[]" onclick="checkboxes()"></td>
            <td><?php echo $no;
                $no++ ?></td>
            <td style="width:200px"><?php echo $pengguna['nama_pengguna'] ?></td>
            <td><?php echo $pengguna['nama_depan'] ?></td>
            <td><?php echo $pengguna['nama_belakang'] ?></td>
            <td><?php echo $pengguna['no_hp'] ?></td>
            <td><?php echo $pengguna['alamat'] ?></td>
            <td class="text-center">
              <a href="submit.php?pengguna-edit=<?php echo $pengguna['id_pengguna'] ?>"><button class="btn btn-warning">Edit</button></a>
              <a href="submit.php?pengguna-delete=<?php echo $pengguna['id_pengguna'] ?>"><button class="btn btn-danger">Hapus</button></a>
            </td>
          </tr>
        <?php endforeach ?>
      <?php else : ?>
        <tr>
          <td colspan="7" style="text-align:center">Tidak Ada Data.</td>
        </tr>
      <?php endif ?>
    </table>
  </div>
</div>
<div class="fly-right">
  <a href="?page=pengguna&&subpage=pengguna-detail">
    <img src="assets/img/add_blue.png" class="flyitem" style="width:65px; height:65px;">
  </a>
</div>

</html>