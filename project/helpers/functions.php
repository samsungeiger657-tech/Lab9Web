<?php
function formatRupiah(float $angka): string {
 return 'Rp ' . number_format($angka, 0, ',', '.');
}

function e(string $nilai): string {
 return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

function hitungDiskon(float $harga, float $persen = 10): float {
 return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool {
 return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $batas = 100): string {
 if (mb_strlen($teks) <= $batas) {
 return $teks;
 }
 return rtrim(mb_substr($teks, 0, $batas)) . '...';
}

// ambil input post sebagai string (kosong kalau tidak ada / bukan string)
function inputPost(string $kunci): string {
 $nilai = $_POST[$kunci] ?? '';
 return is_string($nilai) ? trim($nilai) : '';
}

function redirect(string $page): void {
 header('Location: ' . BASE_URL . 'index.php?page=' . $page);
 exit;
}

// pesan sukses / gagal setelah operasi CRUD
function setFlash(string $tipe, string $pesan): void {
 $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function tampilFlash(): string {
 if (empty($_SESSION['flash'])) {
 return '';
 }
 $f = $_SESSION['flash'];
 unset($_SESSION['flash']);
 return '<div class="alert alert-' . e($f['tipe']) . '">' . e($f['pesan']) . '</div>';
}

// menu aktif
function navClass(string $route, string $aktif): string {
 return $route === $aktif ? 'active' : '';
}

// csrf
function csrfToken(): string {
 if (empty($_SESSION['csrf_token'])) {
 $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
 }
 return $_SESSION['csrf_token'];
}

function csrfValid(string $token): bool {
 return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>
