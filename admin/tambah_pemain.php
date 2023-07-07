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
<!-- tampilan form tambah pemain -->
<h3 class="text-center my-3">Form Tambah Pemain</h3>

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card shadow px-5 py-5 ">
            <!-- action form yaitu dimana form akan dijalankan (menambahkan data) -->
            <form action="tambah_pemain.php" method="post">
                <div class="mb-3">
                    <label for="nama_pemain" class="form-label">Nama Pemain</label>
                    <input type="text" class="form-control" id="nama_pemain" name="nama_pemain">
                </div>
                <div class="mb-3">
                    <label for="no_punggung" class="form-label">Nomor Punggung</label>
                    <input type="number" class="form-control" id="no_punggung" name="no_punggung">
                </div>
                <div class="mb-3">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input type="text" class="form-control" id="posisi" name="posisi">
                </div>
                <div class="mt-3 text-end">
                    <a href="pemain.php" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="tambah" id="tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
// jika klik button bernama tambah, jalankan query dibawah ini
	if (isset($_POST['tambah'])) {
        // nama pemain, data dari form yang bernama nama_pemain
		$nama_pemain    = htmlspecialchars($_POST['nama_pemain']);
        // no_punggung, data dari form yang bernama no_punggung
		$no_punggung    = htmlspecialchars($_POST['no_punggung']);
        // posisi, data dari form yang bernama posisi
		$posisi         = htmlspecialchars($_POST['posisi']);

        // Insert data ke table pemain yang nilainya dari value diatas
        $query = mysqli_query($koneksi, "INSERT INTO pemain VALUES ('NULL', '$nama_pemain', '$no_punggung', '$posisi')");
        
        // jika query berhasil, maka halaman akan diredirect ke pemain.php
        if ($query) {
            echo "
            <script>
              alert('Data Berhasil Ditambahkan');
              location='pemain.php';
            </script>";
        }
	 }     
?>

<?php 
// menghubungkan tampilan footer
include ("layouts/footer.php")
?>