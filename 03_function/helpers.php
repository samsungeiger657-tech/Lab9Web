<?php
// helpers.php
function formatRupiah(float $angka): string {
 return 'Rp ' . number_format($angka, 0, ',', '.');
}
function e(string $nilai): string {
 return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

// function untuk latihan function
function konversiCelciusKeFahrenheit($c) {
 return ($c * 9 / 5) + 32;
}
function tentukanStatusNilai($nilai) {
 if ($nilai >= 85) {
 return 'A';
 } elseif ($nilai >= 70) {
 return 'B';
 } elseif ($nilai >= 55) {
 return 'C';
 } elseif ($nilai >= 40) {
 return 'D';
 }
 return 'E';
}
function hitungTotal($harga, $jumlah) {
 return $harga * $jumlah;
}
?>
