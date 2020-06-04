<?php 
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "" , "phpdasar");


function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;	
 }

 
function tambah($data){
	global $conn;
// ambil data dari dalam form
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	
	// upload gambar
	$gambar = upload();
	if ( !$gambar) {
		return false;
		// Jika tidak ada gambar yg dikirimkan maka fungsi insert tidak berjalan
	}


	// query insert data
	$query = "INSERT INTO mahasiswa VALUES ('', '$nrp' , '$nama' , '$email' , '$jurusan', '$gambar') ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload(){

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ( $error === 4) {
		echo "<script>
			alert(' pilih gambar dahulu!');
			</script>
		";
		return false;
	}

	// cek apkah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg' , 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			alert(' pilih file yg beneran dikit lah!!!');
			</script>
		";
		return false;
	}

	// cek jika ukuran file terlalu besar
	if ( $ukuranFile > 1000000) {
		echo "<script>
			alert(' Gambar terlalu besar');
			</script>
		";
		return false;
	}
	move_uploaded_file($tmpName, 'image/' . $namaFile);

	return $namaFile;




}


function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id= $id");
	return mysqli_affected_rows($conn);
}
function ubah($data){
	
	global $conn;
// ambil data dari dalam form
	$id= $data["id"];
	$nrp = htmlspecialchars($data["nrp"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

	// query insert data
	$query = "UPDATE mahasiswa SET 
				nrp = '$nrp',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
				WHERE id = '$id'
				" ;
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

	function cari($keyword){
		$query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR
			nrp LIKE '%$keyword%' OR
			email LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%' OR
		";
		return query($query);
	}


 ?>