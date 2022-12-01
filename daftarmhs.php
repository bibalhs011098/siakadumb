<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Table Mahasiswa</h2>
  <p>Berikut ini Mahasiswa yang Sudah Tersimpan di Server:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
		<th>No.</th>
        <th>NPM</th>
        <th>Nama Mahasiswa</th>
		<th>Password</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
	<?php $kon=mysqli_connect("localhost","root","","siakadumb");
	$kunci="@12345UMBOke";
	$sql="select NPM,aes_decrypt(NamaMahasiswa,'".$kunci."') as NamaMahasiswa,aes_decrypt(Password,'".$kunci."') as Password,Alamat from mahasiswa";
	$q=mysqli_query($kon,$sql);
	$r=mysqli_fetch_array($q);
	do {
	?>
      <tr>
        <td><?php @$nomor++;echo $nomor;?></td>
        <td><?php echo $r['NPM'];?></td>
        <td><?php echo $r['NamaMahasiswa'];?></td>
		<td><?php echo $r['Password'];?></td>
		<td><?php echo $r['Alamat'];?></td>
      </tr>
	  <?php
	} while ($r=mysqli_fetch_array($q)); ?>
    </tbody>
  </table>
</div>

</body>
</html>