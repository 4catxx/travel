<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <?= $this->include('partials/head-css') ?>
</head>

<?= $this->include('partials/body') ?>

<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?= $page_title ?>

                <!-- Menampilkan Flash Data Error (Pesan Kesalahan) -->
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-end mb-3">
                            <br></br>
                        </div>

                        <!-- Cards -->
                        <div class="row" id="card-container">
                            <?php if (!empty($wisata)) : ?>
                                <?php foreach ($wisata as $item) : ?>
                                    <div class="col-md-4 mb-4" data-status="<?= esc($item['status']) ?>">
                                        <div class="card shadow-sm border-0">
                                            <img src="<?= base_url('uploads/wisata/' . esc($item['gambar'])) ?>" class="card-img-top rounded-top" alt="<?= esc($item['nama_wisata']) ?>">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary"><?= esc($item['nama_wisata']) ?></h5>
                                                <p class="card-price mb-2"><strong>Rp <?= number_format($item['harga'], 0, ',', '.') ?></strong></p>
                                                <p class="card-location text-muted small"><?= htmlspecialchars_decode($item['deskripsi']) ?></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="<?= base_url('detail-wisata/' . $item['id_wisata']) ?>" class="btn btn-sm btn-outline-primary">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="col-12">
                                    <p class="text-muted text-center">Tidak ada data wisata.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?= $this->include('partials/footer') ?>

    </div>

</div>

<?= $this->include('partials/vendor-scripts') ?>

</body>
</html>
