<?= $this->extend('layouts/header') ?>
<?= $this->section('content') ?>

<h2>Jadwal Konsultasi</h2>
<form action="<?= base_url('/konsumen/konsultasi/simpan') ?>" method="POST">
    <label>Pilih Dokter:</label>
    <select name="dokter_id">
        <?php foreach ($dokter as $d) : ?>
            <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>Pilih Jadwal:</label>
    <input type="datetime-local" name="jadwal">
    <button type="submit">Simpan</button>
</form>

<?= $this->endSection() ?>
<?= $this->include('layouts/footer') ?>
