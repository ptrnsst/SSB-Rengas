<!-- Ini adalah halaman query untuk menghapus data jadwal dari id yang diinginkan -->
<?php 
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

// menghubungkan koneksi database
include ('../database/koneksi.php');

// id yang didapatkan saat klik button hapus
$id_jadwal=$_GET['id'];

// delete dari table jadwal dimana yang id nya dari parameter id pada button hapus jadwal
$query= mysqli_query($koneksi, "DELETE FROM jadwal WHERE id =$id_jadwal");

// jika query berhasil, maka halaman akan diredirect ke jadwal.php
if ($query) {
    echo "
    <script>
      alert('Data Berhasil Dihapus');
      location='jadwal.php';
    </script>";
}

 ?>