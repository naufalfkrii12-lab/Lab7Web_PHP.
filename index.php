<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Praktikum PHP</title>
</head>
<body>
<?php include __DIR__ . "/identitas.php"; ?>
    <h1>Belajar PHP</h1>
    <?php
    echo "<p>PHP berhasil dijalankan.</p>";
    echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    ?>

    <h2>Daftar Latihan</h2>
    <ul>
        <li><a href="latihan2.php">Latihan 2 – Variabel, operator, percabangan</a></li>
        <li><a href="latihan3.php">Latihan 3 – Perulangan dan array</a></li>
        <li><a href="latihan4.php">Latihan 4 – Function</a></li>
        <li><a href="latihan5.php">Latihan 5 – Form GET</a></li>
        <li><a href="latihan6.php">Latihan 6 – Form POST</a></li>
        <li><a href="latihan7.php">Latihan 7 – Pengolahan data sederhana</a></li>
        <li><a href="mini_project.php">Mini Project – Formulir Data Mahasiswa</a></li>
        <li><a href="eksperimen.php">Eksperimen Mandiri</a></li>
    </ul>
</body>
</html>
