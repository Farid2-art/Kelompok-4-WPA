<?= $this->include('layouts/header') ?>
<h2>Manajemen User</h2>
<a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary">Tambah User</a>

<table class="table table-striped mt-3">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($users as $user) : ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['nama'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['role'] ?></td>
        <td>
            <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-warning">Edit</a>
            <a href="<?= base_url('admin/users/delete/' . $user['id']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
    <div class="d-flex justify-content-left">
            <a href="http://localhost:8080/index.php/admin" class="btn btn-secondary">Kembali</a>
            <div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
