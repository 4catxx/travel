<?= $this->include('partials/main') ?>

<head>
    <?= $title_meta ?>
    <?= $this->include('partials/head-css') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnH/Pr5x4p8e3bsk2vVqzH/jAh5bH1xFb5/Xgk5QoUl9/c4ScaLRoHG8Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<?= $this->include('partials/body') ?>

<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?= $page_title ?>

                <div class="row">
                    <div class="col-xl-8">
                        <!-- Item 1 -->
                        <div class="card border shadow-none mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-start border-bottom pb-3">
                                    <!-- Gambar Produk -->
                                    <div class="flex-shrink-0 me-4">
                                        <img src="assets/images/pemandangan.jpeg" alt="Paket Wisata Bali" class="avatar-lg rounded">
                                    </div>
                                    <!-- Detail Produk -->
                                    <div class="flex-grow-1 align-self-center overflow-hidden">
                                        <h5 class="text-truncate font-size-16">
                                            <a href="#" class="text-reset">Paket Wisata Bali</a>
                                        </h5>
                                        <p class="mb-1">Durasi : <span class="fw-medium">3 Hari</span></p>
                                        <p>Rute : <span class="fw-medium">Denpasar - Ubud - Kuta</span></p>
                                    </div>
                                    <!-- Aksi -->
                                    <div class="ms-2">
                                        <ul class="list-inline mb-0 font-size-16">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-2">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Harga dan Total -->
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-2">Harga</p>
                                        <h5 class="font-size-16">Rp 3,500,000</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-2">Jumlah</p>
                                        <input type="number" class="form-control" value="1" min="1">
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-2">Total</p>
                                        <h5 class="font-size-16">Rp 3,500,000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="card border shadow-none mb-3">
                            <div class="card-body">
                                <div class="d-flex align-items-start border-bottom pb-3">
                                    <!-- Gambar Produk -->
                                    <div class="flex-shrink-0 me-4">
                                        <img src="assets/images/pemandangan.jpeg" alt="Paket Wisata Jogja" class="avatar-lg rounded">
                                    </div>
                                    <!-- Detail Produk -->
                                    <div class="flex-grow-1 align-self-center overflow-hidden">
                                        <h5 class="text-truncate font-size-16">
                                            <a href="#" class="text-reset">Paket Wisata Jogja</a>
                                        </h5>
                                        <p class="mb-1">Durasi : <span class="fw-medium">2 Hari</span></p>
                                        <p>Rute : <span class="fw-medium">Malioboro - Prambanan</span></p>
                                    </div>
                                    <!-- Aksi -->
                                    <div class="ms-2">
                                        <ul class="list-inline mb-0 font-size-16">
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-2">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="text-muted px-2">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Harga dan Total -->
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p class="text-muted mb-2">Harga</p>
                                        <h5 class="font-size-16">Rp 2,800,000</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-2">Jumlah</p>
                                        <input type="number" class="form-control" value="1" min="1">
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-muted mb-2">Total</p>
                                        <h5 class="font-size-16">Rp 2,800,000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <a href="/products" class="btn btn-link text-muted">
                                    <i class="fas fa-arrow-left me-1"></i> Lanjutkan Belanja
                                </a>
                            </div>
                            <div class="col-sm-6 text-sm-end">
                                <a href="/checkout" class="btn btn-success">
                                    <i class="fas fa-shopping-cart me-1"></i> Checkout
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Ringkasan Order -->
                    <div class="col-xl-4">
                        <div class="card border shadow-none">
                            <div class="card-body">
                                <h4 class="fw-bold text-primary mb-4"><i class="fas fa-receipt me-2"></i> Ringkasan Order</h4>
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Subtotal</td>
                                        <td class="text-end">Rp 6,300,000</td>
                                    </tr>
                                    <tr>
                                        <td>Diskon</td>
                                        <td class="text-end">Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Pengiriman</td>
                                        <td class="text-end">Rp 50,000</td>
                                    </tr>
                                    <tr class="border-top">
                                        <td><strong>Total</strong></td>
                                        <td class="text-end"><strong>Rp 6,350,000</strong></td>
                                    </tr>
                                </table>
                                <a href="/checkout" class="btn btn-primary w-100 mt-3">Lanjut ke Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->

        <?= $this->include('partials/footer') ?>

    </div> <!-- main-content -->

</div> <!-- layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>
<?= $this->include('partials/vendor-scripts') ?>

</body>
</html>
