<?php require_once __DIR__ . '/helpers.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Latihan Function - Halaman 1</title>
</head>
<body>
 <h2>Konversi Suhu dan Status Nilai</h2>
 <?php
 $celcius = 36.5;
 $nilai = 78;
 ?>
 <p><?php echo e((string) $celcius); ?> &deg;C = <?php echo konversiCelciusKeFahrenheit($celcius); ?> &deg;F</p>
 <p>Nilai <?php echo $nilai; ?> mendapat predikat <?php echo tentukanStatusNilai($nilai); ?></p>
 <p><a href="halaman-2.php">Ke halaman 2</a></p>
</body>
</html>
