<?= $this->include('layouts/header') ?>
<h2>Tambah User</h2>

<form action="<?= base_url('admin/users/store') ?>" method="post">
    <label>Nama:</label>
    <input type="text" name="nama" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Role:</label>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="dokter">Dokter</option>
        <option value="konsumen">Konsumen</option>
    </select><br>

    <button type="submit" class="btn btn-success">Simpan</button>
</form>
<?= $this->include('layouts/footer') ?>
