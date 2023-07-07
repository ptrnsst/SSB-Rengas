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
<!-- tampilan form tambah jadwal -->
<h3 class="text-center my-3">Form Tambah Jadwal</h3>

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card shadow px-5 py-5">
        <!-- action form yaitu dimana form akan dijalankan (menambahkan data) -->
            <form action="tambah_jadwal.php" method="POST">
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari </label>
                    <select class="form-select" aria-label="Default select example" name="hari" id="hari">
                        <option selected>-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="datetime-local" class="form-control" id="waktu" name="waktu" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input type="text" class="form-control" id="kegiatan" name="kegiatan" aria-describedby="emailHelp">
                </div>
                <div class="mt-3 text-end">
                    <a href="jadwal.php" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="tambah" id="tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
	// jika klik button bernama tambah, jalankan query dibawah ini
    if (isset($_POST['tambah'])) {
        // hari, data dari form yang bernama hari
		$hari       = htmlspecialchars($_POST['hari']);
        // waktu, data dari form yang bernama waktu
		$waktu      = htmlspecialchars($_POST['waktu']);
        // kegiatan, data dari form yang bernama kegiatan
		$kegiatan   = htmlspecialchars($_POST['kegiatan']);

        // Insert data ke table jadwal yang nilainya dari value diatas
        $query = mysqli_query($koneksi, "INSERT INTO jadwal VALUES ( NULL, '$hari', '$waktu', '$kegiatan')");
        
        // jika query berhasil, maka halaman akan diredirect ke jadwal.php
        if ($query) {
            echo "
            <script>
              alert('Data Berhasil Ditambahkan');
              location='jadwal.php';
            </script>";
        }
	 }     
?>

<?php 
// menghubungkan tampilan footer
include ("layouts/footer.php")
?>