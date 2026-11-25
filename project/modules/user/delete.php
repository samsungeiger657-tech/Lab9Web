<?php
// modules/user/delete.php
// hanya menerima POST, data tidak dihapus lewat URL biasa (GET)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
 setFlash('gagal', 'Penghapusan harus dilakukan melalui tombol Hapus.');
 redirect('user/list');
}

if (!csrfValid(inputPost('csrf_token'))) {
 setFlash('gagal', 'Token tidak valid, data tidak dihapus.');
 redirect('user/list');
}

$id = filter_var(inputPost('id'), FILTER_VALIDATE_INT);
if ($id === false) {
 setFlash('gagal', 'ID pengguna tidak valid.');
 redirect('user/list');
}

try {
 $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
 $stmt->execute(['id' => $id]);
 if ($stmt->rowCount() > 0) {
 setFlash('sukses', 'Data pengguna berhasil dihapus.');
 } else {
 setFlash('gagal', 'Data pengguna tidak ditemukan.');
 }
} catch (PDOException $ex) {
 error_log($ex->getMessage());
 setFlash('gagal', 'Data gagal dihapus.');
}
redirect('user/list');
