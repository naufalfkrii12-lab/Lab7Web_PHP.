# Lab7Web_PHP – Praktikum 7: Pemrograman Server-Side dengan PHP

**Mata Kuliah:** Pemrograman Web  
**Nama:** Naufal Fikri  
**NIM:** 312510350  
**Kelas:** I252A

## 1. Tujuan Praktikum
- Memahami perbedaan pemrosesan client-side dan server-side.
- Menjalankan file PHP melalui server lokal.
- Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
- Memproses data form dengan metode GET dan POST.
- Melakukan validasi dan sanitasi input dasar.
- Membangun aplikasi sederhana penerima dan penampil data pengguna.

## 2. Perangkat
Laptop/PC, web browser, Visual Studio Code, PHP 8.x, XAMPP/Laragon (Apache + PHP).

## 3. Cara Menjalankan Server Lokal
1. Instal XAMPP atau Laragon, lalu jalankan layanan **Apache**.
2. Salin folder `Lab7Web_PHP` ke `C:\xampp\htdocs\` (XAMPP) atau `C:\laragon\www\` (Laragon).
3. Buka browser: `http://localhost/Lab7Web_PHP/`.
4. Jangan membuka file `.php` dengan klik ganda (`file://`), karena kode PHP tidak akan dieksekusi.

Alternatif tanpa XAMPP (jika PHP terpasang): `php -S localhost:8000` di dalam folder proyek, lalu buka `http://localhost:8000/`.

## 4. Struktur File
| File | Keterangan |
|---|---|
| `identitas.php` | Banner nama & NIM yang dimuat di setiap halaman |
| `index.php` | Latihan 1 – menjalankan PHP + menu navigasi |
| `latihan2.php` | Variabel, operator, percabangan (nilai akhir & predikat) |
| `latihan3.php` | Perulangan `foreach` dan array (8 nama mahasiswa) |
| `latihan4.php` | Function: diskon, luas persegi panjang, kelulusan |
| `latihan5.php` | Form GET + pencarian nama pada array |
| `latihan6.php` | Form POST (nama & program studi) |
| `latihan7.php` | Pengolahan data: subtotal transaksi |
| `mini_project.php` | Formulir Data Mahasiswa (validasi server-side) |
| `eksperimen.php` | Eksperimen mandiri nomor 1–5 |

## 5. Ringkasan Hasil
- **Latihan 1:** PHP dieksekusi server; browser hanya menerima HTML (kode PHP tidak tampil). Waktu server ditampilkan dengan `date()`.
- **Latihan 2:** Nilai akhir = 30% tugas + 30% UTS + 40% UAS. Data Siti (85, 78, 90) menghasilkan **84,90 → B**. Empat kombinasi uji tambahan menghasilkan predikat A, B, C, dan D.
- **Latihan 3:** Delapan nama ditampilkan dengan `foreach` dalam daftar `<ol>`.
- **Latihan 4:** `hitungDiskon(150000, 10)` = **Rp135.000**; luas 8 × 4 = **32**; fungsi kelulusan memakai batas 60.
- **Latihan 5:** Data dikirim lewat URL (`?kata=...`) dan dicari pada array tanpa membedakan huruf besar/kecil.
- **Latihan 6:** Data POST divalidasi (tidak boleh kosong) dan ditampilkan dengan `htmlspecialchars()`. Input `<script>` tampil sebagai teks biasa, tidak dijalankan.
- **Latihan 7:** Subtotal = harga × jumlah. Contoh: harga 2500,5 × 3 = **Rp7.501,50**. Jumlah 0, negatif, atau non-angka ditolak.
- **Mini Project:** Validasi wajib isi, NIM (angka, 8–12 digit), email (`FILTER_VALIDATE_EMAIL`), semester (bilangan bulat 1–14). Logika dipisah dari tampilan; semua pesan error ditampilkan sekaligus; isian tetap terisi saat ada error.

### Dua kasus input valid
| # | Input | Hasil |
|---|---|---|
| 1 | Nama `Naufal Fikri`, NIM `312510350`, Prodi `Teknik Informatika`, Semester `3`, Email `naufal@mail.com` | Ringkasan data ditampilkan |
| 2 | Latihan 7: Barang `Pensil`, Harga `2500.5`, Jumlah `3` | Subtotal Rp7.501,50 |

### Dua kasus input tidak valid
| # | Input | Hasil |
|---|---|---|
| 1 | Nama kosong, NIM `12ab`, Semester `15`, Email `salah` | Empat pesan error: nama wajib diisi, NIM harus angka 8–12 digit, email tidak valid, semester 1–14 |
| 2 | Latihan 7: Jumlah `0` (atau `-1`) | "Periksa kembali nama barang, harga, dan jumlah." |

Kasus keamanan tambahan: nama `<script>alert(1)</script>` ditampilkan sebagai teks (`&lt;script&gt;...`), bukan dieksekusi.

> Screenshot output ada di bagian 8 dan folder `screenshots/`.

