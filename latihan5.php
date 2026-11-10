<?php
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Farhan", "Gita", "Hana", "Alif"];
$kata = null;
$hasil = [];

if (isset($_GET["kata"])) {
    $kata = trim((string)$_GET["kata"]);
    if ($kata !== "") {
        foreach ($daftarNama as $n) {
            if (stripos($n, $kata) !== false) {   // pencarian tanpa membedakan huruf besar/kecil
                $hasil[] = $n;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 5 – GET</title>
</head>
<body>
<?php include __DIR__ . "/identitas.php"; ?>
<h2>Latihan 5 – Form GET</h2>
<form method="GET" action="">
    <label for="kata">Kata kunci:</label>
    <input id="kata" name="kata" type="text"
           value="<?= htmlspecialchars($kata ?? "", ENT_QUOTES, "UTF-8") ?>">
    <button type="submit">Cari</button>
</form>

<?php
if ($kata !== null) {
    echo "<p>Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
    if ($kata === "") {
        echo "<p>Masukkan kata kunci terlebih dahulu.</p>";
    } elseif ($hasil) {
        echo "<p>Ditemukan " . count($hasil) . " nama:</p><ul>";
        foreach ($hasil as $h) {
            echo "<li>" . htmlspecialchars($h, ENT_QUOTES, "UTF-8") . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Tidak ada nama yang cocok.</p>";
    }
}
?>
<p><small>Amati URL setelah submit (contoh: <code>latihan5.php?kata=al</code>).
Jangan gunakan GET untuk kata sandi atau data sensitif.</small></p>
<p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
