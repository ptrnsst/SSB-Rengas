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

<!-- table tampilan daftar pemain -->
<h3 class="text-center my-3">Daftar Pemain</h3>
<a href="tambah_pemain.php" class="btn btn-primary mb-3 text-end">Tambah Pemain</a>
<table class="table table-bordered bg-primary mb-5">
  <thead class="bg-primary">
    <tr class="text-center">
      <th scope="col" width="5%">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Nomor Punggung</th>
      <th scope="col">Posisi</th>
      <th scope="col" width="20%">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    // query pilih semua data dari table pemain
      $data= mysqli_query($koneksi, 'SELECT * FROM pemain');
    ?>
    <?php $no=1?>
    <!-- menampilkan data dari table pemain -->
    <?php foreach ($data as $row ) : ?>
    <tr>
      <th class="text-center"><?=$no++?></th>
      <td><?=$row['nama']?></td>
      <td class="text-center"><?=$row['nomor_punggung']?></td>
      <td><?=$row['posisi']?></td>
      <td class="text-center">
        <a href="ubah_pemain.php?id=<?= $row['id'];?>" class="btn btn-warning btn-sm mb-3">Ubah</a>
        <a href="hapus_pemain.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin Hapus ?')" class="btn btn-danger alert_notif btn-sm mb-3">Hapus</a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>


<?php 
// menghubungkan tampilan footer
include ("layouts/footer.php")
?>