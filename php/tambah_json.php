<!DOCTYPE html>
<html>

<head>
	<title>Data Gaji Pegawai</title>
	<!-- Memanggil berkas CSS. -->
	<link rel="stylesheet" href="css/bootstrap.css">
</head>

<body style="width: 40%">
	<h3>Data Anak Sekolah</h3>
	<!-- Form untuk memasukkan data gaji. -->
	<table style="width:100%">
		<form action="" method="post" id="formSiswa">
			<tr>
				<!-- Masukan data nama. -->
				<td><label for="nama">Nama:</label></td>
				<td><input type="text" id="nama" name="nama"></td>
			</tr>
			<tr>
				<!-- Masukan data NIS. -->
				<td><label for="nis">NIS:</label></td>
				<td><input type="number" id="nis" name="nis"></td>
			</tr>
			<tr>
				<!-- Masukan data jenis kelamin. -->
				<td><label for="jenisKelamin">Jenis Kelamin:</label></td>
				<td><input type="radio" id="lakiLaki" name="jenisKelamin" value="L">
					<label for="lakilaki">Laki-laki</label><br>
					<input type="radio" id="perempuan" name="jenisKelamin" value="P">
					<label for="perempuan">Perempuan</label><br>
				</td>
			</tr>
			<tr>
				<!-- Masukan data Tanggal Lahir. -->
				<td><label for="tgl_lahir">Tanggal Lahir:</label></td>
				<td><input type="number" id="tgl_lahir" name="tgl_lahir"></td>
			</tr>
			<tr>
				<!-- Masukan data nilai Tunjangan Jabatan. -->
				<td><label for="kelas">Kelas:</label></td>
				<td><input type="kelas" id="kelas" name="kelas"></td>
			</tr>
			<tr>
				<!-- Masukan data nilai Tunjangan Kinerja. -->
				<td><label for="ortu">Nama Orang Tua:</label></td>
				<td><input type="ortu" id="ortu" name="ortu"></td>
			</tr>
			<tr>
				<!-- Tombol Kirim/Submit -->
				<td><button type="submit" form="formSiswa" value="Kirim" name="Kirim">Kirim</button></td>
				<td></td>
			</tr>
		</form>
	</table>
	<?php

	$berkas = "data/data.json"; //Variabel berisi nama berkas di mana data dibaca dan ditulis.
	$dataSiswa = []; //Variabel array kosong untuk menampung data siswa dari berkas.

	//Mengambil data dari berkas dan mengkonversi data tersebut menjadi array PHP.
	//Variabel $dataJson berisi data dari berkas dalam bentuk array Json.
	//Variabel $dataSiswa berisi data pada $dataJson yang sudah dikonversi menjadi array PHP.
	$dataJson = file_get_contents($berkas);
	$dataSiswa = json_decode($dataJson, true);

	if (isset($_POST['Kirim'])) {
		$siswa = array(); //Variabel array kosong untuk menampung data nilai yang dimasukkan dari form.

		//Memasukkan data siswa dari form ke dalam array $databaru.
		$dataBaru = array(
			'nama' => $_POST['nama'],
			'nis' => $_POST['nis'],
			'jenisKelamin' => $_POST['jenisKelamin'],
			'tgl_lahir' => $_POST['tgl_lahir'],
			'kelas' => $_POST['kelas'],
			'ortu' => $_POST['ortu']
		);



		array_push($dataSiswa, $dataBaru); //Menambahkan data baru ke dalam data yang sudah ada dalam berkas. 

		//Mengkonversi kembali data gaji dari array PHP menjadi array Json dan menyimpannya ke dalam berkas.
		$dataJson = json_encode($dataSiswa, JSON_PRETTY_PRINT);
		file_put_contents($berkas, $dataJson);
	}
	?>

	<p><br><br>

		<!-- Tabel untuk menampilkan data gaji. -->
	<table style="width:100%" border="1">
		<tr>
			<!-- Header tabel data gaji. -->
			<th>Nama</th>
			<th>NIP</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Kelas</th>
			<th>Ortu</th>
		</tr>

		<?php
		//	Perulangan untuk menampilkan data gaji.
		//	Variabel $i adalah index data gaji pada array $dataGaji.
		for ($i = 0; $i < count($dataSiswa); $i++) {

			//	Memindahkan data dari dalam array $dataSiswa ke variabel baru.
			//	$nama adalah data nama siswa.
			//	$nomorInduk adalah data nomor induk siswa.
			//	$jenisKelamin adalah data jenis kelamin siswa.
			$nama = $dataSiswa[$i]['nama']; // Contoh isi variabel: "Susi Susanti".
			$nip = $dataSiswa[$i]['nis']; // Contoh isi variabel: "12345".
			$jenisKelamin = $dataSiswa[$i]['jenisKelamin']; // Isi variabel: "L" atau "P".
			$tgl_lahir = $dataSiswa[$i]['tgl_lahir'];
			$kelas = $dataSiswa[$i]['kelas'];
			$ortu = $dataSiswa[$i]['ortu'];

			//	Percabangan untuk mengganti tampilan data jenis kelamin.
			//	Variabel $teksJenisKelamin berisi teks yang akan ditampilkan sesuai dengan data pada variabel $jenisKelamin.
			if ($jenisKelamin == "L") $teksJenisKelamin = "Laki-laki";
			elseif ($jenisKelamin == "P") $teksJenisKelamin = "Perempuan";

			//	Baris untuk menampilkan data siswa.
			echo "<tr>
				<td>" . $nama . "</td> <!-- Data nama. -->
				<td>" . $nip . "</td> <!-- Data nomor induk siswa. -->
				<td>" . $teksJenisKelamin . "</td> <!-- Data jenis kelamin. -->
				<td>" . $tgl_lahir . "</td> <!-- Data tanggal lahir. -->
				<td>" . $kelas . "</td> <!-- Data kelas. -->
				<td>" . $ortu . "</td> <!-- Data orang tua. -->
			</tr>";
		}
		?>
	</table>
</body>

</html>