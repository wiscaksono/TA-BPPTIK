<!DOCTYPE html>
<html>
<head>
	<title>Buku Tamu</title>
</head>
<body>
	<?php
		$id_file = fopen("bukutamu.txt", "r");
		while (!feof($id_file)) 
		{
			$nama = fgets($id_file);
			//Kalau tak berhasil dibaca
			if ($nama == FALSE)
				break;

			print("$nama<br>");

			//Baca komentar
			while (!feof($id_file)) 
			{
				$komentar = trim(fgets($id_file));
				if ($komentar == "*-*")
					break;

				printf("$komentar<br>");
			}
		}

		fclose($id_file);
	?>
</body>
</html>