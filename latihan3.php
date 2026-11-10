<?php
// 4 nama dari modul + 4 nama tambahan (minimal 3 sesuai instruksi)
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Farhan", "Gita", "Hana"];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 3</title>
</head>
<body>
<?php include __DIR__ . "/identitas.php"; ?>
<?php
echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
echo "<p>Jumlah mahasiswa: " . count($mahasiswa) . "</p>";
?>
<p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
