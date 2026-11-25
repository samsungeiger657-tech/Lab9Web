<?php
$total = (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
$terbaru = $pdo->query('SELECT nama, email FROM users ORDER BY id DESC LIMIT 5')->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
 <h2>Dashboard</h2>
 <p>Total pengguna terdaftar: <strong><?php echo $total; ?></strong></p>

 <h3>Pengguna terbaru</h3>
 <?php if (count($terbaru) === 0): ?>
 <p>Belum ada data pengguna.</p>
 <?php else: ?>
 <ul>
 <?php foreach ($terbaru as $u): ?>
 <li><?php echo e($u['nama']); ?> (<?php echo e($u['email']); ?>)</li>
 <?php endforeach; ?>
 </ul>
 <?php endif; ?>
 <a href="index.php?page=user/list">Lihat semua pengguna</a>
</section>
