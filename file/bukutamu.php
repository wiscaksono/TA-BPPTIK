<?php
	//Ambil data nama dan komentar
	if (isset($_POST["nama"]))
		$nama = trim($_POST["nama"]);
	else
		$nama = "";

	if (isset($_POST["komentar"]))
		$komentar = trim($_POST["komentar"]);
	else
		$komentar = "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buku Tamu</title>
</head>
<body>
	<form method="post">
		<p>
			<label>Nama: </label>
		</p>
		<p>
			<input type="text" name="nama" value="<?php print($nama); ?>">
		</p>
		<p>
			<label>Komentar:</label>
		</p>
		<p>
			<textarea cols="40" rows="4" name="komentar">
				<?php print($komentar); ?>
			</textarea>
		</p>
		<input type="submit" value="Kirim">
	</form>
	<hr>
	<?php
		//Kalau $nama dan $komentar tidak kosong
		if (! (empty($nama) || empty($komentar))) 
		{
			//Buka file dengan mode append
			$id_file = fopen("bukutamu.txt", "a");

			//Simpan data
			fputs($id_file, $nama . "\n");
			fputs($id_file, $komentar . "\n");
			fputs($id_file, "*-*\n"); //Menyatakan akhir komentar

			//Tutup file
			fclose($id_file);

			printf("Data telah disimpan. Terima kasih.");	
		}
		else
		{
			printf("Mohon nama dan komentar diisi<br>");
		}
	?>
</body>
</html>