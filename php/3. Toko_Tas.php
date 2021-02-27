<!DOCTYPE HTML>
<html>

<body>
    <?php
    //jenis member
    //$jenismember = ["nonmember","platinum","gold","silver"];
    function diskon($jenismember, $banyakbarang)
    {
        if ($jenismember == "nonmember" and $banyakbarang >= 10) {
            $diskon = 0.05;
        } elseif ($jenismember == "platinum" and $banyakbarang >= 3) {
            $diskon = 0.1;
        } elseif ($jenismember == "gold" and $banyakbarang >= 5) {
            $diskon = 0.1;
        } elseif ($jenismember == "silver" and $banyakbarang >= 3) {
            $diskon = 0.05;
        } else {
            $diskon = 0;
        }
        return $diskon;
    }

    //perhitungan
    function hargabarang($merk, $harga = 0)
    {
        if ($merk == "Guess") {
            $harga = 2000000;
        } elseif ($merk == "Coach") {
            $harga = 3000000;
        } elseif ($merk == "Zara") {
            $harga = 1500000;
        } elseif ($merk == "Bodypack") {
            $harga = 1000000;
        }
        return $harga;
    }
    //total

    function totalharga($harga, $diskon, $jumlahbarang)
    {
        $totalharga = ($harga * $jumlahbarang) - (($harga * $jumlahbarang) * $diskon);
        return $totalharga;
    }
    ?>
    <h1> Perhitungan Harga Tas Toko XYZ </h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Nomor Transaksi</td>
                <td>:</td>
                <td><input type="text" name="nomortransaksi"></td>
            </tr>
            <tr>
                <td>Jenis Member</td>
                <td>:</td>
                <td><select name="jenismember">
                        <option>Non Member</option>
                        <option>Platinum</option>
                        <option>Gold</option>
                        <option>Silver</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Merk</td>
                <td>:</td>
                <td><select name="merk">
                        <option>Guess</option>
                        <option>Coach</option>
                        <option>Zara</option>
                        <option>Bodypack</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td>:</td>
                <td><input type="number" name="jumlahbarang"></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="submit" value="BAYAR"><br>
    </form>
    <hr>
    <?php
    // validasi tombol submit ketika ditekan
    if (isset($_POST["submit"])) {
        // menyimpan data dari form input ke array
        $no_transaksi = $_POST["nomortransaksi"];
        $jenismember = $_POST["jenismember"];
        $jumlahbarang = $_POST["jumlahbarang"];
        $merk = $_POST["merk"];
        $diskon = diskon($jenismember, $jumlahbarang);
        $harga = hargabarang($merk);
        $totalharga = totalharga($harga, $diskon, $jumlahbarang);


        $dataCustomer = [
            "nomortransaksi" => $no_transaksi,
            "jenismember" => $jenismember,
            "merk" => $merk,
            "jumlahbarang" => $jumlahbarang,
            "totalharga" => $totalharga
        ];
    ?>
        <h1>RECIPT</h1>
        <table>
            <tr>
                <td> Nomor Transaksi</td>
                <td>:</td>
                <td><?php echo $dataCustomer["nomortransaksi"]; ?></td>
            </tr>
            <tr>
                <td> Member</td>
                <td>:</td>
                <td><?php echo $dataCustomer["jenismember"]; ?></td>
            </tr>
            <tr>
                <td>Merk Barang</td>
                <td>:</td>
                <td><?php echo $dataCustomer["merk"]; ?></td>
            </tr>
            <tr>
                <td> Jumlah Barang</td>
                <td>:</td>
                <td><?php echo $dataCustomer["jumlahbarang"]; ?></td>
            </tr>
            <tr>
                <td> Total Harga</td>
                <td>:</td>
                <td><?php echo $dataCustomer["totalharga"]; ?></td>
            </tr>

        </table>
    <?php } ?>
</body>

</html>

<!-- // Wisnu Wicaksono
// JWD4-2021-G2 -->