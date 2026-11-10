<?php
function hitungDiskon($harga, $persen)
{
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

// Function tambahan 1: luas persegi panjang
function hitungLuasPersegiPanjang($panjang, $lebar)
{
    return $panjang * $lebar;
}

// Function tambahan 2: menentukan kelulusan
function tentukanKelulusan($nilai)
{
    return $nilai >= 60 ? "LULUS" : "TIDAK LULUS";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 4</title>
</head>
<body>
<?php include __DIR__ . "/identitas.php"; ?>
<h2>Latihan 4 – Function</h2>
<?php
$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "<br>";

echo "Luas persegi panjang 8 x 4 = " . hitungLuasPersegiPanjang(8, 4) . "<br>";

foreach ([85, 60, 59] as $n) {
    echo "Nilai $n: " . tentukanKelulusan($n) . "<br>";
}
?>
<p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
