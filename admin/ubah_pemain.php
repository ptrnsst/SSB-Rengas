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
<h3 class="text-center my-3">Form Tambah Pemain</h3>

<?php 
$id_pemain=$_GET['id'];
$data= mysqli_query($koneksi, "SELECT * FROM pemain WHERE id = $id_pemain");
?>
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card shadow px-5 py-5 ">
        <?php foreach ($data as $row) :?>
            <form action="ubah_pemain.php?id=<?=$id_pemain?>" method="post">
                <div class="mb-3">
                    <label for="nama_pemain" class="form-label">Nama Pemain</label>
                    <input value="<?=$row['nama']?>" type="text" class="form-control" id="nama_pemain" name="nama_pemain" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="no_punggung" class="form-label">Nomor Punggung</label>
                    <input value="<?=$row['nomor_punggung']?>" type="text" class="form-control" id="no_punggung" name="no_punggung" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input value="<?=$row['posisi']?>" type="text" class="form-control" id="posisi" name="posisi" aria-describedby="emailHelp">
                </div>
                <div class="mt-3 text-end">
                    <a href="pemain.php" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Simpan</button>
                </div>
            </form>
        <?php endforeach?>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])) {
        $id_jadwal=$_GET['id'];

		$nama_pemain        =htmlspecialchars($_POST['nama_pemain']);
		$no_punggung        =htmlspecialchars($_POST['no_punggung']);
		$posisi             =htmlspecialchars($_POST['posisi']);
        
		$query=mysqli_query($koneksi, "UPDATE pemain SET nama='$nama_pemain',nomor_punggung='$no_punggung', posisi='$posisi' WHERE id='$id_pemain'");
		
        if ($query) {
            echo "
            <script>
              alert('Data Berhasil Diubah');
              location='pemain.php';
            </script>";
        }
	}
?>

<?php 
// menghubungkan tampilan footer
include ("layouts/footer.php")
?>