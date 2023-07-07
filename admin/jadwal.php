<?php 
// menghubungkan tampilan header
include ("layouts/header.php");

// menghubungkan koneksi database
include ('../database/koneksi.php');

// mengaktifkan session php
session_start();

// jika tidak ada session status, halaman akan diredirect ke ../index.php
if (!isset($_SESSION['status'])) {
    echo "
    <script>
        alert('Anda Belum Login');
        location='../index.php';
    </script>";    
}

?>

<!-- table tampilan jadwal pertandingan -->
<h3 class="text-center my-3">Jadwal Pertandingan</h3>
<a href="tambah_jadwal.php" class="btn btn-primary mb-3 text-end">Tambah Jadwal</a>
<table class="table table-bordered bg-primary mb-5">
  <thead class="bg-primary">
    <tr class="text-center">
      <th scope="col" width="5%">No</th>
      <th scope="col">Hari</th>
      <th scope="col">Waktu</th>
      <th scope="col">Kegiatan</th>
      <th scope="col" width="20%">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    // query pilih semua data dari table jadwal
      $data= mysqli_query($koneksi, 'SELECT * FROM jadwal');
    ?>
    <?php $no=1?>
    <!-- menampilkan data dari table jadwal -->
    <?php foreach ($data as $row ) : ?>
    <tr>
      <th><?=$no++?></th>
      <td><?=$row['hari']?></td>
      <td><?= date('d-m-Y H:i:s', strtotime($row['waktu']))?></td>
      <td><?=$row['kegiatan']?></td>
      <td class="text-center">
        <a href="ubah_jadwal.php?id=<?= $row['id'];?>" class="btn btn-sm btn-warning mb-3">Ubah</a>
        <a href="hapus_jadwal.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin Hapus ?')" class="btn-sm btn btn-danger alert_notif mb-3">Hapus</a>

      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<?php 
// menghubungkan tampilan footer
include ("layouts/footer.php")
?>