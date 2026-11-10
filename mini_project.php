<?php
/* =========================================================
 * BAGIAN 1 – PEMROSESAN DATA (logika)
 * ========================================================= */
const SEMESTER_MIN = 1;
const SEMESTER_MAX = 14;
const NIM_MIN = 8;   // panjang NIM minimal
const NIM_MAX = 12;  // panjang NIM maksimal

function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, "UTF-8");
}

function ambil(string $kunci): string
{
    $nilai = $_POST[$kunci] ?? "";
    return is_string($nilai) ? trim($nilai) : "";
}

$data = null;
$error = [];
$old = ["nama" => "", "nim" => "", "prodi" => "", "semester" => "", "email" => ""];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($old as $kunci => $_) {
        $old[$kunci] = ambil($kunci);
    }
    ["nama" => $nama, "nim" => $nim, "prodi" => $prodi,
     "semester" => $semesterInput, "email" => $email] = $old;

    if ($nama === "")  $error[] = "Nama wajib diisi.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!preg_match('/^\d{' . NIM_MIN . ',' . NIM_MAX . '}$/', $nim)) {
        $error[] = "NIM harus berupa angka dengan panjang " . NIM_MIN . "–" . NIM_MAX . " digit.";
    }

    if ($email === "") {
        $error[] = "Email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (
        !ctype_digit($semesterInput) ||
        (int)$semesterInput < SEMESTER_MIN ||
        (int)$semesterInput > SEMESTER_MAX
    ) {
        $error[] = "Semester harus berupa angka " . SEMESTER_MIN . "–" . SEMESTER_MAX . ".";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}
?>
<!-- =========================================================
     BAGIAN 2 – TAMPILAN (HTML)
     ========================================================= -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Data Mahasiswa</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 520px; margin: 2rem auto; padding: 0 1rem; }
        label { display: block; margin-top: .8rem; font-weight: 600; }
        input { width: 100%; padding: .5rem; box-sizing: border-box; }
        button { margin-top: 1rem; padding: .5rem 1rem; }
        .error { background: #fdecea; border: 1px solid #f5c2c0; padding: .6rem 1rem; border-radius: 6px; }
        .ok { background: #eaf7ee; border: 1px solid #b7e1c1; padding: .6rem 1rem; border-radius: 6px; }
        table { border-collapse: collapse; width: 100%; }
        td { padding: .4rem; border-bottom: 1px solid #ddd; }
        td:first-child { width: 40%; font-weight: 600; }
    </style>
</head>
<body>
<?php include __DIR__ . "/identitas.php"; ?>
<h1>Formulir Data Mahasiswa</h1>

<?php if ($error): ?>
    <div class="error">
        <strong>Data belum valid:</strong>
        <ul>
            <?php foreach ($error as $pesan): ?>
                <li><?= e($pesan) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($data): ?>
    <div class="ok">
        <h3>Data berhasil diterima</h3>
        <table>
            <tr><td>Nama</td><td><?= e($data["nama"]) ?></td></tr>
            <tr><td>NIM</td><td><?= e($data["nim"]) ?></td></tr>
            <tr><td>Program Studi</td><td><?= e($data["prodi"]) ?></td></tr>
            <tr><td>Semester</td><td><?= $data["semester"] ?></td></tr>
            <tr><td>Email</td><td><?= e($data["email"]) ?></td></tr>
        </table>
    </div>
<?php endif; ?>

<form method="POST" action="" novalidate>
    <label for="nama">Nama</label>
    <input id="nama" name="nama" type="text" value="<?= e($old["nama"]) ?>" required>

    <label for="nim">NIM</label>
    <input id="nim" name="nim" type="text" inputmode="numeric" value="<?= e($old["nim"]) ?>" required>

    <label for="prodi">Program Studi</label>
    <input id="prodi" name="prodi" type="text" value="<?= e($old["prodi"]) ?>" required>

    <label for="semester">Semester (<?= SEMESTER_MIN ?>–<?= SEMESTER_MAX ?>)</label>
    <input id="semester" name="semester" type="number" min="<?= SEMESTER_MIN ?>" max="<?= SEMESTER_MAX ?>"
           value="<?= e($old["semester"]) ?>" required>

    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="<?= e($old["email"]) ?>" required>

    <button type="submit">Kirim</button>
    <button type="reset">Reset</button>
</form>
<p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
