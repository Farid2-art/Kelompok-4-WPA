<?= $this->extend('layouts/header') ?>
<?= $this->section('content') ?>

<h2>Dashboard Konsumen</h2>
<ul>
    <li><a href="<?= base_url('/konsumen/konsultasi') ?>">Jadwal Konsultasi</a></li>
    <li><a href="<?= base_url('/konsumen/layanan') ?>">Layanan Grooming</a></li>
    <li><a href="<?= base_url('/konsumen/produk') ?>">Belanja Produk</a></li>
    <li><a href="<?= base_url('/konsumen/transaksi') ?>">Riwayat Transaksi</a></li>
</ul>

<?= $this->endSection() ?>
<?= $this->include('layouts/footer') ?>
