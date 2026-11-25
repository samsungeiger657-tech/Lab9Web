<?php
// modules/user/add.php
$errors = [];
$nama = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $nama = inputPost('nama');
 $email = inputPost('email');

 if (!csrfValid(inputPost('csrf_token'))) {
 $errors[] = 'Token form tidak valid, silakan coba lagi.';
 }
 if ($nama === '' || mb_strlen($nama) > 100) {
 $errors[] = 'Nama wajib diisi dan maksimal 100 karakter.';
 }
 if (!validasiEmail($email) || mb_strlen($email) > 150) {
 $errors[] = 'Format email tidak valid.';
 }

 if (count($errors) === 0) {
 try {
 $stmt = $pdo->prepare('INSERT INTO users (nama, email) VALUES (:nama, :email)');
 $stmt->execute(['nama' => $nama, 'email' => $email]);
 setFlash('sukses', 'Data pengguna berhasil ditambahkan.');
 redirect('user/list');
 } catch (PDOException $ex) {
 if ($ex->getCode() === '23000') {
 $errors[] = 'Email sudah terdaftar.';
 } else {
 error_log($ex->getMessage());
 $errors[] = 'Data gagal disimpan.';
 }
 }
 }
}
?>
<section>
 <h2>Tambah Pengguna</h2>
 <?php foreach ($errors as $err): ?>
 <div class="alert alert-gagal"><?php echo e($err); ?></div>
 <?php endforeach; ?>
 <form method="post" action="index.php?page=user/add">
 <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">
 <label>Nama</label>
 <input type="text" name="nama" value="<?php echo e($nama); ?>" required>
 <label>Email</label>
 <input type="text" name="email" value="<?php echo e($email); ?>" required>
 <button type="submit">Simpan</button>
 <a href="index.php?page=user/list">Batal</a>
 </form>
</section>
