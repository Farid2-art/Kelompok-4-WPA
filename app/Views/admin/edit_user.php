<?= $this->include('layouts/header') ?>
<h2>Edit User</h2>

<form action="<?= base_url('admin/users/update/' . $user['id']) ?>" method="post">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $user['nama'] ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= $user['email'] ?>" required><br>

    <label>Role:</label>
    <select name="role">
        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        <option value="dokter" <?= $user['role'] == 'dokter' ? 'selected' : '' ?>>Dokter</option>
        <option value="konsumen" <?= $user['role'] == 'konsumen' ? 'selected' : '' ?>>Konsumen</option>
    </select><br>

    <button type="submit" class="btn btn-success">Update</button>
</form>
<?= $this->include('layouts/footer') ?>
