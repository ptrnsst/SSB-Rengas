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
<h3 class="text-center my-3">Form Ubah Jadwal</h3>

<?php 
// ambil data di table jadwal sesuai dengan id yang didapatkan
// mengambil id jadwal
$id_jadwal=$_GET['id'];
$data= mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id = $id_jadwal");
?>
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="card shadow px-5 py-5">
            <?php foreach ($data as $row) :?>
            <form action="ubah_jadwal.php?id=<?=$id_jadwal?>" method="post">
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari </label>
                    <select class="form-select" aria-label="Default select example" name="hari" id="hari">
                        <option selected value="<?=$row['hari']?>"><?=$row['hari']?></option>
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
                    <input value="<?=$row['waktu']?>" type="datetime-local" class="form-control" id="waktu" name="waktu"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <input value="<?=$row['kegiatan']?>" type="text" class="form-control" id="kegiatan" name="kegiatan"
                        aria-describedby="emailHelp">
                </div>
                <div class="mt-3 text-end">
                    <a href="jadwal.php" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Simpan</button>
                </div>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])) {
        $id_jadwal=$_GET['id'];

		$hari       =htmlspecialchars($_POST['hari']);
		$waktu      =htmlspecialchars($_POST['waktu']);
		$kegiatan   =htmlspecialchars($_POST['kegiatan']);
		$query=mysqli_query($koneksi, "UPDATE jadwal SET hari='$hari',waktu='$waktu', kegiatan='$kegiatan' WHERE id='$id_jadwal'");
		
        if ($query) {
            echo "
            <script>
              alert('Data Berhasil Diubah');
              location='jadwal.php';
            </script>";
        }
	}
?>


<?php 
// menghubungkan tampilan footer
include ("layouts/footer.php")
?>


