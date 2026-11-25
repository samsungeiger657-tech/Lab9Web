<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Aplikasi PHP Modular</title>
 <base href="<?php echo e(BASE_URL); ?>">
 <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
 <header>
 <h1>Aplikasi PHP Modular</h1>
 <p>Contoh pemisahan template dan konten</p>
 </header>
 <nav>
 <a href="index.php?page=dashboard" class="<?php echo navClass('dashboard', $activePage); ?>">Dashboard</a>
 <a href="index.php?page=user/list" class="<?php echo navClass('user/list', $activePage); ?>">Data Pengguna</a>
 <a href="index.php?page=user/add" class="<?php echo navClass('user/add', $activePage); ?>">Tambah Pengguna</a>
 <a href="index.php?page=tentang" class="<?php echo navClass('tentang', $activePage); ?>">Tentang</a>
 </nav>
 <main>
 <?php echo tampilFlash(); ?>
