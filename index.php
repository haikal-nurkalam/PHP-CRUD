<?php 
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);	
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>


<br>

<a href="tambah.php">Tambah data Mahasiswa</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Foto</th>
		<th>NRP</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
	</tr>
	<?php $i=1; ?>
	<?php foreach( $mahasiswa as $row) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin')">Hapus</a>
		</td>
		<td><img src="image/<?= $row["gambar"]; ?>" width="100"></td>
		<td><?= $row["nrp"];  ?></td>
		<td><?= $row["nama"];  ?></td>
		<td><?= $row["email"];  ?></td>
		<td><?= $row["jurusan"];  ?></td>
	</tr>
	<?php $i++ ?>
<?php endforeach; ?>



</table>

</body>
</html>