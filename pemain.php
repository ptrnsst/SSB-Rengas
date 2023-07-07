<?php 
// menghubungkan tampilan header
include ("layouts/header.php");
// menghubungkan koneksi database
include ('database/koneksi.php');

?>
<h3 class="text-center my-3">Daftar Pemain</h3><hr>
    <?php 
    // mengambil semua data dari table pemain
      $data= mysqli_query($koneksi, 'SELECT * FROM pemain');
    ?>
<div class="row justify-content-center mb-5">
  <!-- menampilkan data dari table pemain -->
  <?php foreach ($data as $row ) : ?>
  <div class="col-lg-3 col-md-4 col-sm-6">
    <div class="card mb-3 shadow">
      <div class="card-body text-center">
        <h1 class="fs-1"><i class="bi bi-person-circle"></i></h1>
        <h5 class="card-title fw-bold"><?=$row['nama']?></h5>
        <h6 class="card-subtitle mb-2 h3"><?=$row['nomor_punggung']?></h6>
        <p class="card-text"><?=$row['posisi']?></p>
      </div>
    </div>
  </div>
  <?php endforeach?>
</div>
</div>


<?php 
// menghubungkan tampilan footer
include ("layouts/footer.php")
?>