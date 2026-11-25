<?php
// modules/user/list.php
$users = $pdo->query('SELECT id, nama, email, created_at FROM users ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
 <h2>Data Pengguna</h2>
 <p>Daftar pengguna ditampilkan pada bagian ini.</p>
 <a href="index.php?page=user/add" class="btn">Tambah Pengguna</a>

 <table>
 <thead>
 <tr>
 <th>No</th>
 <th>Nama</th>
 <th>Email</th>
 <th>Dibuat</th>
 <th>Aksi</th>
 </tr>
 </thead>
 <tbody>
 <?php if (count($users) === 0): ?>
 <tr><td colspan="5">Belum ada data.</td></tr>
 <?php endif; ?>
 <?php foreach ($users as $i => $u): ?>
 <tr>
 <td><?php echo $i + 1; ?></td>
 <td><?php echo e($u['nama']); ?></td>
 <td><?php echo e($u['email']); ?></td>
 <td><?php echo e($u['created_at']); ?></td>
 <td>
 <a href="index.php?page=user/edit&amp;id=<?php echo (int) $u['id']; ?>">Ubah</a>
 <form method="post" action="index.php?page=user/delete" class="inline"
 onsubmit="return confirm('Hapus data ini?');">
 <input type="hidden" name="csrf_token" value="<?php echo e(csrfToken()); ?>">
 <input type="hidden" name="id" value="<?php echo (int) $u['id']; ?>">
 <button type="submit" class="link-hapus">Hapus</button>
 </form>
 </td>
 </tr>
 <?php endforeach; ?>
 </tbody>
 </table>
</section>
