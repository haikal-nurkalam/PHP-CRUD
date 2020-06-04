<?php 
require 'functions.php';


// cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
	


	// cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) > 0 ) {
		echo "
			<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'index.php';
			</script>

		";
	}
	else{
		echo "<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'index.php';
			</script>";
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nrp">NRP :</label>
				<input type="text" name="nrp" id="nrp" required autocomplete="off">
			</li>
			<li>
				<label for="nama">nama :</label>
				<input type="text" name="nama" id="nama" required autocomplete="off">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required autocomplete="off">
			</li>
			<li>
				<label for="jurusan">jurusan :</label>
				<input type="text" name="jurusan" id="jurusan" required autocomplete="off">
			</li>
			<li>
				<label for="gambar">gambar :</label>
				<input type="file" name="gambar" id="gambar" autocomplete="off">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>


		</ul>

	</form>

</body>
</html>