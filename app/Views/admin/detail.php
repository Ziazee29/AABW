<?= $this->extend('layout/backend') ?>

<?= $this->section('content') ?>
<title>SIA-IPB &mdash; Detail</title>

<section class="section">
    <div class="section-header">
        <h1>Detail Pengguna</h1>
    </div>

    <!-- Menampilkan Flashdata -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <!-- Dinamis -->
        <div class="card">
            <div class="card-header">
                <h4>Profil Pengguna Aplikasi</h4>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <?php if ($user): ?>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= base_url('imgFiles/' . $user->gbr) ?>" 
                                                 class="rounded-circle mr-1" 
                                                 alt="<?= $user->fullname ?>" 
                                                 style="width: 150px; height: 150px; object-fit: cover;">
                                        </div>
                                        <div class="col-md-8">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><?= esc($user->fullname) ?></li>
                                                <li class="list-group-item"><?= esc($user->username) ?></li>
                                                <li class="list-group-item"><?= esc($user->email) ?></li>
                                                <li class="list-group-item">
                                                    <span class="badge badge-success"><?= esc($user->name) ?></span>
                                                </li>
                                                <li class="list-group-item">
                                                    <a href="<?= base_url('admin') ?>">&laquo; Back to List</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>Data pengguna tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>