<?= $this->extend('layouts/header') ?>
<?= $this->section('content') ?>

<h2>Daftar Produk</h2>
<?php foreach ($produk as $p) : ?>
    <p><?= $p['nama_produk'] ?> - Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
    <form action="<?= base_url('/konsumen/produk/beli') ?>" method="POST">
        <input type="hidden" name="produk_id" value="<?= $p['id'] ?>">
        <input type="number" name="jumlah" min="1" max="<?= $p['stok'] ?>" value="1">
        <button type="submit">Beli</button>
    </form>
<?php endforeach; ?>

<?= $this->endSection() ?>
<?= $this->include('layouts/footer') ?>
