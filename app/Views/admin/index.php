<?= $this->include('layouts/header') ?>

<div class="container mt-4">
    <h2 class="text-center">Dashboard Admin</h2>
    <p class="text-center">Selamat datang di panel admin. Kelola sistem klinik dengan mudah!</p>

    <div class="row">
        <!-- Manajemen User -->
        <div class="col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Manajemen User</h5>
                    <p class="card-text">Kelola data user dan hak akses.</p>
                    <a href="<?= base_url('admin/users') ?>" class="btn btn-primary">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Laporan Klinik -->
        <div class="col-md-4">
            <div class="card border-success mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Laporan Klinik</h5>
                    <p class="card-text">Cek laporan dan statistik klinik.</p>
                    <a href="<?= base_url('admin/laporan') ?>" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Manajemen Produk -->
        <div class="col-md-4">
            <div class="card border-warning mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Manajemen Produk</h5>
                    <p class="card-text">Kelola makanan, obat, dan perlengkapan hewan.</p>
                    <a href="<?= base_url('admin/produk') ?>" class="btn btn-warning">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
