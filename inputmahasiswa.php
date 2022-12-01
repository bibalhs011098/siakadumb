<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rekord Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Rekord Mahasiswa</h2>
  <form action="" method="post" >
  <div class="mb-3">
      <label for="NPM">Nomor Pokok Mahasiswa :</label>
      <input type="text" class="form-control" id="NPM" title="Enter NPM" name="NPM">
    </div>
	<div class="mb-3">
      <label for="NamaMahasiswa">Nama Mahasiswa :</label>
      <input type="text" class="form-control" id="NamaMahasiswa" placeholder="Enter NamaMahasiswa" name="NamaMahasiswa">
    </div>
	<div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
	<div class="mb-3">
	<label for="Alamat">Alamat :</label>
	<textarea class="form-control" rows="5" id="Alamat" name="Alamat" title="Ketik Alamat Mahasiswa" placeholder="Ketik Alamat Mahasiswa"></textarea>
	</div>
	<button type="submit" class="btn btn-primary" name="bSimpan">Simpan Rekord</button>
	<a href="daftarmhs.php" target="_blank" class="btn btn-success">Lihat Yang Sudah Daftar </a>
	 </form>
</div>
<?php
if (isset ($_POST['bSimpan'] )) {
	$NPM=filter_var($_POST['NPM'],FILTER_SANITIZE_STRING);
	$NamaMahasiswa=filter_var($_POST['NamaMahasiswa'],FILTER_SANITIZE_STRING);
	$Password=filter_var($_POST['pswd'],FILTER_SANITIZE_STRING);
	$Alamat=filter_var($_POST['Alamat'],FILTER_SANITIZE_STRING);
	$kon=mysqli_connect("localhost","root","","siakadumb");
	$kunci="@12345UMBOke";
	$sql="insert into Mahasiswa (NPM,NamaMahasiswa,Password,Alamat) values
	('".$NPM."',aes_encrypt('".$NamaMahasiswa."','".$kunci."'),aes_encrypt('".$Password."','".$kunci."'),'".$Alamat."')";
	$q=mysqli_query($kon,$sql);
	if ($q) {
		echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>">
  <strong>Berhasil Simpan!</strong> Rekord Mahasiswa Berhasil Disimpan.
</div>';
	} else {
		echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>">
  <strong>Gagal Di Simpan!</strong> Rekord Mahasiswa Gagal Disimpan.
</div>';
	}
}
?>
</body>
</html>