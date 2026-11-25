<?php
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/header.php';

$produk = [
 ['nama' => 'Laptop', 'harga' => 7500000, 'deskripsi' => 'Laptop untuk kuliah dan pekerjaan sehari-hari dengan baterai tahan lama dan layar yang nyaman dipakai berjam-jam.'],
 ['nama' => 'Mouse', 'harga' => 120000, 'deskripsi' => 'Mouse nirkabel dengan sensor presisi.'],
 ['nama' => 'Keyboard', 'harga' => 350000, 'deskripsi' => 'Keyboard mekanik dengan switch yang responsif, cocok untuk mengetik kode dalam waktu lama.'],
];
?>
<section class="content">
 <h2>Daftar Produk</h2>
 <table border="1" cellpadding="8" cellspacing="0">
 <tr>
 <th>Nama</th>
 <th>Harga</th>
 <th>Diskon 10%</th>
 <th>Harga Akhir</th>
 <th>Deskripsi</th>
 </tr>
 <?php foreach ($produk as $p): ?>
 <?php $diskon = hitungDiskon($p['harga']); ?>
 <tr>
 <td><?php echo e($p['nama']); ?></td>
 <td><?php echo formatRupiah($p['harga']); ?></td>
 <td><?php echo formatRupiah($diskon); ?></td>
 <td><?php echo formatRupiah($p['harga'] - $diskon); ?></td>
 <td><?php echo e(ringkasTeks($p['deskripsi'], 50)); ?></td>
 </tr>
 <?php endforeach; ?>
 </table>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
