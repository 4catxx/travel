<?= $this->include('partials/main') ?>

<head>
<base href="<?= base_url() ?>">
    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Edit Wisata</h4>
                            <p class="text-muted">Isi detail informasi wisata yang ingin diubah.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Tambah Wisata -->
                <div class="card">
                    <div class="card-body">

                        <!-- Tampilkan Pesan Error -->
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- Tampilkan Pesan Sukses -->
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('post-update-wisata') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_wisata" value="<?= esc($wisata['id_wisata']) ?>">

                        <!-- Nama Paket/Wisata -->
                        <div class="mb-3">
                            <label for="namaPaket" class="form-label">Nama Paket/Wisata</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-briefcase"></i>
                                </span>
                                <input type="text" class="form-control" id="namaPaket" name="nama_paket" placeholder="Masukkan nama paket/wisata" value="<?= esc($wisata['nama_wisata']) ?>" required>
                            </div>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="mb-3">
                            <label for="uploadGambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="uploadGambar" name="gambar" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                            <div class="mt-2">
                                <img src="<?= base_url('uploads/wisata/' . $wisata['gambar']) ?>" alt="Gambar Wisata" class="img-thumbnail" width="150">
                            </div>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-tag"></i>
                                </span>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga wisata" value="<?= esc($wisata['harga']) ?>" required>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-pencil"></i>
                                </span>
                                <textarea id="elm1" name="deskripsi"><?= htmlspecialchars_decode($wisata['deskripsi']) ?></textarea>
                            </div>
                        </div>

                        <h5 class="mb-3">Detail Paket</h5>

                        <!-- Waktu Perjalanan -->
                        <div class="mb-3">
                            <label for="waktuPerjalanan" class="form-label">Durasi</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-clock"></i>
                                </span>
                                <input type="number" class="form-control" id="waktuPerjalanan" name="waktu_perjalanan" placeholder="Masukkan durasi perjalanan dalam hari" value="<?= esc($wisata['waktu_perjalanan']) ?>" required>
                            </div>
                        </div>

                        <!-- Rute Perjalanan -->
                        <div class="mb-3">
                            <label for="rutePerjalanan" class="form-label">Rute Perjalanan</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-map"></i>
                                </span>
                                <textarea class="form-control" id="rutePerjalanan" name="rute_perjalanan" rows="3" placeholder="Masukkan rute perjalanan..." required><?= esc($wisata['rute_perjalanan']) ?></textarea>
                            </div>
                        </div>

                        <!-- Minimum Orang -->
                        <div class="mb-3">
                            <label for="min" class="form-label">Minimum Orang</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-user-group"></i>
                                </span>
                                <input type="number" class="form-control" id="min" name="minimum_orang" placeholder="Masukkan Minimum Orang" value="<?= esc($wisata['minimum_orang']) ?>" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('informasi-wisata') ?>" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!--tinymce js-->
<script src="<?= base_url('assets/libs/tinymce/tinymce.min.js') ?>"></script>

<!-- init js -->
<script src="<?= base_url('assets/js/pages/form-editor.init.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/js/app.js'); ?>"></script>

</body>

</html>
