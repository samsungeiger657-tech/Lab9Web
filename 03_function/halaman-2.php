<?php require_once __DIR__ . '/helpers.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan Function - Halaman 2</title>
</head>
<body>
 <h2>Total Belanja</h2>
 <?php
 $harga = 25000;
 $jumlah = 4;
 $total = hitungTotal($harga, $jumlah);
 ?>
 <p>Harga satuan: <?php echo formatRupiah($harga); ?></p>
 <p>Jumlah: <?php echo $jumlah; ?></p>
 <p>Total: <?php echo formatRupiah($total); ?></p>
 <p>Suhu 100 &deg;C = <?php echo konversiCelciusKeFahrenheit(100); ?> &deg;F</p>
 <p><a href="halaman-1.php">Ke halaman 1</a></p>
</body>
</html>
