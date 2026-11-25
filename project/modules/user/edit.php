<?php
// modules/user/edit.php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$user = false;

if ($id !== false && $id !== null) {
 $stmt = $pdo->prepare('SELECT id, nama, email FROM users WHERE id = :id');
 $stmt->execute(['id' => $id]);
 $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$user) {
 setFlash('gagal', 'Data pengguna tidak ditemukan.');
 redirect('user/list');
}

$errors = [];
$nama = $user['nama'];
$email = $user['email'];

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
 $stmt = $pdo->prepare('UPDATE users SET nama = :nama, email = :email WHERE id = :id');
 $stmt->execute(['nama' => $nama, 'email' => $email, 'id' => $id]);
 setFlash('sukses', 'Data pengguna berhasil diubah.');
 redirect('user/list');
 } catch (PDOException $ex) {
 if ($ex->getCode() === '23000') {
 $errors[] = 'Email sudah dipakai pengguna lain.';
 } else {
 error_log($ex->getMessage());
 $errors[] = 'Data gagal diubah.';
 }
 }
 }
}
?>
<section>
 <h2>Ubah Pengguna</h2>
 <?php foreach ($errors as $err): ?>
 <div class="alert alert-gagal"><?php echo e($err); ?></div>
 <?php endforeach; ?>
 <form method="post" action="index.php?page=user/edit&amp;id=<?php echo (int) $id; ?>">
 <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">
 <label>Nama</label>
 <input type="text" name="nama" value="<?php echo e($nama); ?>" required>
 <label>Email</label>
 <input type="text" name="email" value="<?php echo e($email); ?>" required>
 <button type="submit">Simpan Perubahan</button>
 <a href="index.php?page=user/list">Batal</a>
 </form>
</section>
