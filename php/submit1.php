<!DOCTYPE html>
<html>

<head>
    <title>Daftar Rute Tiket Penerbangan</title>
</head>

<body>
    <style>
        #card {
            background: #bfbfbf;
            border-radius: 8px;
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0, 65);
            height: 300px;
            margin: 6rem auto 8.1rem auto;
            width: 500px;
        }
    </style>
    <div id="card">
        <marquee>SELAMAT DATANG</marquee>

        <center>
            <h3>Pendaftaran Rute Penerbangan</h3>
        </center>
        <center>
            <form action="" method="post" id="penerbangan">
        </center>
        <label>Maskapai : </label>
        <input type="text" name="maskapai" id="maskapai"> <br>
        <p>Bandara Asal
            <select name="bandaraAsal" id="bandaraAsal">
                <option value="soekarno hatta (cgk)">Soekarno Hatta (CGK)</option>
                <option value="husein sastranegara (bdo)">Husein Sastranegara (BDO)</option>
                <option value="abdul rachman saleh (mlg)">Abdul Rachman Saleh (MLG)</option>
                <option value="juanda (sub)">Juanda (SUB)</option>
            </select>
        </p>

        <p>Bandara Tujuan
            <select name="bandaraTujuan" id="bandaraTujuan">
                <option value="ngurah rai (dps)">Ngurah Rai (DPS)</option>
                <option value="hasanuddin (upg)">Hasanuddin (UPG)</option>
                <option value="inanwatan (inx)">Inanwatan (INX)</option>
                <option value="sultan iskandarmuda (btj)">Sultan Iskandarmuda (BTJ)</option>
            </select>
        </p>
        <label for="">Harga Tiket</label>
        <input type="text" name="hargaTiket" id="hargaTiket"><br>

        <button type="submit" form="penerbangan" value="Kirim" name="Kirim">Kirim</button>

        </table>
        </form>
    </div>
    <?php

    $berkas = "test.json";
    $dataPenerbangan = array();

    $dataJson = file_get_contents($berkas);
    $dataPenerbangan = json_decode($dataJson, true);

    if (isset($_POST['Kirim'])) {
        if ($_POST['bandaraAsal'] == "soekarno hatta (cgk)") {
            $pajak1 = 50000;
        } elseif ($_POST['bandaraAsal'] == "husein sastranegara (bdo)") {
            $pajak1 = 30000;
        } elseif ($_POST['bandaraAsal'] == "abdul rachman saleh (mlg)") {
            $pajak1 = 40000;
        } elseif ($_POST['bandaraAsal'] == "juanda (sub)") {
            $pajak1 = 40000;
        }


        if ($_POST['bandaraTujuan'] == "ngurah rai (dps)") {
            $pajak2 = 80000;
        } elseif ($_POST['bandaraTujuan'] == "hasanuddin (upg)") {
            $pajak2 = 70000;
        } elseif ($_POST['bandaraTujuan'] == "inanwatan (inx)") {
            $pajak2 = 90000;
        } elseif ($_POST['bandaraTujuan'] == "sultan iskandarmuda (btj)") {
            $pajak2 = 70000;
        }



        $maskapai = array();
        $dataBaru = array(
            'maskapai' => $_POST['maskapai'],
            'bandaraAsal' => $_POST['bandaraAsal'],
            'bandaraTujuan' => $_POST['bandaraTujuan'],
            'hargaTiket' => $_POST['hargaTiket'],
            'pajak' => $pajak1 + $pajak2,
            'hargaTotal' => $pajak1 + $pajak2 + $_POST['hargaTiket']
        );



        array_push($dataPenerbangan, $dataBaru);
        $dataJson = json_encode($dataPenerbangan, JSON_PRETTY_PRINT);
        file_put_contents($berkas, $dataJson);
    }
    ?>

    <p><br><br>

        <!-- Tabel untuk menampilkan data rute penerbangan. -->
        <center>
            <table style="width:50%" border="1">
                <tr>
                    <!-- Header tabel data rute penerbangan. -->
                    <th>Maskapai</th>
                    <th>Asal Penerbangan</th>
                    <th>Tujuan Penerbangan</th>
                    <th>Harga Tiket</th>
                    <th>Pajak</th>
                    <th>Total Harga Tiket</th>
                </tr>
        </center>

        <?php
        for ($i = 0; $i < count($dataPenerbangan); $i++) {
            $maskapai = $dataPenerbangan[$i]['maskapai'];
            $asalPenerbangan = $dataPenerbangan[$i]['bandaraAsal'];
            $tujuanPenerbangan = $dataPenerbangan[$i]['bandaraTujuan'];
            $hargaTiket = $dataPenerbangan[$i]['hargaTiket'];
            $pajak = $dataPenerbangan[$i]['pajak'];
            $hargaTotal = $dataPenerbangan[$i]['hargaTotal'];

            echo "<tr>
				<td>" . $maskapai . "</td> <!-- Data nama. -->
				<td>" . $asalPenerbangan . "</td> <!-- Data nomor induk siswa. -->
				<td>" . $tujuanPenerbangan . "</td> <!-- Data jenis kelamin. -->
				<td>" . $hargaTiket . "</td> <!-- Data tanggal lahir. -->
				<td>" . $pajak . "</td> <!-- Data kelas. -->
				<td>" . $hargaTotal . "</td> <!-- Data orang tua. -->
			</tr>";
        }
        ?>
        </table>
</body>

</html>