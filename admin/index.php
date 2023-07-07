<?php 
include ("layouts/header.php");
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

<?php 
    //   pilih semua data dari table jadwal
    $jadwal= mysqli_query($koneksi, 'SELECT * FROM jadwal');
    //   pilih semua data dari table pemain
    $pemain= mysqli_query($koneksi, 'SELECT * FROM pemain');

    // hitung rows dari data jadwal
    $jad= mysqli_num_rows($jadwal);
    // hitung rows dari data pemain
      $pem= mysqli_num_rows($pemain);
    ?>
<div class="row justify-content-center mt-5">
    <div class="col-lg-3 col-md-4 col-sm-10">
        <div class="card px-3 py-2 bg-danger text-white mb-3">
            <h5>Banyak Jadwal</h5>
            <h2><?=$jad?></h2>
            <span>Jadwal</span>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-10">
        <div class="card px-3 py-2 bg-primary text-white mb-3">
            <h5>Banyak Pemain</h5>
            <h2><?=$pem?></h2>
            <span>Orang</span>
        </div>
    </div>
</div>

<?php 
include ("layouts/footer.php")
?>