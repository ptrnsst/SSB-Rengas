<!-- Ini adalah halaman query untuk menghapus data pemain dari id yang diinginkan -->
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
$id_pemain=$_GET['id'];

// delete dari table jadwal dimana yang id nya dari parameter id pada button hapus pemain
$query=mysqli_query($koneksi, "DELETE FROM pemain WHERE id =$id_pemain");

// jika query berhasil, maka halaman akan diredirect ke pemain.php
if ($query) {
    echo "
    <script>
      alert('Data Berhasil Dihapus');
      location='pemain.php';
    </script>";
}
 ?>