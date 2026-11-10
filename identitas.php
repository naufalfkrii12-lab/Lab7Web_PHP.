<?php
// Identitas praktikan – ditampilkan di bagian atas setiap halaman.
// Ubah di sini saja jika data perlu diganti.
$identitasNama = "Naufal Fikri";
$identitasNim  = "312510350";
?>
<div style="font-size:.9rem;padding:.4rem .8rem;margin-bottom:1rem;background:#f1f3f5;border-left:4px solid #4c6ef5;">
    <strong><?= htmlspecialchars($identitasNama, ENT_QUOTES, "UTF-8") ?></strong>
    &nbsp;|&nbsp; NIM: <?= htmlspecialchars($identitasNim, ENT_QUOTES, "UTF-8") ?>
    &nbsp;|&nbsp; Praktikum 7 – Pemrograman Web
</div>
