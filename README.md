# Lab9Web - Praktikum 9: PHP Modular

Nama  : ...........
NIM   : ...........
Kelas : ...........

## Tujuan
Latihan memecah aplikasi PHP ke beberapa file: template (header/footer), function (helper),
struktur direktori, routing dengan parameter `page`, dan refactoring CRUD pengguna.

## Kebutuhan
- PHP 7.4 atau lebih baru (ekstensi pdo_mysql dan mbstring aktif)
- Apache + MySQL/MariaDB (XAMPP / Laragon)
- Browser dan editor kode

## Cara menjalankan
1. Salin folder `Lab9Web` ke docroot (contoh `C:\xampp\htdocs\Lab9Web`).
2. Start Apache dan MySQL.
3. Import `database.sql` lewat phpMyAdmin (database `db_latihan`, tabel `users`).
4. Sesuaikan user/password MySQL di `project/config/database.php` jika berbeda.
5. Buka di browser:
   - `http://localhost/Lab9Web/01_include_require/uji-include.php`
   - `http://localhost/Lab9Web/02_template/home.php`
   - `http://localhost/Lab9Web/03_function/halaman-1.php`
   - `http://localhost/Lab9Web/04_latihan1_template/home.php`
   - `http://localhost/Lab9Web/05_latihan2_library/produk.php`
   - `http://localhost/Lab9Web/project/index.php`

## Struktur direktori
```
Lab9Web/
├── 01_include_require/     praktik include dan require
├── 02_template/            template header/footer
├── 03_function/            latihan function + helpers.php
├── 04_latihan1_template/   Latihan 1 (Home, Profil, Kontak)
├── 05_latihan2_library/    Latihan 2 (helpers/functions.php)
├── project/                Latihan 3 dan 4 (router + CRUD modular)
│   ├── index.php
│   ├── .htaccess
│   ├── config/database.php
│   ├── views/              header, footer, dashboard, tentang, 404
│   ├── helpers/functions.php
│   ├── modules/user/       list, add, edit, delete
│   ├── modules/auth/
│   └── assets/css, assets/js
└── database.sql
```

## Daftar rute (project)
| page          | file                        |
|---------------|-----------------------------|
| dashboard     | views/dashboard.php         |
| tentang       | views/tentang.php           |
| user/list     | modules/user/list.php       |
| user/add      | modules/user/add.php        |
| user/edit     | modules/user/edit.php       |
| user/delete   | modules/user/delete.php     |

Selain rute di atas, router menampilkan `views/404.php` dengan status 404.

Contoh: `index.php?page=user/list`. Jika `.htaccess` aktif: `/Lab9Web/project/user/list`.

## Langkah praktikum
1. **Include dan require** - `uji-include.php` dan `uji-require.php` memanggil `pesan.php`.
   Setelah `pesan.php` di-rename: `include` menampilkan warning lalu baris "Sesudah pemanggilan"
   tetap tampil; `require` menampilkan fatal error dan baris sesudahnya tidak dijalankan.
2. **Template** - `header.php` dan `footer.php` dipakai oleh semua halaman lewat `require_once`.
3. **Function** - function tanpa parameter, dengan parameter, return, type declaration,
   lalu dipindah ke `helpers.php` dan dipanggil dari dua halaman.
4. **Struktur direktori** - mengikuti bagian F pada modul (`project/`).
5. **Routing** - `index.php` memakai array whitelist `$routes`; input `page` tidak pernah
   dipakai langsung sebagai path file.
6. **.htaccess** - aturan rewrite dari modul, diletakkan di `project/.htaccess`.
7. **Integrasi CRUD** - koneksi PDO hanya di `config/database.php`, tampilan lewat `views/`,
   function umum di `helpers/functions.php`, halaman CRUD di `modules/user/`.

## Analisis hasil (template)
- Yang dipakai bersama: header, navigasi, dan footer.
- Jika teks navigasi diubah di `header.php`, semua halaman ikut berubah.
- Konten tidak ditaruh di `header.php` karena header dipakai semua halaman, sedangkan isi tiap halaman berbeda.
- `require_once` membuat file template cukup ditulis sekali dan tidak dimuat dobel.

## Catatan pengerjaan
- Hapus data hanya lewat POST (tombol Hapus) dan memakai token CSRF.
- Ditambahkan `ob_start()` di `index.php` supaya `header('Location: ...')` tetap bisa dipakai
  setelah header HTML dimuat oleh router.
- Ditambahkan `<base href>` di header supaya CSS tetap terbaca saat URL memakai rewrite.
- Tantangan mandiri yang dikerjakan: menu aktif, pesan sukses/gagal (flash), dan `.htaccess`.
  Pembatasan login belum dikerjakan.

## Kendala
| Kendala | Cara mengatasi |
|---------|----------------|
| CSS tidak muncul saat memakai URL rewrite | Tambah `<base href>` di `views/header.php` |
| Redirect setelah simpan gagal (headers already sent) | Pakai `ob_start()` di `index.php` |
| `/project/user/list` 404 dari Apache | Aktifkan `mod_rewrite` dan `AllowOverride All` |

## Screenshot
Tambahkan screenshot struktur direktori, template, function, routing, dan hasil CRUD di folder `screenshot/`.
