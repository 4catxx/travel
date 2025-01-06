<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>
</head>

<?= $this->include('partials/body') ?>

<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?= $page_title ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-0 shadow-lg">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <!-- Image Section -->
                                    <div class="col-xl-5">
                                        <div class="position-relative">
                                            <img src="<?= base_url('uploads/wisata/' . $wisata['gambar']) ?>" 
                                                 alt="<?= esc($wisata['nama_wisata']) ?>" 
                                                 class="img-fluid rounded shadow">
                                        </div>
                                    </div>

                                    <!-- Details Section -->
                                    <div class="col-xl-7">
                                        <div class="ps-xl-4 mt-4 mt-xl-0">
                                            <h1 class="font-size-24 fw-bold mb-3 text-primary">
                                                <?= esc($wisata['nama_wisata']) ?>
                                            </h1>
                                            <h5 class="text-success fw-bold">
                                                Rp <?= number_format($wisata['harga'], 0, ',', '.') ?>
                                            </h5>
                                            <p class="text-muted mt-3">
                                                <?= htmlspecialchars_decode($wisata['deskripsi']) ?>
                                            </p>
                                            <hr>

                                            <!-- Detail Paket -->
                                            <h4 class="font-size-18 mb-3">Detail Paket</h4>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <i class="fas fa-clock text-primary me-2"></i>
                                                    Durasi: <b><?= esc($wisata['waktu_perjalanan']) ?> Hari</b>
                                                </li>
                                                <li>
                                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                    Rute: <b><?= esc($wisata['rute_perjalanan']) ?></b>
                                                </li>
                                                <li>
                                                    <i class="fas fa-user-friends text-primary me-2"></i>
                                                    Minimum peserta: <b><?= esc($wisata['minimum_orang']) ?> orang</b>
                                                </li>
                                                <li>
                                                    <i class="fas fa-check text-primary me-2"></i>
                                                    Harga termasuk transportasi lokal & penginapan
                                                </li>
                                            </ul>
                                            <hr>
                                            <div class="mt-4 d-flex gap-3">
                                            <a href="<?= site_url('checkout/' . esc($wisata['id_wisata'])) ?>" class="btn btn-primary btn-lg rounded-pill px-4">
    <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
</a>


                                                <button class="btn btn-outline-secondary btn-lg rounded-pill px-4"><i class="fas fa-envelope me-2"></i>Hubungi Kami</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>

    </div>
</div>

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<script src="<?= base_url('/assets/js/app.js'); ?>"></script>

</body>
</html>
