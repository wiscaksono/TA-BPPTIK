    <!-- // Wisnu Wicaksono
    // JWD4-2021-G2 -->

    <!DOCTYPE html>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>

        <div class="container">
            <div class="center"></div>
            <div class="card">
                <div class="card-inside">
                    <h1>Pendaftaran Rute</h1>
                    <div class="head">
                        <h1>Penerbangan</h1>
                    </div>
                    <div class="wrapper">
                        <form action="" method="post">
                            <table class="table-top">
                                <tr>
                                    <td>Maskapai</td>
                                    <td>:</td>
                                    <td>
                                        <select name="maskapai">
                                            <option>Adam Air</option>
                                            <option>Citilink</option>
                                            <option>Garuda Indonesia</option>
                                            <option>Lion AIr</option>
                                            <option>Sriwijaya Air</option>
                                            <option>Susi Air</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bandara Asal</td>
                                    <td>:</td>
                                    <td>
                                        <select name="asal">
                                            <option>Soekarno Hatta (CGK)</option>
                                            <option>Husein Sastranegara (BDO)</option>
                                            <option>Abdul Rachman Saleh (MLG)</option>
                                            <option>Juanda (SUB)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tujuan Penerbangan</td>
                                    <td>:</td>
                                    <td>
                                        <select name="tujuan">
                                            <option>Sultan Iskandar Muda (BTJ)</option>
                                            <option>Ngurah Rai (DPS)</option>
                                            <option>Hassanudin (UPG)</option>
                                            <option>Inanwatan (INX)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Tiket</td>
                                    <td>:</td>
                                    <td><input type="number" name="tiket" required></td>
                                </tr>
                            </table>
                            <button type="submit" name="Kirim" class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php

        $berkas = "data.json";
        $dataPenerbangan = [2323];
        $dataJson = file_get_contents($berkas);
        $dataPenerbangan = json_decode($dataJson, true);

        if (isset($_POST['Kirim'])) {
            if ($_POST['asal'] == "Soekarno Hatta (CGK)") {
                $pajak = 50000;
            } elseif ($_POST['asal'] == "Husein Sastranegara (BDO)") {
                $pajak = 30000;
            } elseif ($_POST['asal'] == "Juanda (SUB)") {
                $pajak = 40000;
            } elseif ($_POST['asal'] == "Abdul Rachman Saleh (MLG)") {
                $pajak = 40000;
            }

            if ($_POST['tujuan'] == "Ngurah Rai (DPS)") {
                $pajak2 = 80000;
            } elseif ($_POST['tujuan'] == "Hassanudin (UPG)") {
                $pajak2 = 70000;
            } elseif ($_POST['tujuan'] == "Inanwatan (INX)") {
                $pajak2 = 90000;
            } elseif ($_POST['tujuan'] == "Sultan Iskandar Muda (BTJ)") {
                $pajak2 = 70000;
            }

            $maskapai = array();
            $dataBaru = array(
                'maskapai' => $_POST['maskapai'],
                'bandaraAsal' => $_POST['asal'],
                'bandaraTujuan' => $_POST['tujuan'],
                'hargaTiket' => $_POST['tiket'],
                'pajak' => $pajak + $pajak2,
                'hargaTotal' => $pajak + $pajak2 + $_POST['tiket']
            );


            array_push($dataPenerbangan, $dataBaru);

            $dataJson = json_encode($dataPenerbangan, JSON_PRETTY_PRINT);
            file_put_contents($berkas, $dataJson);
        }
        ?>

        <div class="table-bwh">
            <table class="table-btm" style="text-align:center">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Maskapai</th>
                        <th>Asal Penerbangan</th>
                        <th>Tujuan Penerbangan</th>
                        <th>Harga Tiket</th>
                        <th>Pajak</th>
                        <th>Total Harga Tiket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($dataPenerbangan); $i++) {

                        $maskapai = $dataPenerbangan[$i]['maskapai'];
                        $asalPenerbangan = $dataPenerbangan[$i]['bandaraAsal'];
                        $tujuanPenerbangan = $dataPenerbangan[$i]['bandaraTujuan'];
                        $hargaTiket = $dataPenerbangan[$i]['hargaTiket'];
                        $pajak = $dataPenerbangan[$i]['pajak'];
                        $hargaTotal = $dataPenerbangan[$i]['hargaTotal'];

                        echo "<tr>
                    <td>" . $i + 1 . "</td> 
                    <td>" . $maskapai . "</td> <!-- Data nama. -->
                    <td>" . $asalPenerbangan . "</td> <!-- Data nomor induk siswa. -->
                    <td>" . $tujuanPenerbangan . "</td> <!-- Data jenis kelamin. -->
                    <td>" . $hargaTiket . "</td> <!-- Data tanggal lahir. -->
                    <td>" . $pajak . "</td> <!-- Data kelas. -->
                    <td>" . $hargaTotal . "</td> <!-- Data orang tua. -->
                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>