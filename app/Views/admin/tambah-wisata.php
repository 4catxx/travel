<?= $this->include('partials/main') ?>

<head>

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
                            <h4 class="page-title">Tambah Wisata</h4>
                            <p class="text-muted">Isi detail informasi wisata yang ingin ditambahkan.</p>
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

                        <form action="post-wisata" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- Nama Paket/Wisata -->
                        <div class="mb-3">
                            <label for="namaPaket" class="form-label">Nama Paket/Wisata</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-briefcase"></i>
                                </span>
                                <input type="text" class="form-control" id="namaPaket" name="nama_paket" placeholder="Masukkan nama paket/wisata" value="<?= old('nama_paket') ?>" required>
                            </div>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="mb-3">
                            <label for="uploadGambar" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="uploadGambar" name="gambar" accept="image/*" required>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-tag"></i>
                                </span>
                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga wisata" value="<?= old('harga') ?>" required>
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-pencil"></i>
                                </span>
                                <textarea id="elm1" name="deskripsi"></textarea>
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
                                <input type="number" class="form-control" id="jumlahHari" name="waktu_perjalanan" placeholder="Masukkan durasi perjalanan dalam hari" min="1" max="14" required>
                            </div>
                        </div>

                        <!-- Rute Perjalanan -->
                        <div class="mb-3">
                            <label for="rutePerjalanan" class="form-label">Rencana Perjalanan</label>
                            <div id="rencanaPerjalananContainer"></div>
                        </div>

                        <!-- Minimum Orang -->
                        <div class="mb-3">
                            <label for="min" class="form-label">Minimum Orang</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="dripicons-user-group"></i>
                                </span>
                                <input type="number" class="form-control" id="min" name="min" placeholder="Masukkan Minimum Orang" value="<?= old('min') ?>" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/wisata" class="btn btn-secondary">Batal</a>
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
<script src="assets/libs/tinymce/tinymce.min.js"></script>

<<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jumlahHariInput = document.getElementById('jumlahHari');
        const container = document.getElementById('rencanaPerjalananContainer');

        jumlahHariInput.addEventListener('change', function() {
            const hari = parseInt(this.value);
            container.innerHTML = ''; // Reset kontainer

            if (hari > 0) {
                for (let i = 1; i <= hari; i++) {
                    const hariSection = document.createElement('div');
                    hariSection.classList.add('card', 'mb-3');
                    hariSection.innerHTML = `
                        <div class="card-header">Hari ${i}</div>
                        <div class="card-body" id="hari-${i}">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="waktu_hari_${i}" class="form-label">Waktu</label>
                                    <input type="time" name="waktu_hari_${i}[]" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="kegiatan_hari_${i}" class="form-label">Kegiatan</label>
                                    <input type="text" name="kegiatan_hari_${i}[]" class="form-control" placeholder="Deskripsi kegiatan" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="tambahKegiatan(${i})">Tambah Kegiatan</button>
                        </div>
                    `;
                    container.appendChild(hariSection);
                }
            }
        });
    });

    // Fungsi untuk menambahkan input kegiatan
    function tambahKegiatan(hari) {
        const hariSection = document.getElementById(`hari-${hari}`);
        const newInputGroup = document.createElement('div');
        newInputGroup.classList.add('row', 'mb-2');

        const timeInput = document.createElement('div');
        timeInput.classList.add('col-md-4');
        timeInput.innerHTML = `<input type="time" name="waktu_hari_${hari}[]" class="form-control" required>`;

        const activityInput = document.createElement('div');
        activityInput.classList.add('col-md-8');
        activityInput.innerHTML = `<input type="text" name="kegiatan_hari_${hari}[]" class="form-control" placeholder="Deskripsi kegiatan" required>`;

        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-danger', 'mt-2');
        removeButton.innerText = 'Hapus Kegiatan';
        removeButton.onclick = function() {
            newInputGroup.remove();
        };

        newInputGroup.appendChild(timeInput);
        newInputGroup.appendChild(activityInput);
        newInputGroup.appendChild(removeButton);

        hariSection.appendChild(newInputGroup);
    }
</script>

<!-- init js -->
<script src="assets/js/pages/form-editor.init.js"></script>

<!-- App js -->
<script src="<?= base_url('/assets/js/app.js'); ?>"></script>

</body>

</html>
