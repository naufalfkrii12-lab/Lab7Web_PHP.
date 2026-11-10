<?php
function hitungNilaiAkhir(float $tugas, float $uts, float $uas): float
{
    return ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
}

function tentukanPredikat(float $nilai): string
{
    if ($nilai >= 85) {
        return "A";
    } elseif ($nilai >= 75) {
        return "B";
    } elseif ($nilai >= 60) {
        return "C";
    }
    return "D";
}

// Data utama dari modul
$nama = "Siti";
$tugas = 85;
$uts = 78;
$uas = 90;
$nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);
$predikat = tentukanPredikat($nilaiAkhir);

// Kombinasi uji tambahan
$uji = [
    ["Budi",  90, 90, 90],
    ["Rina",  70, 75, 80],
    ["Joko",  60, 55, 65],
    ["Dewi",  40, 30, 50],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 2</title>
</head>
<body>
<?php include __DIR__ . "/identitas.php"; ?>
<h2>Latihan 2 – Variabel, Operator, dan Percabangan</h2>
<?php
echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Predikat: " . $predikat;
?>

<h3>Pengujian Beberapa Kombinasi Nilai</h3>
<table border="1" cellpadding="6" cellspacing="0">
    <tr><th>Nama</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th>Predikat</th></tr>
    <?php foreach ($uji as [$n, $t, $u, $a]):
        $na = hitungNilaiAkhir($t, $u, $a); ?>
        <tr>
            <td><?= htmlspecialchars($n) ?></td>
            <td><?= $t ?></td>
            <td><?= $u ?></td>
            <td><?= $a ?></td>
            <td><?= number_format($na, 2) ?></td>
            <td><?= tentukanPredikat($na) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
