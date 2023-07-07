<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
$hapus_session=session_destroy();
if ($hapus_session) {
    echo "
    <script>
      alert('Data Berhasil Logout');
      location='../index.php';
    </script>";
}
?>