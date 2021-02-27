    <!-- // Wisnu Wicaksono
    // JWD4-2021-G2 -->

    <?php
    echo "[Struktur Program - Percabangan]";
    echo "<br>";
    echo "[Case: Penilangan Otomatis Restriksi Jalan Ganjil Genap]";
    echo "<br>";
    $NOPOL = rand(1000, 9999);
    $NOPOL2 = substr($NOPOL, -1);
    $ABC = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $ABC2 = substr(str_shuffle($ABC), 0, 3);
    echo "[No Polisi B $NOPOL $ABC2]";
    echo "<br>";

    if ($NOPOL2 % 2 === 0) {
        echo "[Hasil : Kendaraan B $NOPOL $ABC2 diizinkan lewat]";
    } else {
        echo "[Hasil : Kendaraan B $NOPOL $ABC2 tidak diizinkan lewat]";
    }
    ?>
    <br>
    <button onClick="window.location.href=window.location.href">Refresh Page</button>