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
?>
