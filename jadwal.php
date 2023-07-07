<?php 
// menghubungkan tampilan header
include ("layouts/header.php");
// menghubungkan koneksi database
include ('database/koneksi.php');

?>
<h3 class="text-center my-3">Jadwal Pertandingan</h3><hr>
<?php 
    // mengambil semua data dari table jadwal
      $data= mysqli_query($koneksi, 'SELECT * FROM jadwal');
    ?>
<div class="row justift-content-center mb-5 pb-5">
    <!-- menampilkan data dari table pemain -->
  <?php foreach ($data as $row ) : ?>
  <div class="col-lg-3">
    <div class="card mb-3 shadow">
      <div class="card-header">
        <h5 class="card-title"><?=$row['hari']?>   <?= date('d-M-Y ', strtotime($row['waktu']))?></h5>
      </div>
      <div class="card-body">
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= date('H:i', strtotime($row['waktu']))?></h6>
        <p class="card-text h4 fw-bold"><?=$row['kegiatan']?></p>
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