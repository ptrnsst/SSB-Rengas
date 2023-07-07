<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<title>Login SSB RENGAS JR</title>
</head>
<body>
    <?php 
    include ('database/koneksi.php');
    ?>
	<div class="container">

		<div class="row">
			<div class="col-md-4 offset-md-4">

				<div class="card mt-5">
					<div class="card-title text-center py-3">
						<h1>Login Form</h1>
					</div>
					<div class="card-body">
						<form action="login.php" method="post">
							<div class="form-group">
								<label for="username">Email address</label>
								<input type="text" name="username" class="form-control" id="username" aria-describedby="username" placeholder="username">

							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" placeholder="Password">
							</div>

							<button type="submit" name="login" class="btn btn-primary">Submit</button>
						</form>

					</div>
				</div>
			</div>

		</div>

	</div>
</body>

<?php 
if (isset($_POST['login'])) {
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi database
include 'database/koneksi.php';
 
// menangkap data yang dikirim dari form
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars(md5($_POST['password']));
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
// jika $cek 1 atau berhasil maka
if($cek > 0){
	// buat session username
	$_SESSION['username'] = $username;
	// buat session login
	$_SESSION['status'] = "login";
	// dan redirect ke halamanm admin/index.php
    echo "
    <script>
        alert('Anda Berhasil Login');
        location='admin/index.php';
    </script>";
}else{
	// jika $cek 0 atau gagal
	// redirect he halaman login.php
	echo "
    <script>
        alert('Username atau Password Salah');
        location='login.php';
    </script>";

}}
?>
</html>
