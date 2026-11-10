<?php
$nama = "";
$prodi = "";
$pesan = "";
$diterima = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama  = trim((string)($_POST["nama"] ?? ""));
    $prodi = trim((string)($_POST["prodi"] ?? ""));

    if ($nama === "" || $prodi === "") {
        $pesan = "Semua kolom wajib diisi.";
    } else {
        $diterima = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 6 – POST</title>
</head>
<body>
<?php include __DIR__ . "/identitas.php"; ?>
<h2>Latihan 6 – Form POST</h2>
<form method="POST" action="">
    <p>
        <label for="nama">Nama:</label>
        <input id="nama" name="nama" type="text" required
               value="<?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>">
    </p>
    <p>
        <label for="prodi">Program Studi:</label>
        <input id="prodi" name="prodi" type="text" required
               value="<?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?>">
    </p>
    <button type="submit" name="kirim">Kirim Data</button>
</form>

<?php
if ($pesan !== "") {
    echo "<p style='color:red'>" . htmlspecialchars($pesan) . "</p>";
}
if ($diterima) {
    echo "<h3>Data diterima</h3>";
    echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
    echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
}
?>
<p><small>Uji: data lengkap, input kosong (hapus atribut <code>required</code> lewat DevTools),
dan input seperti <code>&lt;script&gt;alert(1)&lt;/script&gt;</code> atau tanda kutip <code>"</code>.</small></p>
<p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