## 6. Jawaban Pertanyaan Evaluasi

**1. Apa perbedaan pemrosesan client-side dan server-side?**  
Client-side dijalankan di browser pengguna (HTML, CSS, JavaScript): menampilkan tampilan dan interaksi. Server-side dijalankan di server (PHP): menerima request, memproses input, menerapkan aturan aplikasi, lalu mengirim respons (biasanya HTML). Pengguna hanya menerima hasilnya, tidak melihat kode server.

**2. Mengapa file PHP harus dijalankan melalui web server?**  
PHP adalah bahasa yang diinterpretasikan oleh mesin PHP di server. Jika file dibuka langsung (`file://`), browser hanya menampilkan teks mentah karena tidak mengenal PHP. Web server (Apache/Nginx) meneruskan file `.php` ke interpreter PHP dan mengirim hasil outputnya ke browser.

**3. Apa fungsi tanda `$` pada variabel PHP?**  
Tanda `$` menandai bahwa sebuah identifier adalah variabel, tempat menyimpan nilai (contoh `$nama = "Andi";`). Nama variabel bersifat case-sensitive (`$nama` ≠ `$Nama`).

**4. Apa perbedaan metode GET dan POST?**  
GET mengirim data lewat parameter URL (terlihat di address bar, tersimpan di riwayat, ada batas panjang), cocok untuk permintaan yang tidak mengubah data seperti pencarian. POST mengirim data pada body request, tidak tampil di URL, lazim untuk pengiriman form dan perubahan data. POST bukan enkripsi; data sensitif tetap harus dilindungi dengan HTTPS.

**5. Mengapa input pengguna perlu divalidasi di sisi server?**  
Validasi sisi klien (atribut `required`, `type="email"`, JavaScript) mudah dilewati, misalnya lewat DevTools atau request langsung. Server tidak boleh memercayai data dari klien, sehingga validasi server-side menjadi pemeriksaan utama untuk menjaga kebenaran data dan mencegah kesalahan serta serangan.

**6. Apa fungsi `htmlspecialchars()` ketika menampilkan data dari form?**  
Fungsi ini mengubah karakter khusus HTML (`<`, `>`, `&`, `"`, `'`) menjadi entitas (`&lt;`, `&gt;`, dll.) sehingga input pengguna tampil sebagai teks biasa, bukan sebagai tag atau script. Ini mengurangi risiko XSS (injeksi HTML/script).

**7. Apa manfaat penggunaan function dalam program PHP?**  
Function membuat kode dapat dipakai ulang (tanpa menulis ulang), lebih terstruktur dan mudah dibaca, mudah diuji dan dirawat (perubahan cukup di satu tempat), serta memisahkan logika menjadi bagian-bagian kecil dengan tugas jelas.

## 7. Eksperimen Mandiri (`eksperimen.php`)
1. Rata-rata tiga nilai: `hitungRataRata(85, 78, 90)` = 84,33.
2. Pencarian nama dari array lewat GET (`?q=...`).
3. Function `formatRupiah()` → `Rp1.500.000`.
4. Validasi NIM: hanya angka, panjang 8–12 digit (juga dipakai di mini project).
5. Tombol **Reset** hanya mengosongkan/mengembalikan isian di browser tanpa request ke server. **Kirim ulang** membuat request baru sehingga PHP memproses ulang dan membuat halaman baru.

## 8. Screenshot Output
Semua screenshot ada di folder `screenshots/` (nama dan NIM tampil di bagian atas setiap halaman).

| Bagian | Screenshot |
|---|---|
| Latihan 1 – PHP berjalan | ![](screenshots/01_latihan1_index.png) |
| Latihan 2 – Nilai & predikat | ![](screenshots/02_latihan2.png) |
| Latihan 3 – foreach & array | ![](screenshots/03_latihan3.png) |
| Latihan 4 – Function | ![](screenshots/04_latihan4.png) |
| Latihan 5 – GET (`?kata=al`) | ![](screenshots/05_latihan5_get.png) |
| Latihan 6 – POST data lengkap | ![](screenshots/06a_latihan6_valid.png) |
| Latihan 6 – POST input kosong | ![](screenshots/06b_latihan6_kosong.png) |
| Latihan 6 – input HTML/kutip tampil aman | ![](screenshots/06c_latihan6_html_aman.png) |
| Latihan 7 – harga desimal (valid) | ![](screenshots/07a_latihan7_valid_desimal.png) |
| Latihan 7 – jumlah 0 (tidak valid) | ![](screenshots/07b_latihan7_jumlah_nol.png) |
| Latihan 7 – jumlah negatif (tidak valid) | ![](screenshots/07c_latihan7_jumlah_negatif.png) |
| Mini Project – data valid | ![](screenshots/08a_miniproject_valid.png) |
| Mini Project – data tidak valid | ![](screenshots/08b_miniproject_tidak_valid.png) |
| Eksperimen mandiri | ![](screenshots/09_eksperimen.png) |
