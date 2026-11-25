<?php
require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/header.php';

$nama = '';
$email = '';
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $nama = trim($_POST['nama'] ?? '');
 $email = trim($_POST['email'] ?? '');

 if ($nama === '') {
 $pesan = 'Nama wajib diisi.';
 } elseif (!validasiEmail($email)) {
 $pesan = 'Format email tidak valid.';
 } else {
 $pesan = 'Pendaftaran berhasil untuk ' . $nama . ' (' . $email . ').';
 }
}
?>
<section class="content">
 <h2>Form Pendaftaran</h2>
 <?php if ($pesan !== ''): ?>
 <p><strong><?php echo e($pesan); ?></strong></p>
 <?php endif; ?>
 <form method="post" action="">
 <p>
 <label>Nama</label><br>
 <input type="text" name="nama" value="<?php echo e($nama); ?>">
 </p>
 <p>
 <label>Email</label><br>
 <input type="text" name="email" value="<?php echo e($email); ?>">
 </p>
 <button type="submit">Daftar</button>
 </form>
</section>
<?php require_once __DIR__ . '/footer.php'; ?>
